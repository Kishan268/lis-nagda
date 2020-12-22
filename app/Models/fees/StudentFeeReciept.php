<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeeReciept extends Model
{
    protected $table = 'student_fees_reciept';
    protected $guarded =[];
    protected $primaryKey = 'std_fee_recpt_id';
}
