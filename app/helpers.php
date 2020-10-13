<?php

 class Helpers{
	 
	 function customRequestCaptcha(){
	    return new \ReCaptcha\RequestMethod\Post();
	}
 	public static function schoolClasses(){

 		$array = array([
				 'Nursery',
				 'LKG',
				 'UKG',
				 '1st',
				 '2nd',
				 '3rd',
				 '4th',
				 '5th',
				 '6th',
				 '7th',
				 '8th',
				 '9th',
				 '10th',
				 '11th',
				 '12th'
		 ]);
   		return $array;    
 	}

 	public static function schoolBatches(){
 		$array = array([
				 '2018-19',
				 '2019-2020'
		 ]);
   		return $array;    
 	}
 	public static function schoolSection(){
 		$array = array([
				 'EM',
				 'HM'
		 ]);
   		return $array;    
 	}

 	// public static function studentGender(){
 	// 	$array = array([
		// 		 'Male',
		// 		 'Female',
		// 		 'Other'
		//  ]);
  //  		return $array;    
 	// }
 	public static function studentGender(){
 		$array = array([
				 '1'=>'Male',
				 '2'=>'Female',
				 '3'=>'Other'
		 ]);
   		return $array;    
 	}
 	public static function castCategory (){
 		$array = array([
				 'OBC',
				 'GENERAL',
				 'SC',
				 'ST',
				 'EWS',
				 'SBC',
				 'VJ-A',
				 'NT-B',
				 'NT-C',
				 'NT-D',
				 'Other'
		 ]);
   		return $array;    
 	}
 	public static function studentReligion (){
 		$array = array([
				 'Hindu',
				 'Muslim',
				 'Sikh',
				 'Christian',
				 'Buddhist',
				 'Jain',
				 'Zoroastrianism',
				 'Other'
		 ]);
   		return $array;    
 	}
 	public static function studentNationality (){
 		$array = array([
				 'Hindu',
				 'Muslim'
		 ]);
   		return $array;    
 	}

 	public static function studentBloodGroup (){
 		$array = array([
				 'A+',
				 'A-',
				 'B+',
				 'B-',
				 'O+',
				 'O-',
				 'AB+',
				 'AB-'
		 ]);
   		return $array;    
 	}
 	public static function studentMothertongue (){
 		$array = array([
				 'AFRIKAANS',
				 'AMHARIC',
				 'ARABIC',
				 'AZERBAIJANI',
				 'BELARUSIAN',
				 'BULGARIAN',
				 'BENGALI',
				 'TIBETAN STANDARD',
				 'CATALAN',
				 'CZECH',
				 'WELSH',
				 'DANISH',
				 'GERMAN',
				 'EWE',
				 'GREEK',
				 'ENGLISH',
				 'ESPERANTO',
				 'SPANISH',
				 'ESTONIAN',
				 'BASQUE',
				 'PERSIAN',
				 'FINNISH',
				 'FAROESE',
				 'FRENCH',
				 'IRISH',
				 'GALICIAN',
				 'GUJARATI',
				 'HEBREW',
				 'HINDI',
				 'CROATIAN',
				 'HUNGARIAN',
				 'ARMENIAN',
				 'INTERLINGUA',
				 'INDONESIAN',
				 'ICELANDIC',
				 'ITALIAN',
				 'JAPANESE',
				 'GEORGIAN',
				 'KIKUYU',
				 'KHMER',
				 'KANNADA',
				 'KOREAN',
				 'GANDA',
				 'LAO',
				 'LITHUANIAN',
				 'LATVIAN',
				 'MACEDONIAN',
				 'MALAYALAM',
				 'MARATHI',
				 'MALAY',
				 'MALTESE',
				 'BURMESE',
				 'NORWEGIAN BOKMAL',
				 'NEPALI',
				 'DUTCH',
				 'NORWEGIAN NYNORSK	',
				 'NORWEGIAN',
				 'ORIYA',
				 'POLISH',
				 'PORTUGUESE',
				 'ROMANSH',
				 'ROMANIAN',
				 'RUSSIAN',
				 'NORTHERN SAMI',
				 'SLOVAK',
				 'SLOVENE',
				 'SHONA',
				 'ALBANIAN',
				 'SERBIAN',
				 'SWEDISH',
				 'TAMIL',
				 'TELUGU',
				 'THAI',
				 'TIGRINYA',
				 'TAGALOG',
				 'TURKISH',
				 'UKRAINIAN',
				 'URDU',
				 'VIETNAMESE',
				 'CHINESE SIMPLIFIED',
				 'CHINESE TRADITIONAL',
				 'OTHERS'
		 ]);
   		return $array;    
 	}
 } 

