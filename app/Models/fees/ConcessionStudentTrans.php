<?php

namespace App\Models\fees;

use Illuminate\Database\Eloquent\Model;

class ConcessionStudentTrans extends Model
{
	protected $table = "concession_students";
	public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;
    protected $guarded = [];
}
