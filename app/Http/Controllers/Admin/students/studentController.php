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
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
            return view('admin.students.index',compact('studentData','classes','sections','batches'));
    }

    
    public function create()
    {
        
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
         $country   = $this->country;
         $state     = $this->state;
         $city      = $this->city;
         // $castCategores         = $this->castCategores;
         // $studentReligions      = $this->studentReligions;
         $studentNationalites   = $this->studentNationalites;
         // $studentBloodGroups    = $this->studentBloodGroups;
         $studentMothertongues  = $this->studentMothertongues;
         $professtionType       = $this->professtionType;
         $guardianDesignation   = $this->guardianDesignation;
         $studentGenders = Helpers::studentGender();
         // return student_gender();
        return view('admin.students.create',compact('classes','batches','sections','studentGenders',
            'studentNationalites','studentMothertongues','country','state','city','professtionType','guardianDesignation'));
        
    }

    
    public function store(Request $request)
    {
       $request->validate(
            [
                'std_class_id'        => 'required|not_in:""',
                'batch_id'            => 'required|not_in:""',
                'section_id'          => 'required|not_in:""',
<<<<<<< HEAD
                'admision_no'         => 'required|unique:students_masts,admision_no',
=======
                'admision_no'         => 'required',
>>>>>>> 206960c549bb9a47ff68c1fc4a9e67df38634e92
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
                'religion_id'=> $request->religion_id,
                'blood_id'=> $request->blood_id,
                'spec_ailment'=> $request->spec_ailment,
                'age'=> $request->age,
                'nationality_id'=> $request->nationality_id,
                'taluka'=> $request->taluka,
                'language_id'=> $request->language_id,
                's_ssmid'=> $request->s_ssmid,
                'f_ssmid'=> $request->f_ssmid,
                'aadhar_card'=> $request->aadhar_card,
                'teacher_ward'=> $request->teacher_ward,
                'cbsc_reg'=> $request->cbsc_reg,
                'prev_school'=> $request->prev_school,
                'year_of_prev_school'=> $request->year_of_prev_school,
                'prev_school_address'=> $request->address,
                'acadmic_city'=> $request->acadmic_city,
                'acadmic_state'=> $request->acadmic_state,
                'acadmic_pin'=> $request->acadmic_pin,
                'acadmic_country'=> $request->acadmic_country,
                'acadmic_cast'=> $request->acadmic_cast,
                'acadmic_attendance_reg_no'=> $request->acadmic_attendance_reg_no,
                'acadmic_remark'=> $request->acadmic_remark,
                'p_address'=> $request->p_address,
                'p_city'=> $request->p_city,
                'p_state'=> $request->p_state,
                'p_zip_code'=> $request->p_zip_code,
                'p_country'=> $request->p_country,
                'same_as'=> $request->same_as,
                'l_address'=> $request->p_address,
                'p_city'=> $request->p_city,
                'l_state'=> $request->p_state,
                'l_zip_code'=> $request->p_zip_code,
                'l_country'=> $request->p_country,
                'bank_name'=> $request->bank_name,
                'bank_branch'=> $request->bank_branch,
                'account_name'=> $request->account_name,
                'account_no'=> $request->account_no,
                'ifsc_code'=> $request->ifsc_code,
                'user_id'   => Auth::user()->id
        ];

// dd($request->student_doc[0]);

        if($request->hasFile('s_photo')){
            $data['photo'] =  file_upload($request->s_photo,'student_profile');
        }


        $student  = studentsMast::create($data);

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
            if($request->g_photo[$key] !=null){
                $guardian['photo'] =  file_upload($request->g_photo[$key],'student_guard');
            }

            studentsGuardiantMast::create($guardian);
        }


         foreach ($request->doc_title as $key => $doc_title) {
            $docs = [
                'doc_title'         => $doc_title,
                'doc_description'   => $request->doc_description[$key],
                's_id'       => $student->id
            ];
            if($request->student_doc[$key] !=null){
               // dd($request->student_doc[$key]);
                $docs['student_doc'] =  file_upload($request->student_doc[$key],'student_doc');
            }
            StudenstDoc::create($docs);
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
            'photo'  => $student->photo
        ];


            $user =   User::create($account_create);  
            $user->attachRole('3');
            // $sendData = [
            //     'message' => 'Hello '.student_name($student).' welcome to lis nagada school',
            //     'mobile' => $data['s_mobile'] 
            // ]; 

    //            $sendMessage = SendMessage::sendCode($sendData);
    return redirect()->back()->with('success','Student added successfully');
   

            $data = [
                'user_id'             => Auth::user()->id,
                'std_class_id'        => $request->std_class_id,
                'batch_id'            => $request->batch_id,
                'admision_no'         => $request->admision_no,
                'section_id'          => $request->section_id,
                'f_name'              => $request->f_name,
                'm_name'              => $request->m_name,
                'l_name'              => $request->l_name,
                's_mobile'            => $request->s_mobile,
                'dob'                 => $request->dob,
                'birth_place'         => $request->birth_place,
                'email'               => $request->email,
                'gender'              => $request->gender,
                'reservation_class_id'=> $request->reservation_class_id,
                'religion_id'         => $request->religion_id,
                'blood_group_id'      => $request->blood_group_id,
                'spec_ailment'        => $request->spec_ailment,
                'age'                 => $request->age,
                'nationality_id'      => $request->nationality_id,
                'taluka'              => $request->taluka,
                'language_id'         => $request->language_id,
                's_ssmid'             => $request->s_ssmid,
                'f_ssmid'             => $request->f_ssmid,
                'aadhar_card'         => $request->addhar_card,
                'teacher_ward'        => $request->teacher_ward,
                'cbsc_reg'            => $request->cbsc_reg,
                'status'              => $request->status,
                'addm_date'           => $request->addm_date,
                'enroll_no'           => $request->enroll_no,
                'roll_no'             => $request->roll_no,
                'username'            => $request->username,

                'prev_school'               => $request->prev_school,
                'year_of_prev_school'       => $request->year_of_prev_school,
                'prev_school_address'       => $request->prev_school_address,
                // 'acadmic_city_id'           => $request->acadmic_city_id,
                // 'acadmic_state_id'          => $request->acadmic_state_id,
                'acadmic_pin'               => $request->acadmic_pin,
                // 'acadmic_country_id'        => $request->acadmic_country_id,
                'acadmic_cast_id'           => $request->acadmic_cast,
                'acadmic_attendance_reg_no' => $request->acadmic_attendance_reg_no,
                'acadmic_remark'            => $request->acadmic_remark,

                'p_address'      => $request->p_address,
                // 'p_country_id'   => $request->p_country_id,
                // 'p_state_id'     => $request->p_state_id,
                // 'p_city_id'      => $request->p_city_id,
                'p_zip_code'     => $request->p_zip_code,

                // 'l_address'      => $request->l_address,
                // 'l_country_id'   => $request->l_country_id,
                // 'l_state_id'     => $request->l_state_id,
                // 'l_city_id'      => $request->l_city_id,
                // 'l_zip_code'     => $request->l_zip_code,

                
                'bank_name'           => $request->bank_name,
                'bank_branch'         => $request->bank_branch,
                'account_name'        => $request->account_name,
                'account_no'          => $request->account_no,
                'ifsc_code'           => $request->ifsc_code,
                
            ]; 
            $data['password'] = Hash::make($request->password);

            if($data['status'] == 'P'){
                $data['passout_date'] = $request->passout_date;
            }

            $batches =  studentBatch::all();
            
            foreach ($batches as $value) {
                if($data['batch_id'] == $value->id){
                    $batch_name = $value->batch_from ."-".$value->batch_to;
                }
            }

            if($request->s_photo !=null){
                $verify = $request->validate([
                    's_photo' =>'required|image|mimes:jpeg,png,jpg' 
                ]);
                $filename = $request->f_name.'_'.time().'.'.$request->s_photo->getClientOriginalName();
                $year = date('Y');
                    
                if(!empty($student)){
                    if($student->photo !=null){
                     Storage::delete('public/'.$student->photo);   
                    }
                }
               $image = $request->s_photo->storeAs('public/admin/school_'.Auth::user()->id.'/students/', $filename);
               $data['photo'] = 'admin/school_'.Auth::user()->id.'/students/'.$filename;
            }
            else{
                $data['photo'] = !empty($student) ? $student->photo : null ;
            }
                // dd($data);
            $create_stud = studentsMast::create($data); 

            // class section group create ...................
            // $getClasses = studentClass::where('id',$request->std_class_id)->first();
            // $getBatches = studentBatch::where('id',$request->batch_id)->first();
            // $getSections = studentSectionMast::where('id',$request->section_id)->first();
            //  $grouData['group_name'] = $getClasses->class_name.'-'.$getBatches->batch_name.'-'.$getSections->section_name;
            //  $grouData['class_id']    = $request->std_class_id;
            //  $grouData['section_id']  = $request->section_id;
            //  $grouData['batch_id']    = $request->batch_id;
            //  $grouData['user_id']     = $create_stud->id;

            // ClassBatchSectionGroupMast::create($grouData);

        if ($create_stud) {


    // insert data in user table..........................
            $studentAsUser['username']  = $request->username;
            $studentAsUser['password']  = Hash::make($request->password);
            $studentAsUser['name']      = $request->f_name.' '.$request->l_name;
            $studentAsUser['email']     = $request->email;
            $studentAsUser['student_id']= $create_stud->id;
            $studentAsUser['user_flag'] = 'S';

            $insertDatainUsrTbl = User::create($studentAsUser)->id;

            // send user name and password using email and SMS..................
                // if ( $insertDatainUsrTbl) {
                  
                //     $userNamePassword['base_url'] =  url('/login');
                //     $userNamePassword['username'] =   $request->username;
                //     $userNamePassword['email']    =   $request->email;
                //     $userNamePassword['password'] =  $request->password;

                //     Mail::to($userNamePassword['email'])->send(new UserNamePassword($userNamePassword));

                //     $sendData = [
                //         'message' =>'Your User name or Password. User Name:-'.$userNamePassword['username'].' , Password:'.$userNamePassword['password'].' , You can Login using Email Addaress ('.$userNamePassword['email'].')  Click '.$userNamePassword['base_url'].'',
                //         'mobile' => $data['s_mobile'] 
                //     ]; 

                //     $sendMessage = SendMessage::sendCode($sendData);
                //     if ($sendMessage) {
                //         $user = User::find($insertDatainUsrTbl)->update(['message_sent' => 1]);
                //       }  
                // }
            //end send user name and password using email and SMS..................

                 
    // end insert data in user table..........................
            
            for($i= 0 ; $i < count($request->relation); $i++) {
                $guardian = [
                    's_id'          => !empty($student) ? $id : $create_stud->id,
                    'user_id'       => Auth::user()->id,
                    'relation_id'   => $request->relation[$i],
                    'g_name'        => $request->g_name[$i],
                    'g_mobile'      => $request->g_mobile[$i],
                    'employer'      => $request->employer[$i],
                    'designation'   => $request->designation_id[$i],
                    'profession_status' => $request->profession_status[$i],
                    'work_status'       => $request->work_status[$i],
                    'employment_type'   =>$request->employment_type[$i],
                ]; 
                if($request->g_id[$i] != null){
                    $g_ids[] = $request->g_id[$i] ;
                }
                
                if($request->g_check[$i] == '0'){    //photo not upload
                    if($request->g_id[$i]!=null){   //previous photo check
                        foreach ($guardians as $guard) {
                            if($guard->id == $request->g_id[$i]){
                                $guardian['photo'] =$guard->g_photo;
                            }
                            
                        }
                    }else{
                        $guardian['photo'] = null;
                    }              
                }
                
                if($request->g_photo !=null){

                   $filename = $guardian['g_name'].'_'.$i.'_'.time().'.'.$request->g_photo[$i]->getClientOriginalName();

                   $year = date('Y');
                    if($request->g_id[$i]!=null){  //old photo delete 
                        foreach ($guardians as $guard) {
                            if($guard->id == $request->g_id[$i]){
                                $old_photo =$guard->photo;
                            }                     
                        }
                        if($old_photo !=null ){
                            Storage::delete('public/'.$old_photo);   
                        }

                    }
                   
                    $image = $request->g_photo[$i]->storeAs('public/admin/students_'.Auth::user()->id.'/parents/', $filename);

                    $guardian['photo'] = 'admin/students_'.Auth::user()->id.'/parents/'.'/'.$filename;

                }else{
                    $data['photo'] = !empty($student) ? $student->g_photo : null ;
                }
                if(!empty($student)){
                    if($request->g_id[$i]!=null){
                        studentsGuardiantMast::find($request->g_id[$i])->update($guardian);
                    }else{
                        studentsGuardiantMast::create($guardian);
                    }
                }else{

                    studentsGuardiantMast::create($guardian);
                }
            }

            for($i= 0 ; $i < count($request->doc_title); $i++) {
                $stdDoc = [
                        's_id'          => !empty($student) ? $id : $create_stud->id,
                        'doc_title'         => $request->doc_title[$i],
                        'doc_description'   => $request->doc_description[$i],
                        'user_id'           => Auth::user()->id,
                ]; 

                if($request->student_doc !=null){
                   $filename = $stdDoc['doc_title'].'_'.$i.'_'.time().'.'.$request->student_doc[$i]->getClientOriginalName();
                   $year = date('Y');
                   
                    $image = $request->student_doc[$i]->storeAs('public/admin/students_doc'.Auth::user()->id.'/student_doc/', $filename);

                    $stdDoc['student_doc'] = 'admin/students_coc'.Auth::user()->id.'/student_doc/'.'/'.$filename;
                }else{
                    $data['student_doc'] = !empty($student) ? $student->student_doc : null ;
                }
                    StudenstDoc::create($stdDoc);
                
            }
            // return redirect('student_detail');
            return redirect()->back()->with('success','Student added successfully');
        }else{
            return redirect()->back()->with('success','Student not added...');

        }

    }

    
    public function show($id)
    {


        $student = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast','studenst_doc','stdNationality','mothetongueMast'])->where('id',$id)->first();
        return view('admin.students.show',compact('student'));



         $classes     = $this->classes;
         $batches     = $this->batches;
         $sections    = $this->sections;
         $studentData = $this->studentData;
         $classes     = $this->classes;
         $batches     = $this->batches;
         $sections    = $this->sections;
         $studentData = $this->studentData;
         $country   = $this->country;
         $state     = $this->state;
         $city      = $this->city;
  
         $studentNationalites   = $this->studentNationalites;
         $studentMothertongues  = $this->studentMothertongues;
         $professtionType       = $this->professtionType;
         $guardianDesignation   = $this->guardianDesignation;
         $studentGenders        = Helpers::studentGender();
         $studentsGuardiantDetails = studentsGuardiantMast::get();

         $guardiantDetails = studentsGuardiantMast::with('students_details','professtion_type','guardiant_relation')->where('s_id',$id)->get();
         // $professtionDetail       = professtionType::with('')->get();



         $studentsMast   = studentsMast::where('id',$id)->with('student_batch','student_section','student_class','acadmic_country_mast','acadmic_stateMast','acadmic_cityMast','stdNationality','mothetongueMast','guardianDesignation','studentsGuardiantMast','p_country','p_state','p_city','l_country','l_state','l_city','studenst_doc')->first();

         // $studentDoc = StudenstDoc::
         // dd($studentsMast);
         // return student_gender();
        return view('admin.students.show',compact('classes','batches','sections','studentGenders',
            'studentNationalites','studentMothertongues','country','state','city','professtionType','guardianDesignation','studentsMast','studentsGuardiantDetails','guardiantDetails'));
    }

    
    public function edit($id)
    {
        $classes     = $this->classes;
         $batches     = $this->batches;
         $sections    = $this->sections;
         $studentData = $this->studentData;
         $classes     = $this->classes;
         $batches     = $this->batches;
         $sections    = $this->sections;
         $studentData = $this->studentData;
         $country     = $this->country;
         $state     = $this->state;
         $city      = $this->city;
         $castCategores         = $this->castCategores;
         $studentReligions      = $this->studentReligions;
         $studentNationalites   = $this->studentNationalites;
         $studentBloodGroups    = $this->studentBloodGroups;
         $studentMothertongues  = $this->studentMothertongues;
         $professtionType       = $this->professtionType;
         $guardianDesignation   = $this->guardianDesignation;
         $studentGenders        = Helpers::studentGender();
         $studentsGuardiantDetails = studentsGuardiantMast::get();

         $guardiantDetails = studentsGuardiantMast::with('students_details','professtion_type','guardiant_relation')->where('s_id',$id)->get();
         // $professtionDetail       = professtionType::with('')->get();
         $studentsMast   = studentsMast::where('id',$id)->with('student_batch','student_section','student_class','acadmic_country_mast','acadmic_stateMast','acadmic_cityMast','castCategory','stdReligions','stdNationality','stdBloodGroup','mothetongueMast','guardianDesignation','studentsGuardiantMast','p_country','p_state','p_city','l_country','l_state','l_city','studenst_doc')->first();

         // $studentDoc = StudenstDoc::
         // dd($guardiantDetails);
         // return student_gender();
        return view('admin.students.edit',compact('classes','batches','sections','studentGenders','castCategores','studentReligions',
            'studentNationalites','studentBloodGroups','studentMothertongues','country','state','city','professtionType','guardianDesignation','studentsMast','studentsGuardiantDetails','guardiantDetails'));
    }

    
    public function update(Request $request, $id)
    {
        // dd($request);
        $data = [
            'user_id'             => Auth::user()->id,
            'std_class_id'        => $request->std_class_id,
            'batch_id'            => $request->batch_id,
            'admision_no'         => $request->admision_no,
            'section_id'          => $request->section_id,
            'f_name'              => $request->f_name,
            'm_name'              => $request->m_name,
            'l_name'              => $request->l_name,
            's_mobile'            => $request->s_mobile,
            'dob'                 => $request->dob,
            'birth_place'         => $request->birth_place,
            'email'               => $request->email,
            'gender'              => $request->gender,
            'reservation_class_id'=> $request->reservation_class_id,
            'religion_id'         => $request->religion_id,
            'blood_group_id'      => $request->blood_group_id,
            'spec_ailment'        => $request->spec_ailment,
            'age'                 => $request->age,
            'nationality_id'      => $request->nationality_id,
            'taluka'              => $request->taluka,
            'language_id'         => $request->language_id,
            's_ssmid'             => $request->s_ssmid,
            'f_ssmid'             => $request->f_ssmid,
            'aadhar_card'         => $request->aadhar_card,
            'teacher_ward'        => $request->teacher_ward,
            'cbsc_reg'            => $request->cbsc_reg,
            'status'              => $request->status,
            'addm_date'           => $request->addm_date,
            'enroll_no'           => $request->enroll_no,
            'roll_no'             => $request->roll_no,
            // 'username'            => $request->username,

            'prev_school'               => $request->prev_school,
            'year_of_prev_school'       => $request->year_of_prev_school,
            'prev_school_address'       => $request->prev_school_address,
            'acadmic_city_id'           => $request->acadmic_city_id,
            'acadmic_state_id'          => $request->acadmic_state_id,
            'acadmic_pin'               => $request->acadmic_pin,
            'acadmic_country_id'        => $request->acadmic_country_id,
            'acadmic_cast_id'           => $request->acadmic_cast,
            'acadmic_attendance_reg_no' => $request->acadmic_attendance_reg_no,
            'acadmic_remark'            => $request->acadmic_remark,

            'p_address'      => $request->p_address,
            'p_country_id'   => $request->p_country_id,
            'p_state_id'     => $request->p_state_id,
            'p_city_id'      => $request->p_city_id,
            'p_zip_code'     => $request->p_zip_code,

            'l_address'      => $request->l_address,
            'l_country_id'   => $request->l_country_id,
            'l_state_id'     => $request->l_state_id,
            'l_city_id'      => $request->l_city_id,
            'l_zip_code'     => $request->l_zip_code,
            'bank_name'           => $request->bank_name,
            'bank_branch'         => $request->bank_branch,
            'account_name'        => $request->account_name,
            'account_no'          => $request->account_no,
            'ifsc_code'           => $request->ifsc_code,
            
        ]; 
        // $data['password']= Hash::make($request->password);


        if($data['status'] == 'P'){
            $data['passout_date'] = $request->passout_date;
        }

        if($id !=''){
            $student = studentsMast::find($id);
             $guardians = studentsGuardiantMast::where('s_id',$id)->get();
             $studentDocs = StudenstDoc::where('s_id',$id)->get();
        }else{
            $student = array();
        }
// dd($request->s_photo);
        if($request->s_photo !=null){
            $verify = $request->validate([
                's_photo' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
            $filename = $request->f_name.'_'.time().'.'.$request->s_photo->getClientOriginalName();
            $year = date('Y');
                
            if(!empty($student)){
                if($student->photo !=null){
                 Storage::delete('public/'.$student->s_photo);   
                }
            }
           $image = $request->s_photo->storeAs('public/admin/school_'.Auth::user()->id.'/students/', $filename);
           $data['photo'] = 'admin/school_'.Auth::user()->id.'/students/'.$filename;
        }else{
            $getProfile = studentsMast::find($id);
            $data['photo'] =$getProfile->photo;
        }

        $updateStud = studentsMast::where('id',$id)->update($data); 



// insert data in user table..........................
        $studentAsUser['username']  = $request->username;
        $studentAsUser['password']  = Hash::make($request->password);
        $studentAsUser['name']      = $request->f_name.' '.$request->l_name;
        $studentAsUser['email']     = $request->email;
        $insertDatainUsrTbl = User::where('id',$id)->update($studentAsUser); 

// end insert data in user table..........................
        // dd();
        for($i= 0 ; $i < count($request->relation); $i++) {
            $guardian = [
                'user_id'       => Auth::user()->id,
                's_id'          => !empty($student) ? $id : $updateStud->id,
                'relation_id'   => $request->relation[$i],
                'g_name'        => $request->g_name[$i],
                'g_mobile'      => $request->g_mobile[$i],
                'employer'      => $request->employer[$i],
                'designation'   => $request->designation_id[$i],
                'profession_status' => $request->profession_status[$i],
                'work_status'       => $request->work_status[$i],
                'employment_type'   =>$request->employment_type[$i],
            ]; 
            if($request->g_id[$i] != null){
                $g_ids[] = $request->g_id[$i] ;
            }
            // if($request->g_check[$i] == '0'){    //photo not upload
                if($request->g_id[$i]!=null){   //previous photo check
                    foreach ($guardians as $guard) {
                        if($guard->id == $request->g_id[$i]){
                            $guardian['photo'] =$guard->g_photo;
                        }
                        
                    }
                }else{
                    $guardian['photo'] = null;
                }              
            // }
            // dd($request->g_id[$i]);
            if($request->g_photo[$i] !=null){

               $filename = $guardian['g_name'].'_'.$i.'_'.time().'.'.$request->g_photo[$i]->getClientOriginalName();

               $year = date('Y');
                if($request->g_id[$i]!=null){  //old photo delete 
                    foreach ($guardians as $guard) {
                        if($guard->id == $request->g_id[$i]){
                            $old_photo =$guard->photo;
                        }                     
                    }
                    if($old_photo !=null ){
                        Storage::delete('public/'.$old_photo);   
                    }

                }
               
                $image = $request->g_photo[$i]->storeAs('public/admin/students_'.Auth::user()->id.'/parents/', $filename);

                $guardian['photo'] = 'admin/students_'.Auth::user()->id.'/parents/'.'/'.$filename;

            }else{
                 $getgphoto = studentsGuardiantMast::find($request->g_id[$i]);
                 if ($request->g_id[$i]) {
                    $guardian['photo'] =$getgphoto->photo;
                 }else{

                 }
            }
            // dd($guardian);

            if(!empty($student)){
                // dd($request->g_id[$i]);
                if($request->g_id[$i]!=null ){
                    studentsGuardiantMast::find($request->g_id[$i])->update($guardian);
                }else{
                   // $data= studentsGuardiantMast::where('s_id',$id)->update($guardian);
                   // dd($data);
                    if($request->relation[$i] != null)
                   studentsGuardiantMast::create($guardian);
                }
            }else{
                studentsGuardiantMast::create($guardian);
                // studentsGuardiantMast::where('s_id',$id)->update($guardian);;
            }
        }
   


    for($i= 0 ; $i < count($request->doc_title); $i++) {
            $stdDoc = [
               'doc_title'         => $request->doc_title[$i],
               'doc_description'   => $request->doc_description[$i]
            ]; 
            if($request->doc_id[$i] != null){
                $doc_ids[] = $request->doc_id[$i] ;
            }
            // if($request->g_check[$i] == '0'){    //photo not upload
                if($request->doc_id[$i]!=null){   //previous photo check
                    foreach ($studentDocs as $studentDoc) {
                        if($studentDoc->id == $request->doc_id[$i]){
                            $stdDoc['student_doc'] =$studentDoc->student_doc;
                        }
                        
                    }
                }else{
                    $stdDoc['student_doc'] = null;
                }              
            // }
            if($request->student_doc[$i] !=null){

               $filename = $stdDoc['doc_title'].'_'.$i.'_'.time().'.'.$request->student_doc[$i]->getClientOriginalName();

               $year = date('Y');
                if($request->doc_id[$i]!=null){  //old photo delete 
                    foreach ($studentDocs as $studentDoc) {
                        if($studentDoc->id == $request->doc_id[$i]){
                            $old_photo =$studentDoc->student_doc;
                        }                     
                    }
                    if($old_photo !=null ){
                        Storage::delete('public/'.$old_photo);   
                    }

                }
               
                $image = $request->student_doc[$i]->storeAs('public/admin/students_'.Auth::user()->id.'/parents/', $filename);

                $stdDoc['student_doc'] = 'admin/students_'.Auth::user()->id.'/parents/'.'/'.$filename;

            }else{
                // dd('asds');
                // $data['photo'] = !empty($student) ? $student->g_photo : null ;
            }
            // dd($guardian);

            if(!empty($student)){
                // dd($request->g_id[$i]);
                if($request->doc_id[$i]!=null ){
                    StudenstDoc::find($request->doc_id[$i])->update($stdDoc);
                }else{
                   // $data= studentsGuardiantMast::where('s_id',$id)->update($guardian);
                   // dd($data);
                    if($request->doc_title[$i] != null)
                   StudenstDoc::create($stdDoc);
                }
            }else{
                StudenstDoc::create($stdDoc);
                // studentsGuardiantMast::where('s_id',$id)->update($guardian);;
            }
        }
// dd($request->doc_id);
       /* $count = count($request->doc_title);
        // $doc_title = count($request->doc_title); 
        dd($count); 
        if($count != 0){
            $x = 0;
            while($x <= $count){
                if($request->doc_id[$x] !=''){
                     $id = $request->doc_id[$x];
                      $stdDoc = array(
                        'doc_title'         => $request->doc_title[$x],
                        'doc_description'   => $request->doc_description[$x]
                    );
                      // dd($request->student_doc);
                    if($request->student_doc !=null){

                       $filename = $stdDoc['doc_title'].'_'.$x.'_'.time().'.'.$request->student_doc[$x]->getClientOriginalName();
                       $year = date('Y');
                       
                        $image = $request->student_doc[$x]->storeAs('public/admin/students_doc'.Auth::user()->id.'/student_doc/', $filename);

                        $stdDoc['student_doc'] = 'admin/students_doc'.Auth::user()->id.'/student_doc/'.'/'.$filename;
                    }else{
                        
                    }   
                   StudenstDoc::where('id',$id)->update($stdDoc);

                }             
                $x++; 
            }
        }*/

        return redirect()->back()->with('success','Student Updated successfully');

    }

    
    public function destroy($id)
    {
        //
    }

    public function studentDashboard(){

        return view('admin.students.dashboard');
        
    }
    public function studentDetail(){

        return view('admin.students.student-details.index');

    }

    public function student_filter(Request $request){

// dd($request);
        $students = studentsMast::with(['student_class'])
                                ->where(['batch_id'=>$request->batch_id,'std_class_id' => $request->std_class_id,'section_id' => $request->section_id,'status'=>$request->status])->get();
        $page = request()->page; 
        return view('admin.students.table',compact('students','page'));
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
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
            return view('admin.students.previous-student-detail.index',compact('studentData','classes','sections','batches'));
    }

    // get previous student details......................
    public function studentsManage(){
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
            return view('admin.students.student-manage.index',compact('studentData','classes','sections','batches'));
    }

    //  students Manage Get Data student details......................
    public function studentsManageGetData(Request $request){
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
         $students = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
        $page = request()->page; 
          return view('admin.students.student-manage.table',compact('students','page','studentData','classes','sections','batches'));
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
}
