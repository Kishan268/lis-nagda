<?php

namespace App\Http\Controllers\Admin\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\Subject;
use Auth;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\AssignSubject;
use App\Models\student\studentsMast;
use App\Models\AssignSubjectGroupStudent;
use App\Models\classes\SectionManage;
use App\Models\studentclass\AssignSubjectIdToClass;
use App\Models\studentclass\AssignSubjectToClass;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::get();
        return view('admin.class.subject.index',compact('subject'));
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
        $data = $request->validate([
                'subject_name'=>'required',
                'subject_code'=>'required'
        ]);

        $data['user_id']= Auth()->user()->id;
        $data['subject_sequence']= $request->subject_sequence;
        Subject::create($data);

        return redirect()->back()->with('success','Subject added successfully');

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
        $data = $request->validate([
                'subject_name'=>'required',
                'subject_code'=>'required'
        ]);

        $data['user_id']= Auth()->user()->id;
        $data['subject_sequence']= $request->subject_sequence;
        Subject::where('id',$id)->update($data);

        return redirect()->back()->with('success','Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return redirect()->back()->with('success','Subject deleted successfully');

    }

    public function assignSubject(){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $subject = Subject::get();
         // return (Subject::pluck('id'));
         // $assignSubject = AssignSubject::with(['assign_batch','assign_class','assign_section'])->get();

         $assignSubject = AssignSubjectToClass::with(['assign_subjectId','assign_batch','assign_class','assign_section'])->get();

         $subjectAssign1 = array();
         foreach ($assignSubject as  $value) {
                $subjectAssign= $value->assign_subjectId;
                foreach ($subjectAssign as  $value1) {
                    if(!in_array($value1->mendatory_subject_id,$subjectAssign1)){
                        $subjectAssign1[] = (int)$value1->mendatory_subject_id;
                    }
                }
         }
 
         $subjectName = Subject::whereIn('id',$subjectAssign1)->get();
         
         // return $subjectName;

        return view('admin.class.subject.assign-subject',compact('classes','sections','batches','subject','assignSubject','subjectName'));
    }

    public function assignSubjectAdd(Request $request){
        // dd($request);
        $data = $request->validate([
                'std_class_id' =>'required',
                'batch_id'     =>'required',
                'section_id'   =>'required'
                // 'mendatory_subject_id' =>'required'
            ]);
        $data['user_id']= Auth()->user()->id;

        $update = AssignSubjectToClass::where('std_class_id',$request->std_class_id)->update($data);

        if(empty($update)){
           $lastId = AssignSubjectToClass::create($data)->id;

        if($request->mendatory_subject_id ){

            for ($i=0; $i < count($request->mendatory_subject_id); $i++) { 
               
               $data2 = array(

                        'assign_subject_to_classes_id' => $lastId,
                        'mendatory_subject_id' => $request->mendatory_subject_id[$i],
                        'optional_subject_id' => $request->optional_subject_id[$i],
               );

               // $update1 = AssignSubjectIdToClass::where('mendatory_subject_id',$request->mendatory_subject_id[$i])->update($data2);

                // if(empty($update1)){
                       AssignSubjectIdToClass::create($data2);
                // }
            }
        }
        }

        return redirect()->back()->with('success','Subject assigned successfully');
    }

    public function subjectAssignToStudent(){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $subject  = Subject::get();
        return view('admin.class.subject.assign-student',compact('classes','sections','batches','subject'));
    }

    public function studentGetForAssignSubject(Request $request){
        // dd( $request);
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
         $subject     = Subject::get();
         $assignSubject = AssignSubject::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->first();
                                // dd($assignSubject);
         $students = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
        $page = request()->page; 
          return view('admin.class.subject.table',compact('students','page','studentData','classes','sections','batches','subject','assignSubject'));
    }

    public function studentAddForAssignSubject(Request $request){
            $stud_id =  $request->s_id;
            foreach ($stud_id as $id) {
                $data =[
                        's_id'=>$id,
                        'subject_group_id'=>$request->subject_group_id,
                        'subject_group_name'=>$request->subject_group_name,
                        'user_id' =>Auth::user()->id
                ];
                $getData = AssignSubjectGroupStudent::where('s_id',$id)->update($data);
                if(empty($getData)){

                    AssignSubjectGroupStudent::create($data);
                }
            }
        return "Success";
    
    } 

    
}
