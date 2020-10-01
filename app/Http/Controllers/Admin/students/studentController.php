<?php

namespace App\Http\Controllers\Admin\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helpers;
use Auth;
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
use Illuminate\Support\Facades\Hash;
use File;
use App\User;


class studentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
            return view('admin.students.index',compact('studentData','classes','sections','batches'));
    }

    
    public function create()
    {
        
         $classes   = studentClass::get();
         $batches   = studentBatch::get();
         $sections  = studentSectionMast::get();
         $country   = countryMast::get();
         $state     = stateMast::get();
         $city      = cityMast::get();
         $castCategores         = castCategory::get();
         $studentReligions      = stdReligions::get();
         $studentNationalites   = stdNationality::get();
         $studentBloodGroups    = stdBloodGroup::get();
         $studentMothertongues  = mothetongueMast::get();
         $professtionType       = professtionType::get();
         $guardianDesignation   = guardianDesignation::get();
         $studentGenders = Helpers::studentGender();
         // return student_gender();
        return view('admin.students.create',compact('classes','batches','sections','studentGenders','castCategores','studentReligions',
            'studentNationalites','studentBloodGroups','studentMothertongues','country','state','city','professtionType','guardianDesignation'));
        
    }

    
    public function store(Request $request)
    {
    
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
        $data['password']= Hash::make($request->password);



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
            
        $create_stud = studentsMast::create($data); 



// insert data in user table..........................
        $studentAsUser['username']  = $request->username;
        $studentAsUser['password']  = Hash::make($request->password);
        $studentAsUser['name']      = $request->f_name.' '.$request->l_name;
        $studentAsUser['email']     = $request->email;
        $studentAsUser['student_id']= $create_stud->id;
        $insertDatainUsrTbl = User::create($studentAsUser); 

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

    }

    
    public function show($id)
    {
        $classes   = studentClass::get();
         $batches   = studentBatch::get();
         $sections  = studentSectionMast::get();
         $country   = countryMast::get();
         $state     = stateMast::get();
         $city      = cityMast::get();
         $castCategores         = castCategory::get();
         $studentReligions      = stdReligions::get();
         $studentNationalites   = stdNationality::get();
         $studentBloodGroups    = stdBloodGroup::get();
         $studentMothertongues  = mothetongueMast::get();
         $professtionType       = professtionType::get();
         $guardianDesignation   = guardianDesignation::get();
         $studentGenders        = Helpers::studentGender();
         $studentsGuardiantDetails = studentsGuardiantMast::get();

         $guardiantDetails = studentsGuardiantMast::with('students_details','professtion_type','guardiant_relation')->where('s_id',$id)->get();
         // $professtionDetail       = professtionType::with('')->get();
         $studentsMast   = studentsMast::where('id',$id)->with('student_batch','student_section','student_class','acadmic_country_mast','acadmic_stateMast','acadmic_cityMast','castCategory','stdReligions','stdNationality','stdBloodGroup','mothetongueMast','guardianDesignation','studentsGuardiantMast','p_country','p_state','p_city','l_country','l_state','l_city','studenst_doc')->first();

         // $studentDoc = StudenstDoc::
         // dd($studentsMast);
         // return student_gender();
        return view('admin.students.show',compact('classes','batches','sections','studentGenders','castCategores','studentReligions',
            'studentNationalites','studentBloodGroups','studentMothertongues','country','state','city','professtionType','guardianDesignation','studentsMast','studentsGuardiantDetails','guardiantDetails'));
    }

    
    public function edit($id)
    {
         $classes   = studentClass::get();
         $batches   = studentBatch::get();
         $sections  = studentSectionMast::get();
         $country   = countryMast::get();
         $state     = stateMast::get();
         $city      = cityMast::get();
         $castCategores         = castCategory::get();
         $studentReligions      = stdReligions::get();
         $studentNationalites   = stdNationality::get();
         $studentBloodGroups    = stdBloodGroup::get();
         $studentMothertongues  = mothetongueMast::get();
         $professtionType       = professtionType::get();
         $guardianDesignation   = guardianDesignation::get();
         $studentGenders        = Helpers::studentGender();
         $studentsGuardiantDetails = studentsGuardiantMast::get();

         $guardiantDetails = studentsGuardiantMast::with('students_details','professtion_type','guardiant_relation')->where('s_id',$id)->get();
         // $professtionDetail       = professtionType::with('')->get();
         $studentsMast   = studentsMast::where('id',$id)->with('student_batch','student_section','student_class','acadmic_country_mast','acadmic_stateMast','acadmic_cityMast','castCategory','stdReligions','stdNationality','stdBloodGroup','mothetongueMast','guardianDesignation','studentsGuardiantMast','p_country','p_state','p_city','l_country','l_state','l_city','studenst_doc')->first();

         // $studentDoc = StudenstDoc::
         // dd($studentsMast);
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
            // $guardians = GuardianMast::where('s_id',$id)->get();
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
        
        for($i= 0 ; $i < count($request->relation); $i++) {
            $guardian = [
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
                    studentsGuardiantMast::where('s_id',$id)->update($guardian);;
                }
            }else{

                studentsGuardiantMast::where('s_id',$id)->update($guardian);;
            }
        }

// dd($request->doc_id);
        $count = count($request->doc_id);
        $doc_title = count($request->doc_title); 
        // dd($doc_title); 
        if($count != 0 && $count == $doc_title){
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
        }else{

            $y = $count;
            while($y < $doc_title){
                if($request->doc_title[$y] !=''){
                     $request->doc_title[$y];
                      $stdDocNew = array(
                        'user_id'           => Auth::user()->id,
                        's_id'              => $id,
                        'doc_title'         => $request->doc_title[$y],
                        'doc_description'   => $request->doc_description[$y]
                    );

                    if($request->student_doc !=null){
                       $filename = $stdDocNew['doc_title'].'_'.$y.'_'.time().'.'.$request->student_doc[$y]->getClientOriginalName();
                       $year = date('Y');
                       
                        $image = $request->student_doc[$y]->storeAs('public/admin/students_doc'.Auth::user()->id.'/student_doc/', $filename);

                        $stdDocNew['student_doc'] = 'admin/students_doc'.Auth::user()->id.'/student_doc/'.'/'.$filename;
                    }else{
                        
                    }   
                   StudenstDoc::create($stdDocNew);

                }             
                $y++; 
            }
        }

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
        $students = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('status',$request->status)
                                ->where('user_id',Auth::user()->id)
                                ->get();
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
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
            return view('admin.students.previous-student-detail.index',compact('studentData','classes','sections','batches'));
    }

    // get previous student details......................
    public function studentsManage(){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
            return view('admin.students.student-manage.index',compact('studentData','classes','sections','batches'));
    }

    //  students Manage Get Data student details......................
    public function studentsManageGetData(Request $request){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
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
        
            return view('admin.students.student_uploads.index');
    }


}
