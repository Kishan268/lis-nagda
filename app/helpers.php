<?php
// namespace App\Helpers;
use Auth;
use App\User;
use App\Models\AcademicCalendar;

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
 		$array = array(
				 '1'=>'Male',
				 '2'=>'Female',
				 '3'=>'Other'
		 );
   		return $array;    
 	}
 	public static function castCategory (){
 		$array = array(
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
		 );
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


 	  
 	public static function headTypes (){
 		$array = array(
				 'Permanent',
				 'Temporary'
		 );
   		return $array;    
 	}
 	public static function fineTypes (){
 		$array = array(
				 'Fixed',
				 'Per Day'
		 );
   		return $array;    
 	}
 	public static function fine (){
 		$array = array(
				 'Amount',
				 'Percentage'
		 );
   		return $array;    
 	}
 	public static function headerName (){
 		$array = array(
				 'Jath Public Hr. Sec. School, Ratlam'
		 );
   		return $array;    
 	}
 	public static function currencyCode (){
 		$array = array(
				 'INR',
				 'USD',
		 );
   		return $array;    
 	}
 	public static function courseSelection(){
 		$array = array(
				 'Multiple Courses',
				 'Single Course',
		 );
   		return $array;    
 	}
 	public static function Include(){
 		$array = array(
				 'RTE',
				 'Without RTE',
		 );
   		return $array;    
 	}
 	public static function academic_dates($month,$year,$weekendDays = ['Sunday']){

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

    public static function month_dates($monthStart,$monthEnd,$weekendDays = ['Sunday']){
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

