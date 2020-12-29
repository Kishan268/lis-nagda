<?php 
use App\Models\master\studentBatch;
use App\Models\hrms\EmployeeMast;

use App\Models\AcademicCalendar;

const SCHOOLNAME = 'Lakshya International School';
const SCHOOL_ADDRESS = 'Khachrod Jaora Road Junction, Nagda Junction (M.P.)';
const SCHOOL_PHONE = '+91:-78798-22222';
const SENDTO = [
	'A' => 'Send to All',
	'S'	=> 'Send to Student',
	'T' => 'Send to Teacher'
];

const GENDER = [
    'M' => 'Male',
    'F' => 'Female',
    'O' => 'Other'
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
const PAYMENTMODE = [
	1 => 'Cash',
	2 => 'Demand Draft',
	3 => 'Cheque',
	4 => 'Online Payment',
	5 => 'Cash & Cheque',
	6 => 'Cash & Demand Draft',
	7 => 'POS Transcation',
	8 => 'NEFT/Bank Transfered',
	9 => 'IPOS',
	// 10 => 'e-Challan'
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
if (!function_exists('student_first_guardian')) {
    function student_first_guardian($student){
        
    	return $student->studentsGuardiantMast !=null ? (Arr::get(GUARDIAN_RELATION,$student->studentsGuardiantMast[0]['relation_id'])) .' Name :- '. $student->studentsGuardiantMast[0]['g_name'] : '';

     
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
const ConcessionDiscount = [
	'1' => 'Flat Rate',
	'2' => 'In Percent'
];

if(!function_exists('get_teachers')){
    function get_teachers(){
        return EmployeeMast::where('emp_type','T')->orderBy('name')->get();
    }
}
if(!function_exists('multiple_courses_get')){
    function multiple_courses_get($multiple_courses){

    	foreach ($multiple_courses as $value) {
	        $multiple_course =  explode('-', $value);
	        $std_class_id[] = $multiple_course[0];
	        $batch_id[] = $multiple_course[1];
	        $section_id[] = $multiple_course[2];
	        $medium[] = $multiple_course[3];
	    }
	    return [
	    	'std_class_id' 	 => $std_class_id,
	    	'batch_id'	 	 => $batch_id,
	    	'section_id'	 => $section_id,
	    	'medium'		 => $medium
	    ];

        return EmployeeMast::where('emp_type','T')->orderBy('name')->get();
    }
}


if(!function_exists('academic_dates')){
    function academic_dates($month,$year,$weekendDays = ['Sunday']){
         $calendarData = AcademicCalendar::whereYear('date_from',$year)
                        ->whereMonth('date_from',$month)
                        ->whereYear('date_upto',$year)
                        ->whereMonth('date_upto',$month)
                        ->where('user_id', Auth::user()->id)
                        ->get();

        $academic_dates = array();
        foreach ($calendarData as $key => $value) {
           for($date = $value->date_from->copy() ; $date->lte($value->date_upto); $date->addDay()){
                if(!in_array($date->dayName, $weekendDays)){
                    $symbol = 'H';
                    if($value->is_exam == '1'){
                        $symbol = 'E';
                    }
                    $academic_dates[$date->format('Y-m-d')]= $symbol;
                }
           }
        }
        return $academic_dates;
    }
}
if(!function_exists('month_dates')){
    function month_dates($monthStart,$monthEnd,$weekendDays = ['Sunday']){
        $monthDates = array();
          for($date =$monthStart; $date->lte($monthEnd) ; $date->addDay() ){
            $weekend = 0;
            if(in_array($date->dayName, $weekendDays)){
                $weekend = 1;
            }
            $monthDates[$date->format('Y-m-d')] = [
                'day' =>  intval($date->format('d')),
                'weekend' => $weekend
            ];
        }   
        return $monthDates;
    }
}


if(!function_exists('displaywords')){
     function displaywords($number){
         $no = (int)floor($number);
         $point = (int)round(($number - $no) * 100);
         $hundred = null;
         $digits_1 = strlen($no);
         $i = 0;
         $str = array();
         $words = array('0' => '', '1' => 'one', '2' => 'two',
          '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
          '7' => 'seven', '8' => 'eight', '9' => 'nine',
          '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
          '13' => 'thirteen', '14' => 'fourteen',
          '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
          '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
          '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
          '60' => 'sixty', '70' => 'seventy',
          '80' => 'eighty', '90' => 'ninety');
         $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
         while ($i < $digits_1) {
           $divider = ($i == 2) ? 10 : 100;
           $number = floor($no % $divider);
           $no = floor($no / $divider);
           $i += ($divider == 10) ? 1 : 2;


           if ($number) {
              $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
              $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
              $str [] = ($number < 21) ? $words[$number] .
                  " " . $digits[$counter] . $plural . " " . $hundred
                  :
                  $words[floor($number / 10) * 10]
                  . " " . $words[$number % 10] . " "
                  . $digits[$counter] . $plural . " " . $hundred;
           } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);


        if ($point > 20) {
          $points = ($point) ?
            "" . $words[floor($point / 10) * 10] . " " . 
                $words[$point = $point % 10] : ''; 
        } else {
            $points = $words[$point];
        }
        if($points != ''){        
            echo $result . "Rupees  " . $points . " Paise Only";
        } else {

            echo $result . "Rupees Only";
        }

      }
}
