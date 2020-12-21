<?php

namespace App\Http\Controllers\Admin\students;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportStudent;
use App\Exports\ExportStudentsBatchWise;
use App\Imports\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
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
use Illuminate\Support\Facades\Hash;
use App\Models\student\studentsGuardiantMast;
use App\Models\student\StudentSiblings;

class UserImportExportController extends Controller
{
   
   /**
    * @return \Illuminate\Support\Collection
    */
    public function importExport()
    {
       return view('student-import-export.import');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportAllStudent() 
    {
        return Excel::download(new ExportStudent, 'users.xlsx');
    }

    public function downloadStudentSample(){
        return Storage::download('/public/document/excel_format/students_upload_sample_file.ods');
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importStudent(Request $request) 
    {
        $this->validate($request,[
            'file' => 'required|mimes:xls,xlsx,csv',
        ]);
        $status = true;
        $errors = array();
        $qual = array();
        $datas = Excel::toCollection(new ImportStudent,$request->file('file'));
        foreach ($datas as $value) {
            foreach ($value as $data) {
                
                if($data['admission_number'] !=''){
                    $admission_number = $data['admission_number'];
                    $status = !empty($admission_number) ? true : false;
                
                }else{
                    $status = false;
                }
                if($status){
                    if($data['sssmid'] !=''){
                        $sssmid = $data['sssmid'];

                        $status = !empty($sssmid) ? true : false;
                    }
                }else{
                    $status = false;
                } 
                if($status){
                    if($data['family_id'] !=''){
                        $family_id = $data['family_id'];
                        $status = !empty($family_id) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['first_name'] !=''){
                        $first_name = $data['first_name'];
                        $status = !empty($first_name) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['middle_name'] !=''){
                        $middle_name = $data['middle_name'];
                        $status = !empty($middle_name) ? true : false;
                    }else{
                        $middle_name = '';
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['last_name'] !=''){
                        $last_name = $data['last_name'];
                        $status = !empty($last_name) ? true : false;
                    }
                }else{
                    $status = false;
                } 

                if($status){
                    if($data['date_of_birth'] !=''){
                        $date_of_birth =  date('Y-m-d',strtotime($data['date_of_birth']));
                        $status = !empty($date_of_birth) ? true : false;
                    }
                }else{
                    $status = false;
                } 
                if($status){
                    if($data['date_of_admission'] !=''){
                        $date_of_admission =  date('Y-m-d',strtotime($data['date_of_admission']));
                        $status = !empty($date_of_admission) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['father_name'] !=''){
                        $father_name = $data['father_name'];
                        $status = !empty($father_name) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['mother_name'] !=''){
                        $mother_name = $data['mother_name'];
                        $status = !empty($mother_name) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['mobile_number'] !=''){
                        $mobile_number = $data['mobile_number'];
                        $status = !empty($mobile_number) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){

                    if($data['optional_mobile_number'] !=''){

                        // dd($data['optional_mobile_number']);
                        $optional_mobile_number = $data['optional_mobile_number'];
                        $status = !empty($optional_mobile_number) ? true : false;
                        // dd($data['optional_mobile_number']);
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['category'] !=''){
                        $category = $data['category'];
                        foreach(CASTCATEGORY as $key => $value){
                            if ($value == $data['category']) {
                                $category = $key;
                                $status = !empty($category) ? true : false;
                            }
                        }
                        $status = !empty($religion) ? true : false;
                        $status = !empty($category) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['religion'] !=''){
                        $religion = $data['religion'];
                        foreach(RELIGION as $key => $value){
                            if ($value == $data['religion']) {
                                $religion = $key;
                                $status = !empty($religion) ? true : false;
                            }
                        }
                        $status = !empty($religion) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['aadhar_number'] !=''){
                        $aadhar_number = $data['aadhar_number'];
                        $status = !empty($aadhar_number) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['address_line'] !=''){
                        $address_line = $data['address_line'];
                        $status = !empty($address_line) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['city'] !=''){
                        $city = $data['city'];
                        $status = !empty($city) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['state'] !=''){
                        $state = $data['state'];
                        $status = !empty($state) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['country'] !=''){
                        $country = $data['country'];
                        $status = !empty($country) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['family_income'] !=''){
                        $family_income = $data['family_income'];
                        $status = !empty($family_income) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['medium'] !=''){
                        $medium = $data['medium'];
                        $status = !empty($medium) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['bank_name'] !=''){
                        $bank_name = $data['bank_name'];
                        $status = !empty($bank_name) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['ifsc_code'] !=''){
                        $ifsc_code = $data['ifsc_code'];
                        $status = !empty($ifsc_code) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['account_no'] !=''){
                        $account_no = $data['account_no'];
                        $status = !empty($account_no) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['blood_group'] !=''){
                        
                        foreach(BLOODGROUP as $key => $value){
                            if ($value == $data['blood_group']) {
                                $blood_group = $key;
                                $status = !empty($blood_group) ? true : false;
                            }
                        }
                        $status = !empty($blood_group) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['status'] !=''){
                        $s_status = $data['status'];
                        
                        $status = !empty($status) ? true : false;
                    }
                }else{
                    $status = false;
                } 
                if($status){
                    if($data['siblings_scholar_number'] !=''){
                        $siblings_scholar_number = $data['siblings_scholar_number'];
                        
                        $status = !empty($siblings_scholar_number) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['student_gender'] !=''){
                        foreach(GENDER as $key => $value){
                            if ($value == $data['student_gender']) {
                                $student_gender = $key;
                                $status = !empty($student_gender) ? true : false;
                            }
                        }
                        
                    }
                }else{
                    $status = false;
                }
               

                $length = 6;
                $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);

                if($status){
                    $request->validate([
                        'batch_id' => 'required|not_in:""',
                        'std_class_id' => 'required|not_in:""',
                        'section_id' => 'required|not_in:""'
                        ],
                        [
                            'batch_id.*' => 'The batch field is required',
                            'std_class_id.*' => 'The class field is required',
                            'section_id.*' => 'The section field is required',
                        ]);

                    $accountCreate = [
                        'username' => $first_name.$last_name,
                        'name' => $first_name.$last_name,
                        'password' => Hash::make($first_name.'@'.$admission_number),
                        'student_id' => $lastId,
                        'user_flag'  => 'S',
                        'mobile_no'  => $mobile_number ? $mobile_number :'',
                        ];
                        $createUser = User::create($accountCreate);
                        $user->attachRole('3');

        // send user name and password using email and SMS..................
                        if ( $createUser) {
                          
                           /* $userNamePassword['base_url'] =  url('/login');
                            $userNamePassword['username']=$accountCreate['username'];
                            $userNamePassword['email'] = $accountCreate['email'];
                            $userNamePassword['password'] = $randomletter;
                            Mail::to($userNamePassword['email'])->send(new UserNamePassword($userNamePassword));

                            $sendData = [
                                'message' =>'Welcome to the LIS, Nagda School, Your Login Username or Password here. UserName:-'.$userNamePassword['username'].' , Password:'.$userNamePassword['password'].' Click '.$userNamePassword['base_url'].'',
                                'mobile' => $accountCreate['mobile_no'] 
                            ]; 

                            $sendMessage = SendMessage::sendCode($sendData);*/
                            // if ($sendMessage) {
                                // $user = User::where('id',$createUser->id)->update(['message_sent' => 1]);
                              // }  
                        }
    //end send user name and password using email and SMS.............
                    $studentData = [
                        'user_id'       => $createUser->id,
                        'std_class_id' => $request->std_class_id,
                        'batch_id' => $request->batch_id,
                        'section_id' => $request->section_id,
                        'admision_no' => $admission_number ? $admission_number :'',
                        'status' => $s_status ? $s_status : '',
                        'addm_date' => $date_of_admission !='' ? date('Y-m-d',strtotime($date_of_admission)) : '',
                        // 'email' => $email,
                        'f_name' => $first_name ? $first_name :'',
                        'm_name' => $middle_name ? $middle_name : '',
                        'l_name' => $last_name ? $last_name : '',
                        // 'spec_ailment' => $spec_ailment,
                        'dob' => $date_of_birth  ? $date_of_birth : '',
                        
                        's_mobile' => $mobile_number  ? $mobile_number : '',
                        'optional_mobile_number' => $data['optional_mobile_number'] ? $data['optional_mobile_number'] : '',
                        'cast' => $religion ? $religion : '',
                        'gender' => $student_gender,
                        'reservation_class_id' => $category ? $category:'',
                        'aadhar_card' => $aadhar_number ? $aadhar_number : '',
                        'p_address' => $address_line ? $address_line :'',
                        'p_city' => $city ? $city :'',
                        'p_state' => $state ? $state : '',
                        'p_country' => $country ? $country : '',
                        'same_as' => 1,
                        'l_address' => $address_line ? $address_line :'',
                        'l_city' => $city ? $city :'',
                        'l_state' => $state ? $state : '',
                        'l_country' => $country ? $country : '',
                        'family_income' => $family_income ? $family_income : '',
                        'medium' => $medium ? $medium : '',
                        'bank_name' => $bank_name ? $bank_name : '',
                        's_ssmid' => $sssmid ? $sssmid : '',
                        'f_ssmid' => $family_id ? $family_id : '',
                        'account_no' => $account_no ? $account_no : '',
                        'ifsc_code' => $ifsc_code ? $ifsc_code : '',
                        'blood_id' => $blood_group ? $blood_group : '',
                        
                    ];
                    
                     $lastId = studentsMast::create($studentData)->id;
                     // $lastId = 8;
                     $siblings = $siblings_scholar_number;

                    $siblingsCount = count(explode(',', $siblings));

                    foreach (explode(',', $siblings) as $key => $value) {

                        $siblings = [
                            's_id'  =>$lastId,
                            'sibling_admission_no' => $value,
                            'sibling_no'     => $siblingsCount,
                            'status'  => 1,
                            
                        ];
                        StudentSiblings::create($siblings);
                    }

                    if ($father_name) {
                        $guardian['g_name'] = 'Mr.'.$father_name;
                        $guardian['relation_id'] = 1;
                        $guardian['g_mobile'] = $mobile_number;
                        $guardian['s_id'] = $lastId;
                         studentsGuardiantMast::create($guardian);
                    }if ($mother_name) {
                        $guardian['g_name'] = 'Mis.'.$mother_name;
                        $guardian['relation_id'] = 2;
                        $guardian['g_mobile'] = $mobile_number;
                        $guardian['s_id'] = $lastId;
                         studentsGuardiantMast::create($guardian);
                    } 
                       

                }else{
                    $errors[] = [
                        
                        'status' => $data['status'],
                        'addm_date' => $data['date_of_admission'],
                        'f_name' => $data['first_name'],
                        'm_name' => $data['middle_name'],
                        'l_name' => $data['last_name'],
                        'dob' => $data['date_of_birth'],
                        'gender' => $data['student_gender'],
                        'reservation_class_id' => $data['category'],
                        'religion' => $data['religion'],
                        'age' => $data['age'],
                        'blood_id' => $data['blood_group'],
                        'nationality' => $data['nationality'],
                        'p_address' => $data['address_line'],
                        'p_city_id' => $data['city'],
                        'p_state_id' => $data['state'],
                        'p_zip_code' => $data['pin'],
                        'p_country_id' => $data['country'],
                        's_mobile' => $data['mobile_number'],
                        'family_income' => $data['family_income'],
                        'medium' => $data['medium'],
                        'f_ssmid' => $data['family_id'],
                        'aadhar_no' => $data['aadhar_number'],
                        'bank_name' => $data['bank_name'],
                        'account_no' => $data['account_no'],
                        'ifsc_code' => $data['ifsc_code'],
                        'user_id' =>  $studentData['user_id'],
                    ];
                }

            }
        }
        if(count($errors) !=0){
            return Excel::download(new StudentErrorExport($errors), 'student_upload_ error_sheet.xlsx');
        }
        return back()->with('success',"Student uploaded Successfully");
    }

    public function exportclassSectionBatchWise(){
        $batches = studentBatch::get();
        $classes = studentClass::get();
        $sections = studentSectionMast::get();
            return view('admin.students.student-import-export.batch-wise-export',compact('batches','classes','sections'));
    }
    public function batchWiseExport(Request $request){
        // return $request->all();  
        $request->validate([
            'batch_id' => 'required|not_in:""',
            'std_class_id' => 'required|not_in:""',
            'section_id' => 'required|not_in:""'
            ],
            [
                'batch_id.*' => 'The batch field is required',
                'std_class_id.*' => 'The class field is required',
                'section_id.*' => 'The section field is required',
            ]
        );
        $studenInfo  = studentsMast::with('student_batch','student_section','student_class','p_country','p_state','p_city','studentsGuardiantMast')
                           ->where('batch_id',$request->batch_id)
                           ->where('std_class_id',$request->std_class_id)
                           ->where('section_id',$request->section_id)
                           ->where('user_id',Auth::user()->id)
                           ->first();
        if (!empty($studenInfo)) {
            $fileName = "Students of Class".' '.$studenInfo->student_class->class_name.".xlsx";          
         }else{
                return back()->with('error',"Record not availble in this section");

         }                   
               // dd($fileName); 
        return Excel::download(new ExportStudentsBatchWise($request), $fileName);
    }
}
