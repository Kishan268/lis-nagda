<?php

namespace App\Http\Controllers\Admin\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\CertificateRequest;
use Auth;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.students.certificate_request.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            // dd($data);
            $createcertiReq = CertificateRequest::create($data);
            if ($createcertiReq) {
                return redirect()->route('certificate-request.index')->with('success','Certificate request send successfully');
                
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
        //
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
}
