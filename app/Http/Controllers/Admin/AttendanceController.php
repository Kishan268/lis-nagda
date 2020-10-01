<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\StudentAttendance;
use Auth;
use App\User;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    public function index(){
    	return view('admin.attendance.index');
    } 
    public function studentAttendance(){
    	// $data = $this->details();
    	 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
       	return view('admin.attendance.student.index',compact('classes','batches','sections','studentData'));
    }
   
  



    public function studentFetch(Request $request){

        $students = studentsMast::select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')
        						->where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();

        $attendance_students = StudentAttendance::where('attendance_date',date('Y-m-d'))->whereIn('s_id',collect($students)->pluck('id'))->get();
        // dd($students);
    	return view('admin.attendance.student.table',compact('students','attendance_students'));
    }

    public function attendanceSubmit(Request $request){
// dd($request);
    	if(Carbon::now()->dayName != 'Sunday'){
            $present_students = $request->present_student;
            $total_students = $request->total_student;
            $user_id = Auth::user()->id;
            $submitted_by = $user_id;

            // if(Auth::user()->hasRole('lawcollege')){
            //     $user_id = Auth::user()->id;
            //     $submitted_by = $user_id;
            // }else{
            //     $user_id = Auth::user()->parent_id;
            //     $submitted_by = Auth::user()->id;
            // }  

            $attendance = StudentAttendance::whereIn('s_id',$total_students)->where('attendance_date',date('Y-m-d'))->get();  
            if($present_students !=null){
                $absent_students = array_diff($total_students, $present_students);
            // return $absent_students;
            }else{
                $absent_students = $total_students;
            }


            if(count($attendance) == 0){
                    $data = [
                        'user_id'         => $user_id,
                        'submitted_by'    => $submitted_by,
                        'attendance_date' => date('Y-m-d')
                    ];
                foreach ($absent_students as $absent_student) {
                    $data['s_id'] = $absent_student;
                    $data['present'] = 'A';
                    StudentAttendance::create($data);
                }
                foreach ($present_students as $present_student) {       
                    $data['s_id'] = $present_student;
                    $data['present'] = 'P';
                    StudentAttendance::create($data);
                }

                // if(Auth::user()->hasRole('teacher')){
                //     $user = User::find(Auth::user()->parent_id);
                //     $message = [
                //         'id' => '',
                //         'title' => 'attendance Submit',
                //         'url' => 'attendance/dashboard',
                //         'message' => 'Students attendance submitted' 
                //     ];
                //     $user->notify(new attendanceNotifications($message));
                // }
                $message = [
                        'id' => '',
                        'title' => 'attendance Submit',
                        'url' => 'attendance/dashboard',
                        'message' => 'Students attendance submitted' 
                    ];
                    // $user->notify(new attendanceNotifications($message));
                return 'success';
            }else{
                return "warning";
            }
        }else{
            return "sunday";
        }
    }

     public function staffAttendance(){

        // $data = User::with(['attendances' => function($query){
        // $query->where('attendance_date',date('Y-m-d'));
        // }])->whereRoleIs('teacher');

        // if(Auth::user()->hasRole('lawcollege')){
            $users = $data->where('parent_id',Auth::user()->id)->get();
        // }else{
        //     $users = $data->where('parent_id',Auth::user()->parent_id)->get(); 
        // }
        // return $users;

        return view('admin.attendance.staff.index',compact('users'));
    }

    public function attendanceUpload(){
    	
    }
	public function manageStudentAttendance(){

		 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();

	   return view('admin.attendance.manage.student',compact('classes','batches','sections','studentData'));
	}
	public function attendanceStudentReport(){
	    	
	}
	public function manageStaffAttendance(){

		$attendance_staffs =array();
        return view('admin.attendance.manage.staff',compact('attendance_staffs'));
	    	
	}

	public function manageStudentFilter(Request $request){

		// dd($request);
		$students = studentsMast::select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')
        						->where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                        		->get();
                        		// dd($students);
        // if(Auth::user()->hasRole('lawcollege')){
            // $students = $students->where('user_id',Auth::user()->id);
        // }else{
        //     $students = $students->where('user_id',Auth::user()->parent_id);
        // }  
         if(count($students) !=0){
            $attendance_students = StudentAttendance::with('student')->where('attendance_date',$request->attendance_date)->whereIn('s_id',collect($students)->pluck('id'))->get();
            // $attendance_students = StudentAttendance::where('attendance_date',$request->attendance_date)->whereIn('s_id',collect($students)->pluck('id'))->get();
        }else{
            $attendance_students = [];
        }
        return view('admin.attendance.manage.student_table',compact('students','attendance_students'));     
	}

	public function attendanceUpdate(Request $request){

        $present_students = $request->present_student;
        $total_students = $request->total_student;
 		$user_id = Auth::user()->id;
        $submitted_by = $user_id;
        // if(Auth::user()->hasRole('lawcollege')){
            // $user_id = Auth::user()->id;
            // $submitted_by = $user_id;
        // }else{
        //     $user_id = Auth::user()->parent_id;
        //     $submitted_by = Auth::user()->id;
        // }  
     	$data = [
            'user_id'         => $user_id,
            'submitted_by'    => $submitted_by,
            'attendance_date' => date('Y-m-d')
        ];

        if($present_students !=null){
            $absent_students = array_diff($total_students, $present_students);
        }
        else{
            $absent_students = $total_students;
        }
            foreach ($absent_students as $absent_student) {
                $data['s_id'] = $absent_student;
                $data['present'] = 'A';
                $data = StudentAttendance::where('s_id',$absent_student)->where('attendance_date',$request->attendance_date)->update(['present' => 'A']);
            }
        if($present_students !=null){
            foreach ($present_students as $present_student) {       
                $data['s_id'] = $present_student;
                $data['present'] = 'P';
                StudentAttendance::where('s_id',$present_student)->where('attendance_date',$request->attendance_date)->update(['present' => 'P']);
            }
        }

        return 'success';
    
    }

}
