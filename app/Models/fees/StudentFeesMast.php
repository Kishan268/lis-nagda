<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeesMast extends Model
{
    protected $table = 'student_fees_mast';
    protected $guarded =[];
    protected $primaryKey = 'std_fees_mast_id';
}
