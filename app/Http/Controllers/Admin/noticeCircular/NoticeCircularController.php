<?php

namespace App\Http\Controllers\Admin\noticeCircular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NoticeCircular;
use Auth;
use App\User;
use Helpers;
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

class NoticeCircularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        
         $this->classes = studentClass::get();
         $this->batches = studentBatch::get();
         $this->sections = studentSectionMast::get();
         $this->studentData = studentsMast::get();
         $this->country   = countryMast::get();
         $this->state     = stateMast::get();
         $this->city      = cityMast::get();
         $this->castCategores         = castCategory::get();
         $this->studentReligions      = stdReligions::get();
         $this->studentNationalites   = stdNationality::get();
         $this->studentBloodGroups    = stdBloodGroup::get();
         $this->studentMothertongues  = mothetongueMast::get();
         $this->professtionType       = professtionType::get();
         $this->guardianDesignation   = guardianDesignation::get();
         $this->studentGenders        = Helpers::studentGender();
         $this->studentsGuardiantDetails = studentsGuardiantMast::get();
    }
    public function index()
    {
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
        return view('admin.notice-circular.index',compact('classes','sections','batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;

        return view('admin.notice-circular.create',compact('studentData','classes','sections','batches'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->sendertype);
        $request->validate([
                'sendertype'=>'required',
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required'
            ]);
        $data['user_id'] = Auth::user()->id;
        $data['circular_title']     = $request->circular_title;
        $data['date_from_display']  = $request->date_from_display;
        $data['date_to_display']    = $request->date_to_display;
        // $data['file'] = $request->file;
        $data['circular_description'] = $request->circular_description;
        // $data['total_student']        = $request->total_student;
        $data['sender']               = $request->sendertype;
        $data['selected_student']     = $request->selected_student;
        $data['selected_student']     = json_encode($data['selected_student']);
        $getDataStude = $request->selected_student;
        // $arrayTode = json_decode($arrayToJson);
        // dd($request->selected_student);
    if($request->sendertype == 'send_to_student'){
        // dd($request);

        $getSelectedStudent = NoticeCircular::get('selected_student');
        $selectedStudentData = [];

        foreach ($getSelectedStudent as $value) {
          $selectedStudentData [] = $value;
        }

        $data1 = NoticeCircular::whereIn('selected_student',$getSelectedStudent)->where('date_from_display',$request->date_from_display)->where('date_to_display',$request->date_to_display)->get();

        if(count($data1) == 0){

            if($request->file !=null){ 
                $verify = $request->validate([
                    'file' =>'required|image|mimes:jpeg,png,jpg' 
                ]);
                $filename = $request->name.'_'.time().'.'.$request->file->getClientOriginalName();
                $image = $request->file->storeAs('public/notice_circular_to_student_'.Auth::user()->id.'/notice_circular_to_student/', $filename);
                $data['file'] = 'notice_circular_to_student_'.Auth::user()->id.'/notice_circular_to_student/'.$filename;
            }
            else{
                $data['file'] = !empty($data) ? $request->file : null ;
                
            }
            // dd($data);
            NoticeCircular::create($data);
            return "success";
        }else{
             return "warning";
        }
    }elseif($request->sendertype == 'send_to_all'){
            // dd($request);
            $data['user_id'] = Auth::user()->id;
            $data['circular_title'] = $request->circular_title;
            $data['date_from_display'] = $request->date_from_display;
            $data['date_to_display'] = $request->date_to_display;
            $data['file'] = $request->file;
            $data['circular_description'] = $request->circular_description;
            $data['sender'] = $request->sendertype;

            if($request->file !=null){ 
                $verify = $request->validate([
                    'file' =>'required|image|mimes:jpeg,png,jpg' 
                ]);
                $filename = $request->name.'_'.time().'.'.$request->file->getClientOriginalName();
                $image = $request->file->storeAs('public/notice_circular_to_all_'.Auth::user()->id.'/notice_circular_to_all/', $filename);
                $data['file'] = 'notice_circular_to_all_'.Auth::user()->id.'/notice_circular_to_all/'.$filename;
            }
            else{
                $data['file'] = !empty($data) ? $request->file : null ;
                
            }
             $getAllSendData = NoticeCircular::where('date_from_display',$request->date_from_display)
                ->where('date_to_display',$request->date_to_display)
                ->where('sender','send_to_all')
                ->update($data);
            if(empty($getAllSendData)){    
                NoticeCircular::create($data);
            }else{
             return "warning";
            }
            return "success";

        }else{

            if($request->file !=null){ 
                $verify = $request->validate([
                    'file' =>'required|image|mimes:jpeg,png,jpg' 
                ]);
                $filename = $request->name.'_'.time().'.'.$request->file->getClientOriginalName();
                $image = $request->file->storeAs('public/notice_circular_to_all_'.Auth::user()->id.'/notice_circular_to_all/', $filename);
                $data['file'] = 'notice_circular_to_all_'.Auth::user()->id.'/notice_circular_to_all/'.$filename;
            }
            else{
                $data['file'] = !empty($data) ? $request->file : null ;
                
            }
             $getFacultyData = NoticeCircular::where('date_from_display',$request->date_from_display)
                ->where('date_to_display',$request->date_to_display)
                ->where('sender','send_to_all_faculties')
                ->update($data);
            if(empty($getFacultyData)){    
                NoticeCircular::create($data);
            }else{
             return "warning";
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
         $idArray   =[];
         $sectionId =[];
         $batchId   =[];
         $classId   =[];
         foreach ($request->val as $value) {
            $studentData = SectionManage::with('section_names','batch_name','class_name')->where('id',$value)->first();
            $idArray[] = $studentData;
         }

         foreach ($idArray as $idArrayvalue) {
            $sectionId[] = $idArrayvalue->section_names->id;
            $batchId[]   = $idArrayvalue->batch_name->id;
            $classId[]   = $idArrayvalue->class_name->id;

         }
           $studentsMast = studentsMast::whereIn('section_id',$sectionId)
                            ->whereIn('batch_id',$batchId)
                            ->whereIn('std_class_id',$classId)
                            ->get();
         $page = request()->page; 
         return view('admin.notice-circular.table',compact('studentsMast','page'));
    }

    public function getSendAllData(Request $request){

        if( $request->getSendAllData == 'send_to_all'){
            $getAllSendData = NoticeCircular::where('sender','send_to_all')->get();
            $page = 'send_to_all';
         return view('admin.notice-circular.manage.sendtoall.index',compact('getAllSendData','page'));
        }
    } 
    public function sentToAllShow($id){
        $getAllSendData = NoticeCircular::where('sender','send_to_all')->where('id',$id)->first();
        $getAllstudents = studentsMast::get();
        $page = 'send_to_all';

        return view('admin.notice-circular.manage.sendtoall.show',compact('getAllSendData','page','getAllstudents'));
    }
    public function sentToAllEdit($id){
        $getAllSendData = NoticeCircular::where('sender','send_to_all')->where('id',$id)->first();

        return view('admin.notice-circular.manage.sendtoall.edit',compact('getAllSendData'));
    } 
    public function sentToAllupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender','send_to_all')->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    } 

    public function getSendStudentData(Request $request){

        // dd($request);
        $idArray = [];
        $sectionId=[];
        $batchId=[];
        $classId=[];
        if( $request->getSendAllData == 'send_to_student'){

           $studentData = SectionManage::where('course_id',$request->courseId)
           ->where('batch_id',$request->batchId)
           ->get();
           foreach ($studentData as $value) {
            $idArray[] = $value;
            $sectionId[] = $value->section_id;
            $batchId[]   = $value->batch_id;
            $classId[]   = $value->course_id;
           }

           $studentsMast = studentsMast::whereIn('section_id',$sectionId)
                            ->whereIn('batch_id',$batchId)
                            ->whereIn('std_class_id',$classId)
                            ->get();
                            
         return view('admin.notice-circular.manage.sendtostudent.index',compact('studentsMast'));
        }
    } 
    public function sentToStudentShow($id){
        $getAllSendData = NoticeCircular::where('sender','send_to_all')->where('id',$id)->first();
        $getAllstudents = studentsMast::get();
        $page = 'send_to_all';

        return view('admin.notice-circular.manage.sendtostudent.show',compact('getAllSendData','page','getAllstudents'));
    }
    public function sentToStudentEdit($id){
        $getAllSendData = NoticeCircular::where('sender','send_to_all')->where('id',$id)->first();

        return view('admin.notice-circular.manage.sendtostudent.edit',compact('getAllSendData'));
    } 
    public function sentToStudentupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender','send_to_all')->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    }
}
