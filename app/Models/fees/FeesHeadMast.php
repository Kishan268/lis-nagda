<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class FeesHeadMast extends Model
{
    protected $table = 'fees_head_masts';
    protected $guarded =[];

    public function Fine_type(){
  		return $this->hasMany('App\Models\fees\FineType','fees_head_mast_id','id');
   	}
}
