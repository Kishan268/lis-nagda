<?php

namespace App\Http\Controllers\Admin\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\studentsMast;
use Carbon\Carbon;

class studentManageController extends Controller
{


	public function forwardTranferStudent(Request $request){

    	$stud_id =  $request->stud_id;
    	$forward_date = Carbon::now()->format('Y-m-d H:i:s');

    	foreach ($stud_id as $id) {
    		$student = studentsMast::find($id);
    		$data =[
    			'std_class_id' => $request->forwardClass,
    			'section_id' => $request->forwardSection,
    			'batch_id' => $request->forwardBatch,
    			'forward_date' => $forward_date
    		];
    		$student->update($data);
    	}
    	return "Success";
    }

    public function passoutStudent(Request $request){
        $stud_id =  $request->stud_id;
    	
    	foreach ($stud_id as $id) {
    		$student = studentsMast::find($id);
    		$data =[
    			'passout_date' => $request->passout_date,
    			'status' => 'P'    		
    		];
    		$student->update($data);
    	}
    	return 'Success';
    }

     public function dropoutStudent(Request $request){
    	$stud_id =  $request->stud_id;
    	$dropout_date = $request->dropout_date.' '.date('H:i:s ');
    	
    	foreach ($stud_id as $id) {
    		$student = studentsMast::find($id);
    		$data =[
    			'dropout_date' => $dropout_date,
    			'status' => 'D'    		 //Drop student
    		];
    		$student->update($data);
    	}
    	return 'Success';
    }
}
