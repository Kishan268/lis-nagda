<?php 
use App\Models\master\studentBatch;
use App\Models\hrms\EmployeeMast;

const SCHOOLNAME = 'Lakshya International School, Nagda';
const SENDTO = [
	'A' => 'Send to All',
	'S'	=> 'Send to Student',
	'T' => 'Send to Teacher'
];

const GENDER = [
    1 => 'Male',
    2 => 'Female',
    3 => 'Other'
];
const MEDIUM = [
    'EM' => 'English Medium',
    'HM' => 'Hindi Medium'
];

const BLOODGROUP = [
	'1'	=> 'A+',
	'2'	=> 'A-',
	'3'	=> 'B+',
	'4'	=> 'B-',
	'5'	=> 'O+',
	'6'	=> 'O-',
	'7'	=> 'AB+',
	'8'	=> 'AB-'
];

const RELIGION = [
	'1' => 'Hindu',
	'2' => 'Muslim',
	'3' => 'Sikh',
	'4' => 'Christian',
	'5' => 'Buddhist',
	'6' => 'Jain',
	'7' => 'Zoroastrianism',
	'8' => 'Other'
];

const GUARDIAN_RELATION = [
	'1' => 'Father',
	'2' => 'Mother',
	'3' => 'Guardian',
	'4' => 'Other',
];
const WORK_STATUS = [
	'1' => 'Self Employed',
	'2' => 'Job',
	'3' => 'Retired'
];
const EMPLOYMENT_TYPE = [
	'1' => 'Government',
	'2' => 'Private'
];


const CASTCATEGORY = [
    1 => 'OBC',
    2 => 'GENERAL',
    3 => 'SC',
    4 => 'ST',
    5 => 'EWS',
    6 => 'SBC',
    7 => 'VJ-A',
    8 => 'NT-B',
    9 => 'NT-C',
    10 => 'NT-D',
    11 => 'Other'
];
const STATUS = [
    'A' => 'Active',
    'P' => 'Pending',
    'S' => 'Suspend'
];

const STUDENTSTATUS = [
	'R' => 'Running',
	'P' => 'Pass',
	'F' => 'Fail' 
];

const FINE_TYPES = [
	1 => 'Fixed',
	2 => 'Per Day'
];

const FINE = [
	1 => 'Amount',
	2 => 'Percentage'
];


const HEAD_TYPES = [
	1 => 'Permanent',
	2 => 'Temporary'
];
	
const CURRENCY = [
	'I' => 'INR',
	'U' => 'USD'
];

const RECIEPT_HEADER_NAME = [
	1 => 'Lakshya International School, Nagda'
];
const COURSE_SELECTION = [
	1 => 'Single Course',
	2 => 'Multiple Courses'
];
const INCLUDE_RTE = [
	0 => 'RTE',
	1 => 'Without RTE'
];


const INSTALMENT_MODE = [
	1  => 'One Time',
	2  => '2 Instalments',
	3  => '3 Instalments'
	// 4  => '4 Instalments',
	// 5  => '5 Instalments',
	// 6  => '6 Instalments',
	// 7  => '7 Instalments',
	// 8  => '8 Instalments',
	// 9  => '9 Instalments',
	// 10 => '10 Instalments',
	// 11 => '11 Instalments',
	// 12 => '12 Instalments',
];

if(!function_exists('batches')){
	function batches(){
		return studentBatch::select('id','batch_name')->orderBy('batch_name','desc')->get();
	}
}

if (!function_exists('student_name')) {
    function student_name($student){
        
     return $student->f_name.($student->m_name !=null ? ' '.$student->m_name : '' )." ". $student->l_name;
     
    }
}

if (!function_exists('file_upload')) {
    function file_upload($file,$folder,$field_name =null,$data = []){
        if(!empty($data) !=0){
            if($data->$field_name != null){
               Storage::delete('public/'.$data->$field_name);
            }
        }
// dd($file);
        $name =  time().'_'.$file->getClientOriginalName();
        $file->storeAs('public/'.date('Y').'/'.date('M').'/'.$folder, $name);
        $path = date('Y').'/'.date('M').'/'.$folder.'/'.$name;
        return $path;
    }
}


if(!function_exists('file_name')){
    function file_name($docs){
        $file = explode('/', $docs);
        $doc = explode('_', $file[3]);
        return $doc[1];
    }
}

//For Certificate types created by kishan
const CERTIFICATE = [
	'1' => 'Transfer Certificate',
	'2' => 'School Leaving Certificate',
	'3' => 'Other' 
];
//For Employees types created by kishan

const EMP_TYPE = [
	'T' => 'Teacher',
	'H' => 'HR',
	'A' => 'Accountant',
	'E' => 'Staff Member' 
];
//For QUALIFICATION_NAMES  created by kishan

const QUALIFICATION_NAMES = [
	'1' => 'Diploma',
	'2' => 'Under Graduate',
	'3' => 'Master', 
	'4' => 'PHD' 
];

if(!function_exists('get_teachers')){
    function get_teachers(){
        return EmployeeMast::where('emp_type','T')->orderBy('name')->get();
    }
}