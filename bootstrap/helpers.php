<?php 

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

if(!function_exists('student_gender')){
	function student_gender(){
		return 'hello';
	}
}