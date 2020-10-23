<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helpers;
use App\Models\frontend\AdmissionInquiryForm;
use Auth;
use App\User;
class AdmissionForm extends Controller
{
    /*public function index(){
         $studentGenders = Helpers::studentGender();
         $studentBloodGroups    = stdBloodGroup::get();
         $stdNationality    = stdBloodGroup::get();
         $mothetongueMast    = mothetongueMast::get();
         $castCategory    = castCategory::get();
         $studentReligions    = stdReligions::get();
         $professtionType    = professtionType::get();
         $guardianDesignation    = guardianDesignation::get();
         $country    = countryMast::get();
         $state    = stateMast::get();
         $city    = cityMast::get();

    	return view('frontend.Admission.Form.index',compact('studentGenders','studentBloodGroups','stdNationality','mothetongueMast','castCategory','studentReligions','professtionType','guardianDesignation','country','state','city'));
    }
    public function getAcadmicState(Request $request){
        $id =$request->state_id;
        $getState = stateMast::where('id', $id)->get();
            return response()->json($getState);
    } 
    public function getAcadmicCountry(Request $request){
         $id = $request->country_id;
         $getCountry = countryMast::where('id', $id)->get();
            return response()->json($getCountry);
    }*/

    public function admissionInquiryForm(Request $request){
    	$data = $request->validate([
					'your_name'=>'required',
					'your_email'=>'required',
					'child_name'=>'required',
					'child_age'=>'required',
					'child_class'=>'required',
					'mobile_no'=>'required'
				]);
        $create_stud = AdmissionInquiryForm::create($data);
        if ( $create_stud) {
         
        	return redirect()->back()->with('success','Admission Inquiry Send successfully');
         } 
    }
    public function getadmissionInquiryFormData(){
    	$datas = AdmissionInquiryForm::get();
    	return view('admin.admission-inquiry.index',compact('datas'));
    }
    public function getadmissionInquiryForNotification(){
    	$datas = AdmissionInquiryForm::where('status',0)->get();
    	$count = count($datas);
    	return view('layout.header',compact('count'));
    }
}
