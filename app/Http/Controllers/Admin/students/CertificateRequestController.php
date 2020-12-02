<?php

namespace App\Http\Controllers\Admin\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\CertificateRequest;
use Auth;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\studentclass\AssignSubjectToClass;
use App\Models\Certificate;
use App\Models\setting\Settings;
class CertificateRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifReq = CertificateRequest::get();
            return view('admin.students.certificate_request.index',compact('certifReq'));
    }

    
    public function create()
    {
        return view('admin.students.certificate_request.create');
        
    }

    public function store(Request $request)
    {

       $this->validate($request,[
                        'cert_type'=>'required',
                        'reason'=>'required',
                        'apply_date'=>'required'
                    ]);
           $data = [
            'cert_type' =>$request->cert_type,
            'reason' =>$request->reason,
            'apply_date' =>date('Y-m-d',strtotime($request->apply_date)),
            'stu_id' =>Auth::user()->student_id,
            ];
            $createcertiReq = CertificateRequest::create($data);
            if ($createcertiReq) {
                return redirect()->route('certificate-request.index')->with('success','Certificate request send successfully');
                
            }

    }

    public function show($id)
    {
         
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function downloadCerfificate($id){

       $downloadCert = CertificateRequest::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch','gaudiantInfo'])->where('cert_req_id',$id)->first();

        $subjectName = AssignSubjectToClass::with('assign_subjectId.subject')->where('std_class_id',$downloadCert->studentInfo->std_class_id)
                    ->where('section_id',$downloadCert->studentInfo->section_id)
                    ->where('batch_id',$downloadCert->studentInfo->batch_id)->first();
        $settings = studentsMast::with('settings')->where('id',Auth::user()->id)->first();

        
        return view('admin.students.certificate_request.download-cert',compact('downloadCert','settings','subjectName'));

    }
}
