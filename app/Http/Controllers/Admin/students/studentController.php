<?php

namespace App\Http\Controllers\Admin\students;

use Auth;
use File;
use Helpers;
use App\User;
use App\Mail\UserNamePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\ClassBatchSectionGroupMast;
use App\Models\student\studentsGuardiantMast;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\castCategory;
use App\Models\master\stdReligions;
use App\Models\master\stdBloodGroup;
use App\Models\master\stdNationality;
use App\Models\master\countryMast;
use App\Models\master\stateMast;
use App\Models\master\cityMast;
use App\Models\master\mothetongueMast;
use App\Models\student\StudenstDoc;
use App\Models\master\professtionType;
use App\Models\master\guardianDesignation;
// use App\Models\master\SendCode1;
use App\Models\sendmessage\SendMessage;
use App\Models\AssignSubjectGroupStudent;
use Carbon\Carbon;
use Arr;


use App\Models\student\StudentMastPrevReocrd;
use App\Models\student\StudentSiblings;



class studentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
         $this->classes = studentClass::get();
         $this->batches = studentBatch::get();
         $this->sections = studentSectionMast::get();
         $this->studentData = studentsMast::get();
         $this->country   = countryMast::get();
         $this->state     = stateMast::get();
         $this->city      = cityMast::get();
         // $this->castCategores         = castCategory::get();
         // $this->studentReligions      = stdReligions::get();
         $this->studentNationalites   = stdNationality::get();
         // $this->studentBloodGroups    = stdBloodGroup::get();
         $this->studentMothertongues  = mothetongueMast::get();
         $this->professtionType       = professtionType::get();
         $this->guardianDesignation   = guardianDesignation::get();
         $this->studentGenders        = Helpers::studentGender();
         $this->studentsGuardiantDetails = studentsGuardiantMast::get();

    }
    public function index()
    {
        $classes = $this->classes;
        $studentData = $this->studentData;
        return view('admin.students.index',compact('studentData','classes'));
    }

    
    public function create()
    {
        
        $classes = $this->classes;
        $studentMothertongues  = $this->studentMothertongues;
        $professtionType       = $this->professtionType;
        $guardianDesignation   = $this->guardianDesignation;
        $studentNationalites   = $this->studentNationalites;

        $students = studentsMast::select('id','admision_no','f_name','m_name','l_name')->where('status','R')->get();

        return view('admin.students.create',compact('classes','studentNationalites','studentMothertongues','professtionType','guardianDesignation','students'));

    }
    
    
    public function store(Request $request)
    {

        // return $request->all();

        $data = $this->validation($request);

        if($request->hasFile('s_photo')){
            $data['photo'] =  file_upload($request->s_photo,'student_profile');
        }


        $student  = studentsMast::create($data);

        //Student Guardians Details Create

        foreach ($request->relation as $key => $relation) {
            $guardian = [
                'relation_id'  => $relation,
                'g_name'       => $request->g_name[$key],
                'g_mobile'       => $request->g_mobile[$key],
                'work_status'       => $request->work_status[$key],
                'employment_type'       => $request->employment_type[$key],
                'profession_status'       => $request->profession_status[$key],
                'employer'       => $request->employer[$key],
                'designation'       => $request->designation_id[$key],
                's_id'       => $student->id
            ];
            if($request->hasFile('g_photo.'.$key)){
                $guardian['photo'] =  file_upload($request->g_photo[$key],'student_guard');
            }

            studentsGuardiantMast::create($guardian);
        }

        //Student document create
        foreach ($request->doc_title as $key => $doc_title) {
            $docs = [
                'doc_title'         => $doc_title,
                'doc_description'   => $request->doc_description[$key],
                's_id'       => $student->id
            ];

            if($request->hasFile('student_doc.'.$key)){
               // dd($request->student_doc[$key]);
                $docs['student_doc'] =  file_upload($request->student_doc[$key],'student_doc');
            }
            StudenstDoc::create($docs);
        }


        //Student sibligs create

        foreach ($request->siblings as $key => $sibling) {
            $siblings = [
                's_id'                  =>  $student->id,
                'sibling_admission_no'  =>  $sibling,
                'sibling_no'            =>  $key + 1,
                'status'                => 'A'
            ];

            StudentSiblings::create($siblings);
        }


        $account_create = [
            'username' => $request->username,
            'name' => student_name($student),
            'email' => $student->email,
            'password' => Hash::make($request->password),
            'email' => $student->email,
            'stduent_id' => $student->id,
            'user_flag'  => 'S',
            'mobile_no'  => $student->s_mobile,
            'photo'  => $student->photo,
            'student_id'=>$student->id
        ];


        $user =   User::create($account_create);  
        $user->attachRole('3');
            // $sendData = [
            //     'message' => 'Hello '.student_name($student).' welcome to lis nagada school',
            //     'mobile' => $data['s_mobile'] 
            // ]; 

    //            $sendMessage = SendMessage::sendCode($sendData);
    return redirect()->back()->with('success','Student added successfully');

    }

    
    public function show($id)
    {

        $student = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.professtion_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail'])->where('id',$id)->first();
        // return $student;
        $sibling_name =[];
        foreach ($student->siblings as $sibling) {
            if($sibling->sibling_detail !=null){
                $sibling_name[] = $sibling->sibling_detail->admision_no.' | '.student_name($sibling->sibling_detail);
            }
        }
        $sibling_name =  implode(', ', $sibling_name);
       
        return view('admin.students.show',compact('student','sibling_name'));
    }

    
    public function edit($id)
    {
        $classes = $this->classes;
        $studentMothertongues  = $this->studentMothertongues;
        $professtionType       = $this->professtionType;
        $guardianDesignation   = $this->guardianDesignation;

        $studentNationalites   = $this->studentNationalites ;


        $students = studentsMast::select('id','admision_no','f_name','m_name','l_name')->where('status','R')->get();
        // return $students;

        $student = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast','student_doc','stdNationality','mothetongueMast'])->where('id',$id)->first();
        $studentSiblings = StudentSiblings::where('s_id',$id)->pluck('sibling_admission_no');
        // return $studentSiblings;
         // return $student;

        return view('admin.students.edit',compact('classes','studentNationalites','studentMothertongues','professtionType','guardianDesignation','student','students','studentSiblings'));

    }

    
    public function update(Request $request, $id)
    {
        $data = $this->validation($request,$id);
        
        $student = studentsMast::with(['studentsGuardiantMast','student_doc'])->where('id',$id)->first();
      

        if($request->hasFile('s_photo')){
            $data['photo'] =  file_upload($request->s_photo,'student_profile','photo',$student);
        }
        // return $request->g_id;
       

        $student->update($data);
        

        foreach ($request->relation as $key => $relation) {
            $guardianInfo = [];
            $guardian = [
                'relation_id'  => $relation,
                'g_name'       => $request->g_name[$key],
                'g_mobile'     => $request->g_mobile[$key],
                'work_status'  => $request->work_status[$key],
                'employment_type'=> $request->employment_type[$key],
                'profession_status'=> $request->profession_status[$key],
                'employer'       => $request->employer[$key],
                'designation'    => $request->designation_id[$key],
                's_id'           => $id
            ];

            if($request->g_id[$key] !=null){
                $guardianInfo = studentsGuardiantMast::find($request->g_id[$key]);
            }

            if($request->hasFile('g_photo.'.$key)){

                $guardian['photo'] =  file_upload($request->g_photo[$key],'student_guard','photo',$guardianInfo);
            }

            if(!empty($guardianInfo)){
                $guardianInfo->update($guardian);
            }else{
                studentsGuardiantMast::create($guardian);
            }
        }

        foreach ($request->doc_title as $key => $doc_title) {
            $docs = [
                'doc_title'         => $doc_title,
                'doc_description'   => $request->doc_description[$key],
                's_id'       => $id
            ];
            if($request->student_doc_id[$key] !=null){
                $studentdocs = StudenstDoc::find($request->student_doc_id[$key]);
            }else{
                $studentdocs = [];
            }

            if($request->hasFile('student_doc.'.$key)){
                $docs['student_doc'] =  file_upload($request->student_doc[$key],'student_doc','student_doc',$studentdocs);
            }

            if(!empty($studentdocs)){
                $studentdocs->update($docs);
            }else{
                StudenstDoc::create($docs);
            }

        }


        $fordeleteGaurdian = studentsGuardiantMast::where('s_id',$id)->whereNotIn('id',$request->g_id)->get();

        foreach ($fordeleteGaurdian as $deleteGaurdian) {
            if($deleteGaurdian->photo !=null){
                Storage::delete('public/'.$deleteGaurdian->photo);
            }
                studentsGuardiantMast::find($deleteGaurdian->id)->delete();
        }

        $fordeleteDocs = StudenstDoc::where('s_id',$id)->whereNotIn('id',$request->student_doc_id)->get();

        foreach ($fordeleteDocs as $deleteDocs) {
            if($deleteDocs->student_doc !=null){
                Storage::delete('public/'.$deleteDocs->student_doc);
            }
                StudenstDoc::find($deleteDocs->id)->delete();
        }

            StudentSiblings::where('s_id',$id)->delete();
        if($request->siblings !=null){
            foreach ($request->siblings as $key => $sibling) {
                $siblings = [
                    's_id'                  =>  $student->id,
                    'sibling_admission_no'  =>  $sibling,
                    'sibling_no'            =>  $key + 1,
                    'status'                => 'A'
                ];
                StudentSiblings::create($siblings);
            }

        }
        
        return redirect()->back()->with('success','Student Updated successfully');

    }

    
    public function destroy($id)
    {
        //
    }

    public function validation($request,$id=null){

        $request->validate(
            [
                'std_class_id'        => 'required|not_in:""',
                'batch_id'            => 'required|not_in:""',
                'section_id'          => 'required|not_in:""',
                'medium'              => 'required|not_in:""',
                'admision_no'         => 'required|unique:students_masts,admision_no,'.$id,
                'f_name'              => 'required',
                'l_name'              => 'required',
                's_mobile'            => 'required',
                'dob'                 => 'required',
                'birth_place'         => 'nullable',
                'email'               => 'nullable',
                'gender'              => 'required|not_in:""',
                'reservation_class_id'=> 'required|not_in:""',
                'p_address'           => 'required|min:3|max:191',
                'p_city'              => 'required|min:3|max:30',
                'p_state'             => 'required|min:3|max:25',
                'p_country'           => 'required|min:3|max:57',
                'p_zip_code'          => 'required|min:6|max:7',

                'l_address'           => 'required|min:3|max:191',
                'l_city'              => 'required|min:3|max:30',
                'l_state'             => 'required|min:3|max:25',
                'l_country'           => 'required|min:3|max:57',
                'l_zip_code'          => 'required|min:6|max:7',
                'teacher_ward'        => 'required|not_in:""'

            ],
            [
                'std_class_id.*'    => 'The selected student class is invalid.',
                'batch_id.*'        => 'The selected batch is invalid.',
                'section_id.*'      => 'The selected section is invalid.',
                'f_name.*'          => 'The first name field is required.',
                'l_name.*'          => 'The last name field is required.',
                's_mobile.*'        => 'The mobile field is required.',
            ]
        );

        $data = [
            'std_class_id'  => $request->std_class_id,
            'batch_id'      => $request->batch_id,
            'section_id'    => $request->section_id,
            'medium'        => $request->medium,
            'admision_no'   => $request->admision_no,
            'addm_date'     => $request->addm_date,
            'roll_no'       => $request->roll_no,
            'status'        => $request->status,
            'f_name'        => $request->f_name,
            'm_name'        => $request->m_name,
            'l_name'        => $request->l_name,
            'passout_date'  => $request->passout_date,
            's_mobile'      => $request->s_mobile,
            'dob'           => $request->dob,
            'birth_place'   => $request->birth_place,
            'email'         => $request->email,
            'gender'        => $request->gender,
            'reservation_class_id'=> $request->reservation_class_id,
            'religion_id'   => $request->religion_id,
            'blood_id'      => $request->blood_id,
            'spec_ailment'  => $request->spec_ailment,
            'age'           => $request->age,
            'nationality_id'=> $request->nationality_id,
            'taluka'        => $request->taluka,
            'language_id'   => $request->language_id,
            's_ssmid'       => $request->s_ssmid,
            'f_ssmid'       => $request->f_ssmid,
            'aadhar_card'   => $request->aadhar_card,
            'teacher_ward'  => $request->teacher_ward,
            'cbsc_reg'      => $request->cbsc_reg,
            'prev_school'   => $request->prev_school,
            'year_of_prev_school'=> $request->year_of_prev_school,
            'prev_school_address'=> $request->address,
            'acadmic_city'  => $request->acadmic_city,
            'acadmic_state' => $request->acadmic_state,
            'acadmic_pin'   => $request->acadmic_pin,
            'acadmic_country'=> $request->acadmic_country,
            'cast'          => $request->cast,
            'acadmic_attendance_reg_no'=> $request->acadmic_attendance_reg_no,
            'acadmic_remark'=> $request->acadmic_remark,
            'p_address'     => $request->p_address,
            'p_city'        => $request->p_city,
            'p_state'       => $request->p_state,
            'p_zip_code'    => $request->p_zip_code,
            'p_country'     => $request->p_country,
            'same_as'       => $request->same_as =='on' ? '1' :'0',
            'l_address'     => $request->p_address,
            'l_city'        => $request->p_city,
            'l_state'       => $request->p_state,
            'l_zip_code'    => $request->p_zip_code,
            'l_country'     => $request->p_country,
            'bank_name'     => $request->bank_name,
            'bank_branch'   => $request->bank_branch,
            'account_name'  => $request->account_name,
            'account_no'    => $request->account_no,
            'ifsc_code'     => $request->ifsc_code,
            'user_id'       => Auth::user()->id,
            'family_income' => $request->family_income,

        ];

        return $data;
    }

    public function studentDashboard(){

        return view('admin.students.dashboard');
        
    }
    public function studentDetail(){

        return view('admin.students.student-details.index');

    }

    public function student_filter(Request $request){

// dd($request);
        $page = request()->page; 
        if($request->status == 'D' || $request->status == 'R'){
            $students = studentsMast::with(['student_class'])->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>$request->status])->get();
            return view('admin.students.table',compact('students','page'));
        }else{
            $students = StudentMastPrevReocrd::with('student_detail')->whereHas('student_detail',function($q)use($request){
                $q->where(['medium'=> $request->medium]);
            })->has('student_detail')->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'status'=>$request->status])->get();
            return view('admin.students.previous-student-detail.table',compact('students'));
        }


        
    }

