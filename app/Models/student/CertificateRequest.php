<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;

class CertificateRequest extends Model
{
    protected $table = 'certificate_req';
    protected $guarded =[];

    public function studentInfo(){
    	 return $this->belongsTo('App\Models\student\studentsMast', 'stu_id');	 
    }
    public function settingData(){
    	 return $this->belongsTo('App\Models\setting\Settings', 'user_id');	 
    }
     
}
