<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    protected $table = 'teacher_attendances';
    protected $guarded =[];

    public function staff(){
   		return $this->belongsTo('App\User','staff_id');
   	}
}
