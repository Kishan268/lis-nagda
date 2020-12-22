<?php

namespace App\Http\Controllers\Admin\fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fees\ConcessionMast;
use App\Models\fees\ConcessionApplyTrans;
use App\Models\fees\ConcessionStudent;
use App\Models\fees\ConcessionStudentTrans;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\fees\FeesHeadMast;
use App\Models\student\studentsGuardiantMast;

class ConcessionController extends Controller
{
   
    public function index()
    {
        $concession = ConcessionMast::get();
        return view('admin.fees.concession.index',compact('concession'));
    }

   
    public function create()
    {
        return view('admin.fees.concession.create');
        
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required','consession_amnt'=>'required']);

        $data['discount'] = $request->discount;
        $data['conses_desc'] = $request->conses_desc;

        ConcessionMast::create($data);
        return redirect('concession')->with('success','Fess concession created successfully');


    }

    public function show($id)
    {
       $showConcessionStd =  ConcessionMast::with('concession_apply.student_consession')->where('concession_id',$id)->get();
            return view('admin.fees.concession.show',compact('showConcessionStd'));

        
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
        ConcessionStudent::where('s_id',$id)->delete();
        return redirect('concession')->with('success','Fess concession student deleted successfully');

    }

    public function concessionApply(){
        $classes = studentClass::get();
        $batch = studentBatch::get();
        $fees_heads = FeesHeadMast::get();
        $concession = ConcessionMast::get();
            return view('admin.fees.concession.apply',compact('classes','batch','fees_heads','concession'));
    }
    public function concessionStudents(Request $request){

        $students = studentsMast::with('studentsGuardiantMast','concession_student')
                    ->where('std_class_id',$request->std_class_id)
                    ->where('batch_id',$request->batch_id)
                    ->where('status','R')
                    ->get();
        
            return view('admin.fees.concession.students_table',compact('students'));
    } 
    public function concessionApplyStore(Request $request){
         // dd($request->s_id);
        if ($request->consession_amnt) {

            $consession_amnt = explode(',', $request->consession_amnt);
        }else{
            $consession_amnt = '';
        }
        // dd( $consession_amnt);
         $request->validate([
            'std_class_id'=>'required',
            'batch_id'=>'required',
            'head_id'=>'required'
        ]);
        $data['class_id'] = $request->std_class_id;
        $data['batch_id'] = $request->batch_id;
        $data['fees_head_id'] = $request->head_id;
        $concessionApply = ConcessionApplyTrans::create($data)->concession_apply_id;
        // dd($concessionApply);
        if (!empty($request->s_id)) {
        foreach ($request->s_id as $key => $value) {
            $students=[
                'concession_apply_id'=>$concessionApply,
                's_id'=>$request->s_id[$key],
                'concession_id'=>$request->concession ? $request->concession[$key] : '',
                'consession_amnt'=>$consession_amnt == ""  ? ''  : $consession_amnt[$key]
            ];
        ConcessionStudentTrans::create($students);
        }
    }else{
        return redirect('concession-apply')->with('error','Please select student');

    }
        return redirect('concession')->with('success','Fess concession apply successfully');

    }
}
