<?php

namespace App\Http\Controllers\Admin\noticeCircular;

use Auth;
use App\User;
use Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NoticeCircular;
use App\Models\student\studentsGuardiantMast;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\castCategory;
use App\Models\master\stdReligions;
use App\Models\master\stdBloodGroup;
use App\Models\master\stdNationality;
use App\Models\master\countryMast;
use App\Models\master\stateMast;
use App\Models\master\cityMast;
use App\Models\master\mothetongueMast;
use App\Models\student\StudenstDoc;
use App\Models\master\professtionType;
use App\Models\master\guardianDesignation;
use Illuminate\Support\Facades\Hash;
use App\Models\classes\SectionManage;
use App\Models\noticecircular\NoticeClassBatchId;
use App\Models\noticecircular\NoticeStudent;
use App\Models\noticecircular\NoticeFaculty;

class NoticeCircularController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        
         $this->classes = studentClass::get();
         $this->batches = studentBatch::get();
         $this->sections = studentSectionMast::get();
         $this->studentData = studentsMast::get();

    }
    public function index()
    {
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
            return view('admin.notice-circular.index',compact('classes','sections','batches'));
    }

    public function create()
    {
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
         // dd(session('current_batch'));

        return view('admin.notice-circular.create',compact('studentData','classes','sections','batches'));
        
    }

    
    public function store(Request $request)
    {
        // dd($request); 

        // $request->validate([
        //         'sendtype'=>'required',
        //         'circular_title'=>'required',
        //         'date_from_display'=>'required',
        //         'date_to_display'=>'required',
        //         'circular_description'=>'required'
        //     ]);
        $data['user_id'] = Auth::user()->id;
        $data['circular_title']     = $request->circular_title;
        $data['date_from_display']  = $request->date_from_display;
        $data['date_to_display']    = $request->date_to_display;
        $data['circular_description'] = $request->circular_description;
        $data['selected_student']     = $request->selected_student;
        $data['selected_student']     = json_encode($data['selected_student']);
        
// dd($request);
    if($request->sendtype == 1){
        $data['sender']   = 'A';
        
            if($request->file !=null){ 
                $verify = $request->validate([
                'file' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
             $data['file'] =  file_upload($request->file,'NoticeCircularAll');
            }else{
                $data['file'] = !empty($data) ? $request->file : null ;
                
            }
             // $getAllSendData = NoticeCircular::where('date_from_display',$request->date_from_display)
             //    ->where('date_to_display',$request->date_to_display)
             //    ->where('sender','send_to_all')
             //    ->update($data);
              $create_stud = NoticeCircular::create($data)->id;
              /*$getUsers = user::get();
              $batchId = $request->batch_id;
                foreach ($getUsers as $key => $value) {
                    if ( !empty($value->user_flag)) {
                        $datas2 = array(
                                    'notice_circular_id'  => 1,
                                    'batch_id'   => $batchId
                                );
                        NoticeClassBatchId::create($datas2);
                    }

                } */
            // if(empty($getAllSendData))
            // {    
            // }else{
            //  return "warning";
            // }
            return "success";

        }elseif($request->sendtype == 2){
                $data['sender']   = 'C';

        // $getSelectedStudent = NoticeCircular::get('selected_student');
        // // dd($getSelectedStudent);
        // $selectedStudentData = [];

        // foreach ($getSelectedStudent as $value) {
        //   $selectedStudentData [] = $value;
        // }

        // $data1 = NoticeCircular::whereIn('selected_student',$getSelectedStudent)->where('date_from_display',$request->date_from_display)->where('date_to_display',$request->date_to_display)->get();

        // if(count($data1) == 0){

        if($request->file !=null){ 
            $verify = $request->validate([
                'file' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
            $data['file'] =  file_upload($request->file,'NoticeCircularStudent');
        }else{
            $data['file'] = !empty($data) ? $request->file : null ;
            
        }
        // $create_stud = 2;
        $create_stud = NoticeCircular::create($data)->id;
        $batchId = $request->batch_id;
        // dd($batchId);
        foreach ($request->course_batches as $key => $value) {
            $datas2 = array(
                        'notice_circular_id'  => $create_stud,
                        'classes_id'   => $value,
                        'batch_id'   => $batchId
                    );
            // dd($datas2);
            NoticeClassBatchId::create($datas2);
        }
         return "success";
        // }else{
        //      return "warning";
        // }
    }elseif($request->sendtype == 3){
        // dd($request);
        $data['sender']   = 'F';

        if($request->file !=null){ 
            $verify = $request->validate([
                'file' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
            $data['file'] =  file_upload($request->file,'NoticeFaculty');
        }else{
            $data['file'] = !empty($data) ? $request->file : null ;
            
        }
        $data['batch_id'] =$request->batch_id;
        // dd($data);   
        $create_stud = NoticeCircular::create($data)->id;
        $batchId = $request->batch_id;

        foreach ($request->faculty_id as $key => $value) {
            $datas2 = array(
                        'notice_circular_id'  => $create_stud,
                        'batch_id'   => $batchId,
                        'faculty_id'   => $value
                    );
            NoticeFaculty::create($datas2);
        }

        return "success";
        }

        // return redirect()->back()->with('success','Notice and Circular added successfully');


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

    public function getBtachSectionClass(){
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = SectionManage::with('section_names','batch_name','class_name')->get();

         return response()->json($studentData);
    }   

    public function getSdata(Request $request){
        // dd($request);
         $studentsMast   =[];
         // $idArray   =[];
         // $sectionId =[];
         // $batchId   =[];
         // $classId   =[];
         // foreach ($request->val as $value) {
         //    $studentData = SectionManage::with('section_names','batch_name','class_name')->where('id',$value)->first();
         //    $idArray[] = $studentData;
         // }

         // foreach ($idArray as $idArrayvalue) {
         //    $sectionId[] = $idArrayvalue->section_names->id;
         //    $batchId[]   = $idArrayvalue->batch_name->id;
         //    $classId[]   = $idArrayvalue->class_name->id;

         // }
         //   $studentsMast = studentsMast::whereIn('section_id',$sectionId)
         //                    ->whereIn('batch_id',$batchId)
         //                    ->whereIn('std_class_id',$classId)
         //                    ->get();
         // foreach ($request->val as $value) {

            $studentsData = studentsMast::whereIn('std_class_id',$request->val)
                            ->get();
            $studentsMast[] = $studentsData;
         // }
         // dd($studentsData);
        // $studentsMast = studentsMast::where('std_class_id',$request->val)
                            // ->get();
         $page ='Teachers';
         return view('admin.notice-circular.table',compact('studentsMast','page'));
    }


    public function getSendAllData(Request $request){

        if( $request->getSendAllData == 'send_to_all'){
            $getAllSendData = NoticeCircular::where('sender',1)->get();
            $page = 'send_to_all';
         return view('admin.notice-circular.manage.sendtoall.index',compact('getAllSendData','page'));
        }
    } 
    public function sentToAllShow($id){

        $getAllSendData = NoticeCircular::where('id',$id)->first();
        // dd($getAllSendData);
        $getAllstudents = studentsMast::get();
        $page = 'send_to_all';

        return view('admin.notice-circular.manage.sendtoall.show',compact('getAllSendData','page','getAllstudents'));
    }
    public function sentToAllEdit($id){

        $getAllSendData = NoticeCircular::where('sender',1)->where('id',$id)->first();
            return view('admin.notice-circular.manage.sendtoall.edit',compact('getAllSendData'));
    } 
    public function sentToAllupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender',1)->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    } 

    public function getSendStudentData(Request $request){

       //  $idArray   =[];
       //  $idArray1  =[];
       //  $sectionId =[];
       //  $batchId   =[];
       //  $classId   =[];
       //  if( $request->getSendAllData == 'send_to_student'){

       //     $NoticeCircular = SectionManage::with('class_name','batch_name')
       //                      ->where('course_id',$request->courseId)
       //                      ->where('batch_id',$request->batchId)
       //                      ->get();           
       // foreach ($NoticeCircular as $value) {
       //      $idArray[]   = $value->id;
       // }

       //  $studentData = NoticeClassBatchId::whereIn('notice_course_batch_id',$idArray)->get();

       //  foreach ($studentData as $value1) {
       //      $idArray1[]   = $value1->notice_circular_id;
       // }
       //  $studentData1 = NoticeCircular::whereIn('id',$idArray1)->get();
         $studentData = NoticeClassBatchId::where('classes_id',$request->courseId)->get();

        foreach ($studentData as $value1) {
            $idArray1[]   = $value1->notice_circular_id;
       }
        $studentData1 = NoticeCircular::whereIn('id',$idArray1)->get();
            // dd($studentData1);    
                            
         return view('admin.notice-circular.manage.sendtostudent.index',compact('studentData1'));
    } 
    public function sentToStudentShow($id){
        $idArray = [];
        $getAllSendData = NoticeCircular::with('get_circular_id.get_classes')->where('sender',2)->where('id',$id)->first();
        // dd($getAllSendData);
        $sId = $getAllSendData->id;
        // $getAllstudents = studentsMast::with('get_student_id')->get();
       //  $getid = NoticeStudent::where('notice_student_id',$sId)->get();
       //  foreach ($getid as $value) {
       //      $idArray[]   = $value->id;
       // }
        // $getAllstudents = studentsMast::whereIn('id',$idArray)->get();
        $page = 'send_to_all';

        return view('admin.notice-circular.manage.sendtostudent.show',compact('getAllSendData','page'));
    }
    public function sentToStudentEdit($id){

        $getAllSendData = NoticeCircular::where('sender',2)->where('id',$id)->first();

        return view('admin.notice-circular.manage.sendtostudent.edit',compact('getAllSendData'));
    } 
    public function sentToStudentupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender',2)->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    }

     public function getFacultydata(Request $request){
        $facultyData = user::where('user_flag','T')->get();
        $page ='Teachers';

         return view('admin.notice-circular.table',compact('facultyData','page'));
    }

    public function getSendFacultyData(Request $request){

        if( $request->getSendAllData == 'send_to_faculty'){
            $getAllSendData = NoticeCircular::where('sender',3)->get();
            $page = 'send_to_faculty';
            // dd( $getAllSendData);
         return view('admin.notice-circular.manage.sendtofaculty.index',compact('getAllSendData','page'));
        }
    }

     public function sentToFacultyShow($id){
        $getAllSendData = NoticeCircular::where('sender',3)->where('id',$id)->first();
// dd($getAllSendData->id);
        $getAllstudents = NoticeFaculty::with('facultyInfo')->where('notice_circular_id',$getAllSendData->id)->get();
        // dd($getAllstudents);
        $page = 'send_to_faculty';

        return view('admin.notice-circular.manage.sendtofaculty.show',compact('getAllSendData','page','getAllstudents'));
    }
    public function sentToFacultyEdit($id){
        $getAllSendData = NoticeCircular::where('sender',3)->where('id',$id)->first();

        return view('admin.notice-circular.manage.sendtofaculty.edit',compact('getAllSendData'));
    } 
    public function sentToFacultyupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender',3)->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    }
    public function getAllClasses(){

        // $classes = $this->classes;
        $getAllSendData = studentClass::get();
            return response()->json($getAllSendData);
    }
     public function getSendToStudentsData(Request $request){

        if( $request->val == 2){
            $getAllSendData = NoticeCircular::where('sender',2)->get();
            $page = 'send_to_student';
            // dd( $getAllSendData);
         return view('admin.notice-circular.manage.sendtostudent.index',compact('getAllSendData','page'));
        }
    } 
}
