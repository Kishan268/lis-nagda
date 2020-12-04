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
                // dd($data);
                //  // return $data;
                // if($data['class_name'] !=''){           //required field
                //     $studentClass = studentClass::where('class_name',$data['class_name'])->first();
                //     $status = !empty($studentClass) ? true : false;
                    

                // }else{
                //     $status = false;
                // }
                // if($status){
                //     if($data['batch_name'] !=''){
                //      $studentBatch = studentBatch::where('batch_name',$data['batch_name'])->first();

                //     $status = !empty($studentBatch) ? true : false;
                //     }
                // }else{
                //     $status = false;
                // }
                // if($status){
                //     if($data['section_name'] !=''){
                //         $studentSection = studentSectionMast::where('section_name',$data['section_name'])->first();

                //         $status = !empty($studentSection) ? true : false;
                //     }
                // }else{
                //     $status = false;
                // } 
                if($data['scholar'] !=''){
                    $scholarNo = $data['scholar'];
                    $status = !empty($scholarNo) ? true : false;
                
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
                        $date_of_birth = date('Y-m-d',strtotime($data['date_of_birth']));
                        $status = !empty($date_of_birth) ? true : false;
                    }
                }else{
                    $status = false;
                } 
                if($status){
                    if($data['date_of_admission'] !=''){
                        $date_of_admission = date('Y-m-d',strtotime($data['date_of_admission']));
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
                        $optional_mobile_number = $data['optional_mobile_number'];
                        $status = !empty($optional_mobile_number) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['category'] !=''){
                        $category = $data['category'];
                        $status = !empty($category) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
                    if($data['religion'] !=''){
                        $religion = $data['religion'];
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
                }if($status){
                    if($data['siblings'] !=''){
                        $siblings = $data['siblings'];
                        $status = !empty($siblings) ? true : false;
                    }
                }else{
                    $status = false;
                }if($status){
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
                        $blood_group = $data['blood_group'];
                        $status = !empty($blood_group) ? true : false;
                    }
                }else{
                    $status = false;
                }

                if($status){
                    if($data['status'] !=''){
                        $status = $data['status'];
                        $status = !empty($status) ? true : false;
                    }
                }else{
                    $status = false;
                }
                /*if($status){
                    if($data['admission_date'] !=''){
                        $admissionDate = $data['admission_date'];
                        $status = !empty($admissionDate) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['email'] !=''){
                        $email = $data['email'];
                        $status = !empty($email) ? true : false;
                    }
                }else{
                    $status = false;
                }  
                
                if($status){
                    if($data['dob'] !=''){
                        $dob = $data['dob'];
                        $status = !empty($dob) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['gender'] !=''){
                        if($data['gender'] = 'male'){
                            $gender = 1;
                        }else if($data['gender'] = 'female'){
                            $gender = 2;
                        }
                        else if($data['gender'] = 'other'){
                            $gender = 3;
                        }
                        $status = !empty($gender) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['cast_category'] !=''){
                         $cast_category = castCategory::where('caste_category_name',$data['cast_category'])->first();
                        $status = !empty($cast_category) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['age'] !=''){
                        $age = $data['age'];
                        $status = !empty($age) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['blood_grp'] !=''){
                        $bloodGroup = stdBloodGroup::where('blood_group_name',$data['blood_grp'])->first();
                        // dd($bloodGroup);
                        $status = !empty($bloodGroup) ? true : false;
                    }
                }else{
                    $status = false;
                }  
                if($status){
                    if($data['nationality'] !=''){
                        $nationality = stdNationality::where('nationality_name',$data['nationality'])->first();
                        $status = !empty($nationality) ? true : false;
                    }
                }else{
                    $status = false;
                } 
                if($status){
                    if($data['address'] !=''){
                        $address = $data['address'];
                        $status = !empty($address) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['city'] !=''){
                        $city = cityMast::where('city_name',$data['city'])->first();
                        $status = !empty($city) ? true : false;
                    }
                }else{
                    $status = false;
                }  
                if($status){
                    if($data['state'] !=''){
                        $state = stateMast::where('state_name',$data['state'])->first();
                        $status = !empty($state) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['pin'] !=''){
                        $pin = $data['pin'];
                        $status = !empty($pin) ? true : false;
                    }
                }else{
                    $status = false;
                } 
                if($status){
                    if($data['country'] !=''){
                        $country = countryMast::where('country_name',$data['country'])->first();
                        $status = !empty($country) ? true : false;
                    }
                }else{
                    $status = false;
                }  
                if($status){
                    if($data['mobile'] !=''){
                        $mobile = $data['mobile'];
                        $status = !empty($mobile) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['student_ssmid'] !=''){
                        $student_ssmid = $data['student_ssmid'];
                        $status = !empty($student_ssmid) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['family_ssmid'] !=''){
                        $family_ssmid = $data['family_ssmid'];
                        $status = !empty($family_ssmid) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['aadhar_no'] !=''){
                        $aadhar_no = $data['aadhar_no'];
                        $status = !empty($aadhar_no) ? true : false;
                    }
                }else{
                    $status = false;
                } 
                if($status){
                    if($data['bank_name'] !=''){
                        $bank_name = $data['bank_name'];
                        $status = !empty($bank_name) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['bank_branch'] !=''){
                        $bank_branch = $data['bank_branch'];
                        $status = !empty($bank_branch) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['account_name'] !=''){
                        $account_name = $data['account_name'];
                        $status = !empty($account_name) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['account_no'] !=''){
                        $account_no = $data['account_no'];
                        $status = !empty($account_no) ? true : false;
                    }
                }else{
                    $status = false;
                }
                if($status){
                    if($data['ifsc_code'] !=''){
                        $ifsc_code = $data['ifsc_code'];
                        $status = !empty($ifsc_code) ? true : false;
                    }
                }else{
                    $status = false;
                }*/

                $length = 6;
                $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);  
                if($status){
                    $studentData = [
                        'user_id'       => Auth::user()->id,
                        'std_class_id' => $request->std_class_id,
                        'batch_id' => $request->batch_id,
                        'section_id' => $request->section_id,
                        'admision_no' => $admissionNo,
                        'roll_no' => $classRollNo,
                        'status' => $student_status,
                        'addm_date' => $data['admission_date'] !='' ? date('Y-m-d',strtotime($data['admission_date'])) : '',
                        'email' => $email,
                        'f_name' => $first_name,
                        'm_name' => $middle_name,
                        'l_name' => $last_name,
                        'spec_ailment' => $spec_ailment,
                        'dob' => $data['dob'] !='' ? date('Y-m-d',strtotime($data['dob'])) : '',
                        'gender' => $gender,
                        'reservation_class_id' => $cast_category->id,
                        'age' => $age,
                        'blood_group_id' => $bloodGroup->blood_group_name,
                        'nationality_id' => $nationality->id,
                        'p_address' => $address,
                        'p_city_id' => $city->id,
                        'p_state_id' => $state->id,
                        'p_zip_code' => $pin,
                        'p_country_id' => $country->id,
                        's_mobile' => $mobile,
                        's_ssmid' => $student_ssmid,
                        'f_ssmid' => $family_ssmid,
                        'aadhar_card' => $aadhar_no,
                        'bank_name' => $bank_name,
                        'bank_branch' => $bank_branch,
                        'account_name' => $account_name,
                        'account_no' => $account_no,
                        'ifsc_code' => $ifsc_code,
                        'username' => $first_name.$last_name,
                        'password' => Hash::make($randomletter)
                    ];
                    dd($studentData);
                    $lastId = studentsMast::create($studentData)->id;

                    if ($lastId) {
                       $studentData2 = [
                        'name' => $first_name,
                        // 'email' => $email,
                        'student_id' => $lastId,
                        'username' => $first_name.$last_name,
                        'password' => Hash::make($randomletter),
                        'user_flag' => 'S',
                        'mobile_no' => $mobile,
                        'country_id' => $country->id,
                        'state_id' => $state->id,
                        'city_id' => $city->id,
                        'zip_code' => $pin,
                        'dob' => $dob,
                        ];
                        $createUser = User::create($studentData2);

        // send user name and password using email and SMS..................
                        if ( $createUser) {
                          
                           /* $userNamePassword['base_url'] =  url('/login');
                            $userNamePassword['username']=$studentData2['username'];
                            $userNamePassword['email'] = $studentData2['email'];
                            $userNamePassword['password'] = $randomletter;
                            Mail::to($userNamePassword['email'])->send(new UserNamePassword($userNamePassword));

                            $sendData = [
                                'message' =>'Your User name or Password. User Name:-'.$userNamePassword['username'].' , Password:'.$userNamePassword['password'].' , You can Login using Email Addaress ('.$userNamePassword['email'].')  Click '.$userNamePassword['base_url'].'',
                                'mobile' => $studentData2['mobile_no'] 
                            ]; 

                            $sendMessage = SendMessage::sendCode($sendData);*/
                            // if ($sendMessage) {
                                $user = User::where('id',$createUser->id)->update(['message_sent' => 1]);
                              // }  
                        }
    //end send user name and password using email and SMS.............

                    }
                }else{
                    $errors[] = [
                        
                        'roll_no' => $data['class_roll_no'],
                        'status' => $data['student_status'],
                        'addm_date' => $data['admission_date'],
                        'email' => $data['email'],
                        'f_name' => $data['first_name'],
                        'm_name' => $data['middle_name'],
                        'l_name' => $data['last_name'],
                        'spec_ailment' => $data['spec_ailment'],
                        'dob' => $data['dob'],
                        'gender' => $data['gender'],
                        'reservation_class_id' => $data['cast_category'],
                        'age' => $data['age'],
                        'blood_group_name' => $data['blood_grp'],
                        'nationality' => $data['nationality'],
                        'address' => $data['address'],
                        'p_city_id' => $data['city'],
                        'p_state_id' => $data['state'],
                        'p_zip_code' => $data['pin'],
                        'p_country_id' => $data['country'],
                        's_mobile' => $data['mobile'],
                        's_ssmid' => $data['student_ssmid'],
                        'f_ssmid' => $data['family_ssmid'],
                        'aadhar_no' => $data['aadhar_no'],
                        'bank_name' => $data['bank_name'],
                        'bank_branch' => $data['bank_branch'],
                        'account_name' => $data['account_name'],
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
        // dd($data);
        return Excel::download(new ExportStudentsBatchWise($request), 'student.xlsx');
    }
}
