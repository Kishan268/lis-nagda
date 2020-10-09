<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeCircular extends Model
{
    protected $table = 'notice_circulars';
    protected $guarded =[];

    public function get_student_id(){
  return $this->hasMany('App\Models\noticecircular\NoticeStudent','id','notice_student_id');
   	}
}
