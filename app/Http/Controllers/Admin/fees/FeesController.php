<?php

namespace App\Http\Controllers\Admin\fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\student\studentsMast;
use Helpers;

use App\Models\fees\FeesMast;
use App\Models\fees\FeesHeadMast;
use App\Models\fees\FeesHeadTrans;
use App\Models\fees\FeesInstalment;
use App\Models\fees\FineType;
use App\Models\fees\StudentFeeHead;
use App\Models\fees\StudentFeeInstalment;
use App\Models\fees\StudentFeeReciept;
use App\Models\fees\StudentFeesMast;

use App\Models\master\Discounts;
use App\Models\transport\BusFeeStructure;
use Arr;
use App\Models\classes\SectionManage;
class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = FeesMast::with('batch')->where('batch_id',session('current_batch'))->get();
        // dd( $data);
        return view ('admin.fees.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $classes = studentClass::get();

        $fee_heads = FeesHeadMast::where('status','A')->where('batch_id',session('current_batch'))->orderBy('head_sequence_order')->get();
        // return session('current_session');

        $section_manages =  SectionManage::with(['batch_name','class_name','section_names'])->where('batch_id',session('current_batch'))->get();

        return view ('admin.fees.create',compact('classes','fee_heads','section_manages'));
        
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

            $request->validate([
                'fees_name'     => 'required',
                'fees_amt'      => 'required|not_in:0'             

            ]);

            if($request->courseselection == '1'){
                $request->validate([
                    'std_class_id'  => 'required|not_in:all',
                    'batch_id'      => 'required|not_in:""',             
                    'section_id'    => 'required|not_in:""',             
                    'medium'        => 'required|not_in:""',
                    'feesfor'       => 'required|not_in:"0"',

                ]);
            }else{
                $request->validate([
                    'multiple_courses'=> 'required|not_in:all',                   
                ]);
            }

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

            if($request->courseselection == '1'){
                $batch_name = studentBatch::find($request->batch_id)->batch_name;
            }else{
                $batch_name = collect(batches())->where('id',session('current_batch'))->first()->batch_name;
                $fees_mast['batch_id'] = seession('current_batch'); 
            }


            $fees = FeesMast::create($fees_mast);


            if(isset($request->fees_head)){
                // return $request->head_amnt;
                foreach ($request->fees_head as $key => $fee_head) {
                    $fees_heads = [
                        'fees_head_id'  => $fee_head,
                        'head_amt'      => $request->head_amnt[$key],
                        'fees_id'       => $fees->fees_id,
                        // 'fees_id'       => '1'
                    ];
                    
                    FeesHeadTrans::create($fees_heads);
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
                $fees_inst = [
                    'fees_id'       => $fees->fees_id,
                    // 'fees_id'       => '1',
                    'instalment_amt'=> $request->instalment_amt[$i],
                    'start_dt'      => $request->start_dt[$i],
                    'end_dt'        => $request->end_dt[$i]
                ];

                FeesInstalment::create($fees_inst);
            }


            if($request->is_fees_student_assign == '1'){
                    $students = studentsMast::select('id','gender','dob','staff_ward','staff_id','bus_fee_id','age','std_class_id');

                    if($request->courseselection == '1'){
                            if($request->feesfor !='1'){
                                $students->whereIn('id',$request->s_id);
                            }

                            $students = $students->with(['siblings.sibling_detail' => function($q){
                                $q->where('students_masts.status','R');
                            }])->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>'R']);
                    }else{
                        foreach ($request->multiple_courses as $value) {
                            $multiple_course =  explode('-', $value);
                            $std_class_id_m[] = $multiple_course[0];
                            $batch_id_m[] = $multiple_course[1];
                            $section_id_m[] = $multiple_course[2];
                            $medium_m[] = $multiple_course[3];
                        }
                        $students = $students->with(['siblings.sibling_detail' => function($q){
                                $q->where('students_masts.status','R');
                            }])->whereIn('batch_id',$batch_id_m)->whereIn('std_class_id',$std_class_id_m)->whereIn('section_id',$section_id_m)->whereIn('medium',$medium_m)->where('status','R');
                    }
                    //filter
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
                      

                        $consession_amnt = 0;

                    //discount variables
                        $discount_mode = null;
                        $discount_amnt = null; 
                        $discount_code = null;
                        $bus_fee_str = [];
                        $student_fee_inst = [];
                        $student_fee_head = [];

                        $student_fee = [
                            'fees_id'               => $fees->fees_id,
                            // 'fees_id'               => '1',
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
                        // return "hello";     
                                $dates[] = $dob;  
                                foreach ($student->siblings as $std_sib) {
                                    $dates[] = $std_sib->sibling_detail->dob;
                                }
                      
                                foreach ($dates as $date) {
                                    // return $date;
                                    $a[] = strtotime($date);
                                }
                               
                                asort($a);

                                foreach ($a as $value) {
                                    // return $date;
                                    $b[] = date('Y-m-d',$value);
                                }
                                // return $b;
                                // print_r($b);
                                foreach ($b as $key => $value) {
                                    if($value == $dob){
                                        $no = $key+1;
                                    }
                                }
                                $no = $no == '1' ? '2' : $no;
                                

                                $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => $no,'gender' => $gender,'discount_type_id' => '1','batch_id' => session('current_batch'),'status' => 'A'])->first();

                                // if(!empty($discounts)){
                                    $discount_code =  $discount->discount_code;
                                    $discount_amnt =  $discount->discount_amnt;
                                    $discount_mode =  $discount->discount_mode;    
                                // }
                                
                                // return $student_fee;                                
                            }
                            // return "bahar";

                        }else{    

                            $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => '1','discount_type_id' => '2','batch_id' => session('current_batch'),'status' => 'A'])->first();

                            $discount_code =  $discount->discount_code;
                            $discount_amnt =  $discount->discount_amnt;
                            $discount_mode =  $discount->discount_mode;
                        }

                    
                        if($discount_mode !=null){
                            if($discount_mode ='P'){                                  
                               $discount_amnt = $student_fee['discount_amnt'] = ((int)$installable_amnt * $discount->discount_amnt) / 100;
                            }else{
                                $discount_amnt = $student_fee['discount_amnt'] = $discount->discount_amnt;
                            }
                        }

                        if($student->bus_fee_id !=null){
                            $bus_fee_str = BusFeeStructure::find('bus_fee_id',$student->bus_fee_id);
                            $student_fee['bus_amnt'] = $bus_fee_str->bus_fee_amount;

                        }else{
                            $student_fee['bus_amnt'] =0;
                        }


                        $bus_amnt = count($bus_fee_str)  !=0 ? (float)$bus_fee_str->bus_fee_amount : 0;

                        $hostel_amnt = 0;

                        $total_amnt = ((int)$request->fees_amt + (float)$bus_amnt - (float)$discount_amnt); 

                        $student_fee['total_amnt']  = $total_amnt;
                        $student_fee['due_amnt']    = $total_amnt;


                        // return $student_fee;
                       $std_fees_mast =  StudentFeesMast::create($student_fee);

                        $instalment_amt = ((float)$installable_amnt / (int)$no_of_instalment);
                        $inst_bus_amnt = (float)$bus_amnt / (int)$no_of_instalment; 
                        $inst_hostel_amnt = (float)$hostel_amnt / (int)$no_of_instalment; 
                        $inst_discount_amnt = $discount_amnt !=0 ? ((float)$discount_amnt / $no_of_instalment) : 0;
                        $inst_consession_amnt = $consession_amnt !=0 ? ((float)$consession_amnt / $no_of_instalment) : 0;

                        for($m= 0 ; $m < $no_of_instalment ; $m++){
                            $inst_amnt = 0;
                            if($m == 0){
                                $inst_amnt = (float)$instalment_amt + (float)$non_installable_amnt; 
                            }else{
                                $inst_amnt = $instalment_amt;
                            }

                            $inst_title = str_replace(' ','_',$request->fees_name).'_('.(Arr::get(MEDIUM,$request->medium)).')_'.$batch_name.'_inst_'.date('M',strtotime($request->start_dt[$m])).'-'.date('M',strtotime($request->end_dt[$m]));

                            $inst_total_amnt = (float)$inst_amnt + (float)$inst_bus_amnt - (float)$inst_discount_amnt - (float)$inst_consession_amnt;

                            $student_fee_inst = [
                                's_id'                  => $student->id,
                                'inst_title'            => $inst_title,
                                // 'std_fees_mast_id'      => '1',
                                'std_fees_mast_id'      => $std_fees_mast->std_fees_mast_id,
                                'inst_amnt'             => $inst_amnt,
                                'inst_consession_amnt'  => $inst_consession_amnt, 
                                'inst_discount_amnt'    => $inst_discount_amnt,
                                'inst_due_date'         => $request->end_dt[$m],
                                'inst_status'           => isset($request->status) ? $request->status : 'P',
                                'inst_bus_amnt'         => $inst_bus_amnt,
                                'inst_total_amnt'       => $inst_total_amnt,
                                'inst_due_amnt'         => $inst_total_amnt,
                                'inst_hostel_amnt'      => $inst_hostel_amnt,
                            ];

                            $std_fee_inst  = StudentFeeInstalment::create($student_fee_inst);
                              
                                foreach ($request->fees_head as $k => $fees_head_id) {

                                    $fee_head_dtl = FeesHeadMast::find($fees_head_id);
                                        if($fee_head_dtl->is_installable == '1'){
                                            $fee_head_amnt = (float)$request->head_amnt[$k] / (int)$no_of_instalment;
                                            $fee_head_discount = $inst_discount_amnt;
                                        }else{
                                            $fee_head_amnt = $request->head_amnt[$k];
                                            $fee_head_discount = 0;
                                        }
                                        $fee_head_total_amnt = (float)$fee_head_amnt - (float)$fee_head_discount;

                                    if($m == 0){                                        
                                        $student_fee_head = [
                                            'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                                            // 'std_fee_inst_id'         => '1',
                                            's_id'                    => $student->id,
                                            'fee_head_amnt'           => $fee_head_amnt,
                                            'fee_head_name'           => $fee_head_dtl->head_name,   
                                            'fee_head_consession_amnt'=> 0,
                                            'fee_head_total_amnt'     => $fee_head_total_amnt,
                                            'fee_head_due_amnt'       => $fee_head_total_amnt,  
                                            'fee_head_discount'       => $fee_head_discount,  

                                        ];
                                        StudentFeeHead::create($student_fee_head);
                                    }
                                    else{
                                        if($fee_head_dtl->is_installable == '1'){
                                            $student_fee_head = [
                                                'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                                                // 'std_fee_inst_id'         => '1',
                                                's_id'                    => $student->id,
                                                'fee_head_amnt'           => $fee_head_amnt,
                                                'fee_head_name'           => $fee_head_dtl->head_name,   
                                                'fee_head_consession_amnt'=> 0,
                                                'fee_head_total_amnt'     => $fee_head_total_amnt,
                                                'fee_head_due_amnt'       => $fee_head_total_amnt,  
                                                'fee_head_discount'       => $fee_head_discount,  

                                            ];
                                            StudentFeeHead::create($student_fee_head);
                                        }
                                    }

                                }
                                
                        }


                    }
                
                
            }


        return redirect()->route('fees.index')->with('success','Fess created successfully');
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
        $fee = FeesMast::with(['batch','fees_heads.fees_head','fees_instalments'])->find($id);
        // return $fee;
        return view('admin.fees.show',compact('fee'));
        // dd($id);
        
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
