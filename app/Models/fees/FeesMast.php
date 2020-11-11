<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class FeesMast extends Model
{
    protected $table = 'fees_masts';
    protected $guarded =[];

    public function fees_heads(){
  		return $this->hasMany('App\Models\fees\FeesHeadTrans','fees_head_mast_id','id');
    	
    }
}
