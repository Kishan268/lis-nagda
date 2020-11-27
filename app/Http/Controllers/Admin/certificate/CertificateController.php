<?php

namespace App\Http\Controllers\Admin\certificate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\CertificateRequest;
use App\Models\setting\Settings;
use Auth;
class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifReq = CertificateRequest::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch'])->get();
        // dd($certifReq);
            return view('admin.certificates.index',compact('certifReq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certifReqShow = CertificateRequest::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch'])->where('cert_req_id',$id)->first();
        return view('admin.certificates.show',compact('certifReqShow'));

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

    public function certificateApprove($id)
    {
        $certifReqApprove = CertificateRequest::with(['studentInfo.student_class','studentInfo.student_section','studentInfo.student_batch'])->where('cert_req_id',$id)->first();
        // dd($certifReqApprove);
        $settings = Settings::where('user_id',Auth::user()->id)->first();
        return view('admin.certificates.cert_approve',compact('certifReqApprove','settings'));

    }
}
