<?php
namespace App\Helpers;
use Auth;
use App\User;
use App\Models\AcademicCalendar;

class Helpers 
{
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
?>