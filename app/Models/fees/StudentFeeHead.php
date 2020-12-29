<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class StudentFeeHead extends Model
{
    protected $table = 'student_fee_head';
    protected $guarded =[];
    protected $primaryKey = 'std_fee_head_id';


    public function fee_instalment(){
    	return $this->belongsTo('App\Models\fees\StudentFeeInstalment','std_fee_inst_id');
    }
}
