<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class studentsMast extends Model
{
    protected $table = 'students_masts';
    protected $guarded =[];

    public function student_batch(){
    	 return $this->belongsTo('App\Models\master\studentBatch', 'batch_id');
    }
    public function student_section(){
    	 return $this->belongsTo('App\Models\master\studentSectionMast', 'section_id');
    }
    public function student_class(){
    	 return $this->belongsTo('App\Models\master\studentClass', 'std_class_id');
    }
    public function acadmic_country_mast(){
    	 return $this->belongsTo('App\Models\master\countryMast', 'acadmic_country_id');
    }
    public function acadmic_stateMast(){
    	 return $this->belongsTo('App\Models\master\stateMast', 'acadmic_state_id');
    }
    public function acadmic_cityMast(){
    	 return $this->belongsTo('App\Models\master\cityMast', 'acadmic_city_id');
    }
    public function castCategory(){
    return $this->belongsTo('App\Models\master\castCategory', 'reservation_class_id');
    }
    public function stdReligions(){
    	 return $this->belongsTo('App\Models\master\stdReligions', 'religion_id');
    }
    public function stdNationality(){
    	 return $this->belongsTo('App\Models\master\stdNationality', 'nationality_id');
    } 
    public function stdBloodGroup(){
    	 return $this->belongsTo('App\Models\master\stdBloodGroup', 'blood_group_id');
    }
    public function mothetongueMast(){
    	 return $this->belongsTo('App\Models\master\mothetongueMast', 'language_id','id');
    }
    public function professtionType(){
    	 return $this->belongsTo('App\Models\master\professtionType', 'professtion_id','id');
    }
    public function guardianDesignation(){
    	 return $this->belongsTo('App\Models\master\professtionType', 'guardian_designation_id','id');
    }  

    public function studentsGuardiantMast(){
    	 return $this->hasMany('App\Models\student\studentsGuardiantMast', 's_id');
    } 
   	public function p_country(){
    	 return $this->belongsTo('App\Models\master\countryMast', 'p_country_id');
    }
    public function p_state(){
    	 return $this->belongsTo('App\Models\master\stateMast', 'p_state_id');
    }
    public function p_city(){
    	 return $this->belongsTo('App\Models\master\cityMast', 'p_city_id');
    }
    public function l_country(){
    	 return $this->belongsTo('App\Models\master\countryMast', 'l_country_id');
    }
    public function l_state(){
    	 return $this->belongsTo('App\Models\master\stateMast', 'l_state_id');
    }
    public function l_city(){
    	 return $this->belongsTo('App\Models\master\cityMast', 'l_city_id');
    }

    public function student_doc(){
    	 return $this->hasMany('App\Models\student\StudenstDoc', 's_id');
    }
    public function attendances(){
        return $this->hasMany('App\Models\StudentAttendance','s_id');
    }

      public function get_student_id(){
            return $this->belongsTo('App\Models\noticecircular\NoticeStudent','id','notice_student_id');
    }
     public function user_data(){
            return $this->belongsTo('App\User','id','student_id');
    }
    public function siblings(){
        return $this->hasMany('App\Models\student\StudentSiblings','s_id');
    }
}
