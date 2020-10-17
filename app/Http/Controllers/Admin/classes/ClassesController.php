<?php

namespace App\Http\Controllers\Admin\classes;

use Auth;
use Validator;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\Subject;
use App\Models\classes\SectionManage;
use App\Models\classes\AssignStudentToSection;
use App\Models\student\studentsMast;


class ClassesController extends Controller
{
    
    // student class add code.............................
    public function studentClasses()
    {
    	$studentclassdata = studentClass::get();
    		return view('admin.master.classes.index',compact('studentclassdata'));
    } 
    public function addClasses(Request $request)
    {
        $data = $request->validate([
                'class_name'=>'required',
                'class_description'=>'required'
        ]);
        $data['user_id']    = Auth::user()->id;

    	studentClass::create($data);
    		return redirect('master/classes');

    }
    public function updateClasses(Request $request, $id)
    {
        // dd($request);
        $data =$request->validate([
            'class_name'=>'required',
            'class_description'=>'required'
        ]);
        $data['user_id']    = Auth::user()->id;
    	
    	 studentClass::where('id',$id)->update($data);
    		return redirect('master/classes');
    		
    }

	// end student class add code.............................
    public function assignSectionList(){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $subject = Subject::get();
         $sectionList =SectionManage::with('section_names','class_name','batch_name','emp_mast')->get();
         // dd($sectionList);
        return view('admin.class.section.assign-section',compact('classes','sections','batches','subject','sectionList'));

    }

     public function addSectionList(Request $request){
            $section_id =  $request->section_id;
            foreach ($section_id as $id) {
                $data =[
                        'user_id' =>Auth::user()->id,
                        'course_id'=>$request->course_id,
                        'batch_id'=>$request->batch_id,
                        'section_id'=>$id
                ];

                $updateData = SectionManage::where('section_id',$id)
                            ->where('course_id',$data['course_id'])
                            ->where('batch_id',$data['batch_id'])
                            ->update($data);
                if(empty($updateData)){

                    SectionManage::create($data);
                }
            }
        return 'Section added successfully';
        
    }

    public function assignSectionListDelete($id){
    	$data = SectionManage::find($id)->delete();
        	 return redirect()->back()->with('success','Section deleted successfully');
    }

    public function studentAssignsection(){

    	 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $subject = Subject::get();
         return view('admin.class.section.assign-section-student',compact('classes','sections','batches','subject'));
    }
    public function getStudentList(Request $request){
    	$getStudentList = studentsMast::where('section_id',$request->section_id)
    						->where('std_class_id',$request->course_id)
    						->where('batch_id',$request->batch_id)
    						->get();    						
    	 return response()->json($getStudentList);
    }

    public function assignSubjectToSection(Request $request){
        $assign_student =  $request->assign_student;
    	 foreach ($assign_student as $id) {
                $data =[
                        'user_id' =>Auth::user()->id,
                        'course_id'=>$request->course_id,
                        'batch_id'=>$request->batch_id,
                        'section_id'=>$request->section_id,
                        'assign_students_id'=>$id,
                        'un_assign_students_id'=>$request->un_assign_students
                ];
                $getData = AssignStudentToSection::where('assign_students_id',$id)->first();
                // $updateData = AssignStudentToSection::where('section_id',$id)
                //             ->where('course_id',$data['course_id'])
                //             ->where('batch_id',$data['batch_id'])
                //             ->where('assign_students_id',$id)
                //             ->update($data);
                if(empty($getData)){

                    AssignStudentToSection::create($data);
                }
            }
        return 'Student added successfully';
    }
}
