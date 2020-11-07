<?php

namespace App\Http\Controllers\Admin\fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\student\studentsMast;
use Helpers;
use App\Models\fees\FeesHeadMast;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.fees.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $headerName = Helpers::headerName();
         $currencyCode = Helpers::currencyCode();
         $courseSelection = Helpers::courseSelection();
         $studentGender = Helpers::studentGender();
         $castCategory = Helpers::castCategory();
         $Include = Helpers::Include();
         // dd($Include);
         $feesHeadMast = FeesHeadMast::get();

        return view ('admin.fees.create',compact('classes','batches','sections','headerName','currencyCode','feesHeadMast','courseSelection','studentGender','castCategory','Include'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $data['name']            = $request->name;
        $data['amount']          = $request->amount;
        $data['tmpinst_name']    = $request->tmpinst_name;
        $data['currency_code']   = $request->currency_code;
        $data['examination_fees'] = $request->examination_fees;
        $data['headAmt_26196']   = $request->headAmt_26196;
        $data['activity_fee']    = $request->activity_fee;
        $data['headAmt_26197']   = $request->headAmt_26197;
        $data['tuition_fee']     = $request->tuition_fee;
        $data['headAmt_26198']   = $request->headAmt_26198;
        $data['science_fee']     = $request->science_fee;
        $data['headAmt_26199']   = $request->headAmt_26199;
        $data['tuition_fees']    = $request->tuition_fees;
        $data['headAmt_33085']   = $request->headAmt_33085;
        $data['paymentselection']= $request->paymentselection;
        $data['courseselection'] = $request->courseselection;
        $data['instalment1'] = $request->instalment1;
        $data['startdate1']  = $request->startdate1;
        $data['duedate1']    = $request->duedate1;
        $data['instalment2'] = $request->instalment2;
        $data['startdate2']  = $request->startdate2;
        $data['duedate2']    = $request->duedate2;

        $data['instalment3'] = $request->instalment3;
        $data['startdate3']  = $request->startdate3;
        $data['duedate3']    = $request->duedate3;
        
        $data['instalment4'] = $request->instalment4;
        $data['startdate4']  = $request->startdate4;
        $data['duedate4']    = $request->duedate4;
        
        $data['instalment5'] = $request->instalment5;
        $data['startdate5']  = $request->startdate5;
        $data['duedate5']    = $request->duedate5;
        
        $data['instalment6'] = $request->instalment6;
        $data['startdate6']  = $request->startdate6;
        $data['duedate6']    = $request->duedate6;
        
        $data['instalment7'] = $request->instalment7;
        $data['startdate7']  = $request->startdate7;
        $data['duedate7']    = $request->duedate7;
        
        $data['instalment8']  = $request->instalment8;
        $data['startdate8']   = $request->startdate8;
        $data['duedate8']     = $request->duedate8;
        
        $data['instalment9']  = $request->instalment9;
        $data['startdate9']   = $request->startdate9;
        $data['duedate9']     = $request->duedate9;
        
        $data['instalment10'] = $request->instalment10;
        $data['startdate10']  = $request->startdate10;
        $data['duedate10']    = $request->duedate10;
        
        $data['instalment11'] = $request->instalment11;
        $data['startdate11']  = $request->startdate11;
        $data['duedate11']    = $request->duedate11;
        
        $data['instalment12'] = $request->instalment12;
        $data['startdate12']  = $request->startdate12;
        $data['duedate12']    = $request->duedate12;

        $data['gender']      = $request->gender;
        $data['caste']       = $request->caste;
        $data['rte']         = $request->rte;
        $data['discount']    = $request->discount;
        $data['is_fees_student_assign']    = $request->is_fees_student_assign;
        $data['feesfor']    = $request->feesfor;
        $data['course_batches']    = $request->course_batches;
        /*dd($data['course_batches']);
        for ($i=0; $i < count($request->course_batches) ; $i++) { 
            echo "<pre>";
            print_r($data['course_batches']);
        }*/
        
        // dd($request);
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

    public function dashboard(){
        return view ('admin.fees.dashboard');
    }
    public function getCourseBatches(Request $request){
         $students = studentsMast::with('student_class','student_section','student_batch')->get();
       return response()->json($students);
        // studentSectionMast::
        // return view ('admin.fees.dashboard');
    }
    public function feesSudentList(Request $request){
        // dd($request);
         $students = studentsMast::where('batch_id',$request->batch)
                        ->where('std_class_id',$request->course)
                        ->where('section_id',$request->section)
                        ->get();
        return view ('admin.fees.table',compact('students'));
    } 
}
