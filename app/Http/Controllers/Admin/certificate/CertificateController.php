<?php

namespace App\Http\Controllers\Admin\certificate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\CertificateRequest;
use App\Models\Certificate;
use App\Models\setting\Settings;
use Auth;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(->where('batch_id',session('current_batch')));
        $certifReq = Certificate::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch'])->get();
            return view('admin.certificates.index',compact('certifReq'));
    }

    public function create()
    {
        // $certifCreate = CertificateRequest::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch','gaudiantInfo'])->where('cert_req_id',$id)->first();
        // $settings = Settings::where('user_id',Auth::user()->id)->first();
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
         $settings = Settings::get();

        return view('admin.certificates.create',compact('classes','batches','sections','settings'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'school_board' => 'required',
            'batch_id' => 'required',
            'stu_id' => 'required',
            'cert_type' => 'required',
            'reason'=>'required',
            'general_conduct'=>'required',
            'apply_date'=>'required',
            'issue_date'=>'required'
            ]);
         $data = [
                'school_board' => $request->school_board,
                'batch_id' => $request->batch_id,
                'stu_id' => $request->stu_id,
                'cert_type' => $request->cert_type,
                'reason' => $request->reason,
                'general_conduct' => $request->general_conduct,
                'apply_date'=>date('Y-m-d',strtotime($request->apply_date)),
                'issue_date'=>date('Y-m-d',strtotime($request->issue_date))
            ];
           if ($request->approve_request) {
                $data['cert_req_id'] = $request->cert_req_id;
                $insertData = Certificate::create($data);
                $updateStatus = CertificateRequest::where('stu_id',$request->stu_id)->where('cert_req_id',$request->cert_req_id)->update(['status'=>'2']);
                return redirect()->route('certificates.index')->with('success','Certificate created successfully');

             }else{
                return redirect()->route('certificate_stud_req')->with('success','Certificate appoved successfully');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showRequest = Certificate::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch','gaudiantInfo'])->where('cert_id',$id)->first();
        // dd($showRequest);
        $settings = Settings::where('user_id',Auth::user()->id)->first();
        return view('admin.certificates.show',compact('showRequest','settings'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function certRequest(){
         $certifReq = CertificateRequest::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch'])->get();
         // dd($certifReq);
            return view('admin.certificates.student_request.index',compact('certifReq'));
    }
    public function certificateApprove($id)
    {
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
         $settings = Settings::get();
         $certifReqApprove = CertificateRequest::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch','gaudiantInfo'])->where('cert_req_id',$id)->first();
        // dd($certifReqApprove);
        return view('admin.certificates.student_request.cert_approve',compact('certifReqApprove','settings' ,'classes','batches','sections','settings'));

    }

    public function certRequestApprove(Request $request){
        
        // $this->validate($request,[
        //     'cert_req_id' => 'required',
        //     'school_board' => 'required|max:120',
        //     'batch_id' => 'required',
        //     'stu_id' => 'required',
        //     'cert_type' => 'required',
        //     'reason'=>'required',
        //     'general_conduct'=>'required',
        //     'apply_date'=>'required',
        //     'issue_date'=>'required',
        //     'zip_code'=>'required',
        //     'school_code'=>'required',
        //     'school_board'=>'required',
        //     ]); 

         $data = [
                'cert_req_id' => $request->cert_req_id,
                'school_board' => $request->school_board,
                'batch_id' => $request->batch_id,
                'stu_id' => $request->stu_id,
                'cert_type' => $request->cert_type,
                'reason' => $request->reason,
                'general_conduct' => $request->general_conduct,
                'apply_date'=>$request->apply_date,
                'issue_date'=>date('Y-m-d',strtotime($request->issue_date))
            ];

             
            $insertData = Certificate::create($data);
            if($insertData){
                $updateStatus = CertificateRequest::where('stu_id',$request->stu_id)->where('cert_req_id',$request->cert_req_id)->update(['status'=>'2']);
                return redirect()->route('certificates.index')->with('success','Certificate approved successfully');
            }
        
    }

    public function getStudents(Request $request){
        $students = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->get();
       return response()->json($students);

    }
    public function getAdmissionNo(Request $request){

        $admission_no = studentsMast::where('id',$request->studentId)
                                ->first();

       return response()->json($admission_no);

    }
    public function cerReqDecliceReason(Request $request){

        // dd($request);
        $updateStatus = CertificateRequest::where('stu_id',$request->stud_id)->where('cert_req_id',$request->cert_id)->update(['decline_reason'=>$request->decline_reason]);
        if ($updateStatus) {
            return "success";
        }else{
            return "error";
        }


    }
}
