<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Career;

class CareerController extends Controller
{
   
    public function openings(){
    	return view('frontend/More/openings');

    }
     public function career(){
    	return view('frontend/More/career');

    }
     public function store(Request $request){
     	$data  = $request->validate([
     		'name'=>'required',
     		'email'=>'required',
     		'subject'=>'required',
     		'post'=>'required',
     		'resume'=>'required|max:10000|mimes:doc,docx,pdf',
     		'message'=>'required'
     	]);
     	if($request->hasFile('resume')){
            $data['resume'] =  file_upload($request->resume,'Career');
        }

        Career::create($data);

        	return redirect()->back()->with('success','Job apply successfull');


    }


}
