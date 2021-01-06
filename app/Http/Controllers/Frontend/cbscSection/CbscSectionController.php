<?php

namespace App\Http\Controllers\Frontend\cbscSection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
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
    	return view('frontend/CBSC-Section/committees');

    }
    public function transferCertificate(){
    	return view('frontend/CBSC-Section/transfer-certificate');

    }
    public function auditorsReport(){
    	return view('frontend/CBSC-Section/auditors-report');

    }
   
    
}
