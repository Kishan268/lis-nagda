<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class studentsGuardiantMast extends Model
{
    protected $table = 'students_guardiant_masts';
    protected $guarded =[];

    public function students_details(){
    	 return $this->belongsTo('App\Models\student\studentsMast', 's_id','id');
    } 
    public function professtion_type(){
    	 return $this->belongsTo('App\Models\master\professtionType', 'profession_status','id');
    } 
    public function guardiant_relation(){
    	 return $this->belongsTo('App\Models\master\stdReligions', 'relation_id');
    	 
    } 
    
}