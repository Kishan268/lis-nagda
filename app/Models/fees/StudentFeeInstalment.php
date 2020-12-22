<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeeInstalment extends Model
{
    protected $table = 'student_fee_instalment';
    protected $guarded =[];
    protected $primaryKey = 'std_fee_inst_id';

}
