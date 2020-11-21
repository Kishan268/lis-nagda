<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Model;

class studentBatch extends Model
{
    protected $table = 'student_batches';
    protected $guarded =[];
     public function class_name(){
  		return $this->belongsTo('App\Models\master\studentClass','class_id');
   	}
}
