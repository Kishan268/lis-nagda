<?php 

const SENDTO = [
	'A' => 'Send to All',
	'S'	=> 'Send to Student',
	'T' => 'Send to Teacher'
];

if(!function_exists('student_gender')){
	function student_gender(){
		return 'hello';
	}
}