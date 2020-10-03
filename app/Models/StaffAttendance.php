<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffAttendance extends Model
{
    protected $table = 'staff_attendances';
    protected $guarded =[];

    public function staff(){
   		return $this->belongsTo('App\User','staff_id');
   	}
}