// get city state country..............................
    public function getState(Request $request){
        $id =$request->country_id;
        $getState = stateMast::where('country_id', $id)->get();
        return response()->json($getState);
    } 
    public function getCity(Request $request){
        $id =$request->state_id;
        $getCity = cityMast::where('state_id', $id)->get();
            return response()->json($getCity);
    }

    public function getAcadmicState(Request $request){
        $id =$request->state_id;
        $getState = stateMast::where('id', $id)->get();
            return response()->json($getState);
    } 
    public function getAcadmicCountry(Request $request){
         $id = $request->country_id;
         $getCountry = countryMast::where('id', $id)->get();
            return response()->json($getCountry);
    }

    // get previous student details......................
    public function previousStudentRecord(){
        $classes = $this->classes;  

        return view('admin.students.previous-student-detail.index',compact('classes'));
    }

    // get previous student details......................
    public function studentsManage(){
        $classes = $this->classes;
        // $page = 'student_manage';
        return view('admin.students.student-manage.index',compact('classes'));
    }

    //  students Manage Get Data student details......................
    public function studentsManageGetData(Request $request){
 
         $studentData = $this->studentData;
         $students = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
        $page = 'student_manage';
        return view('admin.students.table',compact('students','page','studentData','classes','sections','batches'));
    }

     // get previous student details......................
    public function studentUploads(){
        $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
            return view('admin.students.student-import-export.index',compact('studentData','classes','sections','batches'));
    }

    public function userProfile(){
        $user = Auth::user();
        // dd($user);
        return view('admin.profile.index',compact('user'));
    }
    public function editProfile($id){
        $getUserData = User::find($id);
        return view('admin.profile.edit',compact('getUserData'));
    }
    public function updateProfile(Request $request){
        dd($request);
    }
    public function showAttendence(){
        return view('admin.students.student-attendance.attendance');
    }
    public function viewAttendence(Request $request){
        // dd($request);
        // return $request->attendance_date;
        $date = $this->date_month_year($request->attendance_date);

        // return $date;
        $month = $date['month'];
        $year = $date['year'];
        $monthStart = $date['monthStart'];
        $monthEnd = $date['monthEnd'];
     
        $students = studentsMast::where('id',Auth::user()->student_id)->with('attendances')->select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')->get();      

        $academic_dates = Helpers::academic_dates($month,$year);
        $monthDates = Helpers::month_dates($monthStart,$monthEnd);
    

        $headerData = [
            'monthYear' => $date['month1']->format('F, Y')
        ];
// dd($students);
        // $qual = QualMast::find($request->qual_code);

        // return $request->all();
        $filter = [
            'class_name'    => studentClass::find($students[0]->std_class_id)->class_name,
            'batch_name'    => studentBatch::find($students[0]->batch_id)->batch_name,
            'section_name'  => studentSectionMast::find($students[0]->section_id)->section_name,
            'medium_name'   => Arr::get(MEDIUM,$request->medium)
        ];  
// dd($filter);
        // return  view('attendance.report.clone',compact('monthDates','academic_dates','students','headerData','filter','data'));
        // return  view('admin.attendance.report.monthly_report',compact('monthDates','academic_dates','students','headerData','filter'));
        return view('admin.students.student-attendance.show',compact('monthDates','academic_dates','students','headerData','filter'));
    }
    public function date_month_year($attendance_date){
        $year = date('Y',strtotime($attendance_date));
        $month = date('m',strtotime($attendance_date));   

        $month1 = Carbon::createFromFormat('Y-m', date('Y-m',strtotime($attendance_date)));
// return $month1;
        // dd($month1);
        $monthStart = $month1->startOfMonth()->copy();
        $monthEnd = $month1->endOfMonth()->copy();
        return $data = [
            'year' => $year,
            'month' => $month,
            'month1' => $month1,
            'monthStart' => $monthStart,
            'monthEnd'  => $monthEnd,
        ]; 
    }

}
