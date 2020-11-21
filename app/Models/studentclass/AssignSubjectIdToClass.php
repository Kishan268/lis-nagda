<?php

namespace App\Models\studentclass;

use Illuminate\Database\Eloquent\Model;

class AssignSubjectIdToClass extends Model
{
    protected $table = 'assign_subject_id_to_classes';
    protected $guarded =[];

    public function subjectName(){
    	return $this->belongsTo('App\Models\master\Subject','mendatory_subject_id');
    }
}
