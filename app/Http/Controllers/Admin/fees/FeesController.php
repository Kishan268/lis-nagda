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
use App\Models\master\Discounts;
use App\Models\transport\BusFeeStructure;

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
        // dd($request->all());
            // $tution_fee = '0';


            $installable_amnt       = $request->installable_amnt;
            $non_installable_amnt   = $request->non_installable_amnt;
            $no_of_instalment = $request->no_of_instalment;
            $fees_mast = [
                'fees_name'             => $request->fees_name,
                'fees_amt'              => $request->fees_amt,
                'receipt_head_id'       => $request->receipt_head_id,
                'currency_code'         => $request->currency_code,
                'no_of_instalment'      => $request->no_of_instalment,
                'courseselection'       => $request->courseselection,
                'online_discount'       => $request->online_discount,
                'is_fees_student_assign'=> $request->is_fees_student_assign,
                'courseselection'       => $request->courseselection,
                'std_class_id'          => $request->courseselection == '1' ? $request->std_class_id : null,
                'batch_id'              => $request->courseselection == '1' ? $request->batch_id : null,
                'section_id'            => $request->courseselection == '1' ? $request->section_id : null,
                'medium'                => $request->courseselection == '1' ? $request->medium : null,
                'gender'                => $request->feesfor == '1' ? $request->gender : null,
                'reservation_class_id'  => $request->feesfor == '1' ? $request->reservation_class_id : null,
                'rte_status'            => $request->feesfor == '1' ? $request->rte_status : null,
                'installable_amnt'      => $installable_amnt,
                'non_installable_amnt'  => $non_installable_amnt,

            ];

           // $fees = FeesMast::create($fees_mast);


            if(isset($request->fees_head)){
                foreach ($request->fees_head as $key => $fee_head) {
                    $fees_heads[] = [
                        'fees_head_id'  => $fee_head,
                        'head_amt'      => $request->head_amnt[$key],
                        // 'fees_id'       => $fees->id,
                        'fees_id'       => '1'
                    ];
                }
                //Tution fee check we know tution fee id is 4 
                //later we do this

                // $tution_fee_check = collect($fees_heads)->where('fees_head_id',4)->first();
                // $tution_fee = !empty($tution_fee_check) ? $tution_fee_check['head_amt'] : $tution_fee;
                
            }


            //installable amount we perform all discounts 

          //this payment add with non first installment
            //instalement
            // return $request->no_of_instalment;

            for($i = 0; $i < $request->no_of_instalment;$i++){
                $fees_inst[] = [
                    // 'fees_id'       => $fees->id,
                    'fees_id'       => '1',
                    'instalment_amt'=> $request->instalment_amt[$i],
                    'start_dt'      => $request->start_dt[$i],
                    'end_dt'        => $request->end_dt[$i]
                ];
            }


            if($request->courseselection == '1'){
                if($request->feesfor =='1'){
                    $students = studentsMast::select('id','gender','dob','staff_ward','staff_id','bus_fee_id','age','std_class_id')->with(['siblings.sibling_detail' => function($q){
                        $q->where('students_masts.status','R');
                    }])->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>'R']);
                    if($request->gender =='all' && $request->reservation_class_id != 'all'){
                        $students = $students->where(['reservation_class_id' => $request->reservation_class_id]);

                    }else if($request->gender !='all' && $request->reservation_class_id == 'all'){
                        $students = $students->where(['gender' => $request->gender]);

                    }else if($request->gender !='all' && $request->reservation_class_id != 'all'){
                        $students = $students->where(['gender' => $request->gender,'reservation_class_id' => $request->reservation_class_id]);

                    }   

                    $students = $students->get();


                    // return $students;
                    foreach ($students as $student) {
                        $dob  = $student->dob;
                        $gender  = $student->gender;
                        $no  = '';
                        $dates[] = $dob;  

                        $consession_amnt = 0;

                    //discount variables
                        $discount_mode = null;
                        $discount_amnt = null; 
                        $discount_code = null;
                        $bus_fee_str = [];
                        $student_fee_inst = [];

                        $student_fee = [
                            'fees_id'               => '1',
                            's_id'                  => $student->id,
                            'fees_amnt'             => $request->fees_amt,
                            'status'                => isset($request->status) ? $request->status : 'P',
                            'online_discount'       => $request->online_discount,
                            'installable_amnt'      => $installable_amnt,
                            'non_installable_amnt'  => $non_installable_amnt,
                            'fine_amnt'             => 0,
                            'date'                  => date('Y-m-d'),
                            'hostel_amnt'           => 0
                            
                        ];
                        // $sibling_dicount  = 0;

                        //Sibling Dicount Fetch     
                        //When student in teacher so we cant't find student siblings details
                        if($student->staff_ward != '1'){                   
                            if(count($student->siblings) !='0'){
                                foreach ($student->siblings as $std_sib) {
                                    $dates[] = $std_sib->sibling_detail->dob;
                                }
                            // print_r($dates);
                                foreach ($dates as $date) {
                                    // return $date;
                                    $a[] = strtotime($date);
                                }
                               
                                asort($a);

                                foreach ($a as $value) {
                                    // return $date;
                                    $b[] = date('Y-m-d',$value);
                                }
                                // print_r($b);
                                foreach ($b as $key => $value) {
                                    if($value == $dob){
                                        $no = $key+1;
                                    }
                                }
                                $no = $no == '1' ? '2' : $no;
                                // return $no;
                                $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => $no,'gender' => $gender,'discount_type_id' => '1','batch_id' => session('current_batch'),'status' => 'A'])->first();

                                $discount_code =  $discount->discount_code;
                                $discount_amnt =  $discount->discount_amnt;
                                $discount_mode =  $discount->discount_mode;

                                // return $student_fee;                                
                            }
                        }else{                                             
                            $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => '1','discount_type_id' => '2','batch_id' => session('current_batch'),'status' => 'A'])->first();

                            $discount_code =  $discount->discount_code;
                            $discount_amnt =  $discount->discount_amnt;
                            $discount_mode =  $discount->discount_mode;
                        }

                    
                        if($discount_mode !=null){
                            if($discount_mode ='P'){                                  
                                $student_fee['discount_amnt'] = ((int)$installable_amnt * $discount->discount_amnt) / 100;
                            }else{
                                $student_fee['discount_amnt'] = $discount->discount_amnt;
                            }
                        }

                        if($student->bus_fee_id !=null){
                            $bus_fee_str = BusFeeStructure::find('bus_fee_id',$student->bus_fee_id);
                            $student_fee['bus_amnt'] = $bus_fee_str->bus_fee_amount;

                        }


                        return $student_fee;

                        $instalment_amt = ((float)$installable_amnt / (int)$no_of_instalment);
                        $inst_bus_amnt = count($bus_fee_str)  !=0 ? ((float)$bus_fee_str->bus_fee_amount / (int)$no_of_instalment) : 0; 
                        $inst_discount_amnt = $discount_amnt !=0 ? ((float)$discount_amnt / $no_of_instalment) : 0;
                        $inst_consession_amnt = $consession_amnt !=0 ? ((float)$consession_amnt / $no_of_instalment) : 0;




                        for($i = 1 ; $i<=$no_of_instalment ; $i++){
                            $inst_amnt = 0;
                            if($i == 1){
                                $inst_amnt = (float)$instalment_amt + (float)$non_installable_amnt; 
                            }else{
                                $inst_amnt = $instalment_amt;
                            }


                            $student_fee_inst[] = [
                                's_id'                  => $student->id,
                                'inst_title'            => '',
                                'std_fees_mast_id'      => '',
                                'inst_amnt'             => $inst_amnt,
                                'inst_consession_amnt'  => '', 
                                'inst_discount_amnt'    => $inst_discount_amnt,
                                'inst_due_date'         => '',
                                'inst_status'           => isset($request->status) ? $request->status : 'P',
                                'bus_amnt'              => $inst_bus_amnt,
                            ];

                        }



                    }
                }
                
            }
die;


            //student assign fees        
        return $fees_inst;







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
