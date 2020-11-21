<?php

namespace App\Models\timetable;

use Illuminate\Database\Eloquent\Model;

class ExamTimeTable extends Model
{
    protected $table = 'exam_time_table';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded =[];
}
