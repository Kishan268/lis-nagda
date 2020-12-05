<?php 
use App\Models\master\studentBatch;
 
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

if(!function_exists('student_gender')){
	function student_gender(){
		return 'hello';
	}
}

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

        $name =  time().'_'.$file->getClientOriginalName();
        $file->storeAs('public/'.date('Y').'/'.date('M').'/'.$folder, $name);
        $path = date('Y').'/'.date('M').'/'.$folder.'/'.$name;
        return $path;
    }
}


const CERTIFICATE = [
	'1' => 'Transfer Certificate',
	'2' => 'School Leaving Certificate',
	'3' => 'Other' 
];

if(!function_exists('file_name')){
    function file_name($docs){
        $file = explode('/', $docs);
        $doc = explode('_', $file[3]);
        return $doc[1];
    }
}
