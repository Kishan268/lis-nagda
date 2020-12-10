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
use App\Models\fees\FeesHeadTrans;
use App\Models\fees\FeesInstalmentMast;
use App\Models\fees\FeesMast;
use App\Models\fees\StudentFeesTrans;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FeesMast::get();
        // dd( $data);
        return view ('admin.fees.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
         $classes = studentClass::get();
         $sections = studentSectionMast::get();


         // $headerName = Helpers::headerName();
         // $currencyCode = Helpers::currencyCode();
         $studentGender = Helpers::studentGender();
         $castCategory = Helpers::castCategory();
         $Include = Helpers::Include();

         $batches = studentBatch::select('id','batch_name')->orderBy('batch_name')->get();

         // dd($Include);
         $fee_heads = FeesHeadMast::where('status','A')->orderBy('head_sequence_order')->get();

        return view ('admin.fees.create',compact('classes','batches','sections','fee_heads','studentGender','castCategory','Include'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
            $fees_mast = [
                'fees_name'         => $request->fees_name,
                'fees_amt'          => $request->fees_amt,
                'receipt_head_id'   => $request->receipt_head_id,
                'currency_code'     => $request->currency_code,
                'no_of_instalment'  => $request->no_of_instalment,
                'courseselection'   => $request->courseselection,
                'online_discount'   => $request->online_discount,
                'is_fees_student_assign'   => $request->is_fees_student_assign,
                'courseselection'   => $request->courseselection,



            ];












        die;
        $data['fees_name']    = $request->name;
        $data['fees_amt']       = $request->amount;
        $data['header_name_to_be_display_reci'] = $request->tmpinst_name;
        $data['currency_code']     = $request->currency_code;
        $data['no_of_instalment'] = $request->paymentselection;
        $data['courseselection']    = $request->courseselection;
        $data['discount']   = $request->discount;
        $data['refundable']    = $request->refundable;
        $data['is_fees_student_assign']    = $request->is_fees_student_assign;
        $data['gender']         = $request->gender;
        $data['cast_category']  = $request->caste;
        $data['rte_status']     = $request->rte;
        $data['feesfor']        = $request->feesfor;
        // $data['course_batches']       = $request->course_batches;


        if ($request->course_batches) {
            $data['course_batches'] =json_encode($request->course_batches);
            
        }else{
            $data['course_batches']    = json_encode($request->course.'_'.$request->batch.'_'.$request->section);
            
        }
        // dd($request);
        $lastId = FeesMast::create($data)->id;
        // $lastId = 1;

        if ($request->courseselection == 2 && $request->feesfor == 2) {
            
            $data['students_id'] = $request->students_id;
                for ($i=0; $i < count($request->students_id); $i++) {

                    $data3 = array(
                        'f_id'=>$lastId,
                        's_id'=>$request->students_id[$i],
                        'due_amount'=>$request->due_amount[$i],
                    );
                    StudentFeesTrans::create($data3);
                }


        }

        $data1['installment_mode'] = $request->paymentselection;
        
        if ($request->instalment1) {
            $data1['instalment_amount1']     = $request->instalment1;
            $data1['st_date1']    = $request->startdate1;
            $data1['ed_date1']    = $request->duedate1;
        }if($request->instalment2){
            $data1['instalment_amount2']     = $request->instalment2;
            $data1['st_date2']    = $request->startdate2;
            $data1['ed_date2']    = $request->duedate2;
        }if($request->instalment3){
            $data1['instalment_amount3']     = $request->instalment3;
            $data1['st_date3']    = $request->startdate3;
            $data1['ed_date3']    = $request->duedate3;
        }if($request->instalment4){
            $data1['instalment_amount4']     = $request->instalment4;
            $data1['st_date4']    = $request->startdate4;
            $data1['ed_date4']    = $request->duedate4;
        }if($request->instalment5){
            $data1['instalment_amount5']     = $request->instalment5;
            $data1['st_date5']    = $request->startdate5;
            $data1['ed_date5']    = $request->duedate5;
        }if($request->instalment6){
            $data1['instalment_amount6']     = $request->instalment6;
            $data1['st_date6']    = $request->startdate6;
            $data1['ed_date6']    = $request->duedate6;
        }else if($request->instalment7){
            $data1['instalment_amount7']     = $request->instalment7;
            $data1['st_date7']    = $request->startdate7;
            $data1['ed_date7']    = $request->duedate7;
        }if($request->instalment8){
            $data1['instalment_amount8']     = $request->instalment8;
            $data1['st_date8']    = $request->startdate8;
            $data1['ed_date8']    = $request->duedate8;
        }if($request->instalment9){
            $data1['instalment_amount9']     = $request->instalment9;
            $data1['st_date9']    = $request->startdate9;
            $data1['ed_date9']    = $request->duedate9;
        }if($request->instalment10){
            $data1['instalment_amount10']     = $request->instalment10;
            $data1['st_date10']    = $request->startdate10;
            $data1['ed_date10']    = $request->duedate10;
        }if($request->instalment11){
            $data1['instalment_amount11']     = $request->instalment11;
            $data1['st_date11']    = $request->startdate11;
            $data1['ed_date11']    = $request->duedate11;
        }if($request->instalment12){
            $data1['instalment_amount12']     = $request->instalment12;
            $data1['st_date12']    = $request->startdate12;
            $data1['ed_date12']    = $request->duedate12;
        }
        // dd($data1);
        if (!empty($data1)) {
            
            FeesInstalmentMast::create($data1);
        }
        
        foreach ($request->fees_heads as $key => $value) {

            $fees_heads['fees_head_mast_id'] = $lastId;
            $fees_heads['fees_head_id']  = $value;
            $fees_heads['amount'] = $request->fees_amount[$key];

            $data = FeesHeadTrans::create($fees_heads);
        }
        return redirect('fees')->with('success','Fess created successfully');
       // return view ('admin.fees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $headerName = Helpers::headerName();
        $data = FeesMast::with('fees_heads')->where('id',$id)->first();

        $FeesHeadMast = array();
        foreach ($data->fees_heads as  $value) {
            $FeesHeadMast [] = $value->fees_head_id;
        }
        $FeesHead = FeesHeadMast::whereIn('id',$FeesHeadMast)->get();
        // dd($FeesHead);
        return view ('admin.fees.edit',compact('data','headerName','FeesHead'));
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
        dd($id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
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
