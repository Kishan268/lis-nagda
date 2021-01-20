<?php

namespace App\Http\Controllers\Frontend\cbscSection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\setting\Committees;

class CbscSectionController extends Controller
{
    // public function index(){
    // 	return view('frontend/CBSC-Section/index');

    // }
    public function cbscInformation(){

        $file = public_path()."/school-documents.pdf";
            $headers = array('Content-Type: application/pdf',$file);

            return response()->file($file);

    }
    public function committees(){
        $committeesDatas = Committees::get();
    	return view('frontend/CBSC-Section/committees',compact('committeesDatas'));

    }
    public function transferCertificate(){
    	return view('frontend/CBSC-Section/transfer-certificate');

    }
    public function auditorsReport(){
    	return view('frontend/CBSC-Section/auditors-report');

    }
   
    
}
