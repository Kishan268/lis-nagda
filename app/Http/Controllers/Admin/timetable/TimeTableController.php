<?php

namespace App\Http\Controllers\Admin\timetable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\AssignSubject;
use App\Models\master\Subject;
use App\Models\studentclass\AssignSubjectIdToClass;
use App\Models\studentclass\AssignSubjectToClass;
use App\Models\timetable\ExamTimeTable;
use App\Models\timetable\ExamTimeTableMast;

class TimeTableController extends Controller
{
  
    public function index()
    {

        return view ('admin.timetables.index');
    }

   
    public function create()
    {
        $class = studentClass::get();
        $assignSubject = AssignSubjectToClass::with(['assign_subjectId'])->get();
       
        return view ('admin.timetables.create',compact('class'));
        
    }

   
    public function store(Request $request)
    {                
        $nod = $request->nod;
        $classFrom = $request->class_from;
        $classTo   = $request->class_to;
        $getClasses = studentClass::whereBetween('id',[$classFrom,$classTo])->get(); 

        $data = [
            'name'=>$request->exam_name,
            'class_from'=>$request->class_from,
            'class_to'=>$request->class_to,
            'reporting_time'=>$request->reporting_time,
            'exam_time'=>$request->examination_time,
            'start_dt'=>date('Y-m-d',strtotime($request->start_date)),
            'end_dt'=>date('Y-m-d',strtotime($request->end_date)),
            'remark'=>$request->remark

        ];
        // return $data;

        $lastId = ExamTimeTableMast::create($data)->id;

       foreach($getClasses as $class){
            for($i=1; $i <= $nod ; $i++){
                $field_name = 'subject_'.$class->id.'_'.$i; 
              
                    $exam_time_table = [
                        'time_id'=>$lastId,
                        'class_id'=>$class->id,
                        'subject_id'=> $request->$field_name,
                        'date'=> date('Y-m-d',strtotime($request->date[$i-1])) 
                     ];

                     ExamTimeTable::create($exam_time_table);
            }
        }
        // dd($exam_time_table);
    }

    public function show($id)
    {
        //
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

    public function getsubject(Request $request){

        $assignSubject = AssignSubjectToClass::with('assign_subjectId')->where('id',$request->classId)->get();         
         $subjectAssign1 = array();
         foreach ($assignSubject as  $value) {
            $subjectAssign= $value->assign_subjectId;
            foreach ($subjectAssign as  $value1) {
                
                    $subjectAssign1[] = (int)$value1->mendatory_subject_id;
            }
         }
         $subjectName = Subject::whereIn('id',$subjectAssign1)->get();
 // dd($request);
            return response()->json($subjectName);


    }
    public function getClassForTimetable(Request $request){
        $classFrom = $request->classFrom;
        $classTo   = $request->classTo;
        $getClasses = studentClass::whereBetween('id',[$classFrom,$classTo])->get();  
        // dd($getClasses);       
            return response()->json($getClasses);
    }

    public function generateTable(Request $request){
        $classFrom = $request->classFrom;
        $classTo   = $request->classTo;
        $nod   = $request->nod;

        $getClasses = studentClass::with(['assignsubject'=>function($q){
            $q->where('batch_id',1)->with(['assign_subjectId.subjectName']);
        }])->whereBetween('id',[$classFrom,$classTo])->get();

        return view ('admin.timetables.generateTable',compact('getClasses','nod'));
    }
}
