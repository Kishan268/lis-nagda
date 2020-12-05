<?php

namespace App\Http\Controllers\Admin\teachers;

use Auth;
use App\User;
use App\Mail\UserNamePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\teachers\Teacher;
use App\Models\master\Subject;
use App\Models\teachers\AssignSubjectToTeacher;
use App\Models\teachers\AssignSubIdToTeacher;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\sendmessage\SendMessage;

class TeacherController extends Controller
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
        // return 'edsfdsf';
        $teachers = Teacher::has('teacher')->with('teacher')->where('status',1)->get();
        $table_title = 'Teachers';
        // dd($teachers);
        // return $teachers;
        return view('admin.teachers.index',compact('teachers','table_title'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name'          => 'required|string|max:255|min:3',
            'email'         => 'required|email|max:255|unique:users',
            'mobile_no'     => 'required|min:10|max:11|regex:/^[0-9]+$/',
            'password'      => 'required|string|max:10|min:5'
        ]);
        $data['user_flag']  = 'T';
        $data['parent_id']  = Auth::user()->id;
        $data['password']   = Hash::make($request->password);
        $data['username']   = $request->name;

        $insertDatainUsrTbl = User::create($data);
        $lastId = $insertDatainUsrTbl->id;
        $teacherData['id']   = $lastId;
        $teacherData['parent_id']   = $data['parent_id'];
        $insertDatainTeacherTbl    = Teacher::create($teacherData);

        // $data->Teacher()->sync($lastId);
         // send user name and password using email and SMS..................
          /*  if ( $insertDatainUsrTbl) {
              
                $userNamePassword['base_url'] =  url('/login');
                $userNamePassword['username'] =   $request->name;
                $userNamePassword['email']    =   $request->email;
                $userNamePassword['password'] =   $request->password;

                Mail::to($userNamePassword['email'])->send(new UserNamePassword($userNamePassword));

                $sendData = [
                    'message' =>'Your User name or Password. User Name:-'.$userNamePassword['username'].' , Password:- '.$userNamePassword['password'].' , You can Login using Email Addaress ('.$userNamePassword['email'].')   Click '.$userNamePassword['base_url'].'',
                    'mobile' => $data['mobile_no'] 
                ]; 

                $sendMessage = SendMessage::sendCode($sendData);
                // if ($sendMessage) {
                //     $user = User::find($insertDatainUsrTbl)->update(['message_sent' => 1]);
                //   }  
            }*/
        //end send user name and password using email and SMS..................

       return back()->with("success","Teacher created Successfully");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teachers = Teacher::has('teacher')->with('teacher')->where('status',1)->get();
        // dd($teachers);
        return view('admin.teachers.show',compact('teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacherUpdate = User::find($id);
        return view('admin.teachers.edit',compact('teacherUpdate'));
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
            'name'          => 'required|string|max:255|min:3',
            'email'         => 'required|email|max:255',
            'mobile_no'     => 'required|min:10|max:11|regex:/^[0-9]+$/',
            'password'      => 'required|string|max:10|min:5'
        ]);
        $data['user_id']  = Auth::user()->id;
        $data['password'] = Hash::make($request->password);
        User::find($request->id)->update($data);
        
       return back()->with("success","Teacher updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->update(['deleted_at'=>date('Y-m-d H:i:s'),'status'=>'0']);
        Teacher::where('id',$id)->update(['deleted_at'=>date('Y-m-d H:i:s'),'status'=>'0']);

        return redirect()->back()->with('success','Teacher deleted successfully');
    }

    public function subjectAndTeacher(Request $request){

         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
         $teacher     = User::where('user_flag','T')->get();
         $subject     = Subject::get();
         
        return view('admin.teachers.assign-subject.index',compact('teacher','subject','classes','batches','sections'));
    } 
    public function subjectAssignToTeacher(Request $request){
     
         $data = $request->validate([
                'batch_id'       => 'required',
                'class_id'       => 'required',
                'section_id'     => 'required',
                'teacher_id'     => 'required'
        ]);
        $data['user_id']  = Auth::user()->id;
        $lastId = AssignSubjectToTeacher::create($data);
        $count = count($request->all_subject_id);
                
        for($i= 0 ; $i < count($request->all_subject_id); $i++) {
            $data2 = [
                'assign_subject_teacher_id'   => $lastId->id,
                'assign_subject_id'   => $request->all_subject_id[$i]
            ];
            AssignSubIdToTeacher::create($data2);

        }
        
       return "success";
        
    }

    public function getSubAssToTeacher(Request $request){
        // dd($request);
        // $assignedSub = AssignSubIdToTeacher::with('get_assign_subject')->get();
        $data1 = AssignSubjectToTeacher::with('get_assign_subject')
                        ->where('class_id',$request->class_id)
                        ->where('batch_id',$request->batch_id)
                        ->where('section_id',$request->section_id)
                        ->where('teacher_id',$request->teacher_id)
                        ->get();
            $get_assign_subject = [];            
            foreach ($data1 as $value) {
                // $get_assign_subject[] = $value->assign_subject_id ;
                foreach ($value['get_assign_subject'] as $value1) {
                    $get_assign_subject[] = $value1->assign_subject_id ;
                }
            }
            // dd($get_assign_subject);

        $data = Subject::whereIn('id',$get_assign_subject)->get();               
        return response()->json($data);
    } 
}
