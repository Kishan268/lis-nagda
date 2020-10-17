<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\StudentAttendance;
use App\Models\StaffAttendance;
use App\Helpers\Helpers;


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
    	return view('admin.attendance.student.table',compact('students','attendance_students'));
    }

    public function attendanceSubmit(Request $request){

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
                $user->notify(new attendanceNotifications($message));
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
        //     $query->where('attendance_date',date('Y-m-d'));
        // }]);
        $users = User::where('user_flag','T')->get();
        // dd($users[0]->id);
        // if(Auth::user()->hasRole('lawcollege')){
            // $users = $data->where('parent_id',Auth::user()->id)->get();
        // }else{
        //     $users = $data->where('parent_id',Auth::user()->parent_id)->get(); 
        // }
        // return $users;
        $attendance_staffs = StaffAttendance::where('attendance_date',date('Y-m-d'))->whereIn('staff_id',collect($users)->pluck('id'))->get();
        // dd($users);
        return view('admin.attendance.staff.index',compact('users','attendance_staffs'));
    }

    public function attendanceStaffSubmit(Request $request){

        // dd($request);
        if(Carbon::now()->dayName != 'Sunday'){
            $present_staffs = $request->present;
            $total_staffs = $request->total;

            $attendances = StaffAttendance::whereIn('staff_id',$total_staffs)->where('attendance_date',date('Y-m-d'))->get();  
            $user_id = Auth::user()->id;
            $submitted_by = $user_id;
            // return $attendances;
                
            // if(Auth::user()->hasRole('lawcollege')){
            //     $user_id = Auth::user()->id;
            //     $submitted_by = $user_id;
            // }else{
            //     $user_id = Auth::user()->parent_id;
                $submitted_by = Auth::user()->id;
            // }  



            if($present_staffs !=null){
                $absent_staffs = array_diff($total_staffs, $present_staffs);
            }else{
                $absent_staffs = $total_staffs;
            }

            // return $absent_students;

            if(count($attendances) == 0){
                    $data = [
                        'user_id'         => $user_id,
                        'submitted_by'    => $submitted_by,
                        'attendance_date' => date('Y-m-d')
                    ];
                foreach ($absent_staffs as $absent_staff) {
                    $data['staff_id'] = $absent_staff;
                    $data['present'] = 'A';
                    StaffAttendance::create($data);
                }
                foreach ($present_staffs as $present_staff) {       
                    $data['staff_id'] = $present_staff;
                    $data['present'] = 'P';
                    StaffAttendance::create($data);
                }
                // if(Auth::user()->hasRole('teacher')){
                    $user = User::find(Auth::user()->parent_id);
                    $message = [
                        'id' => '',
                        'title' => 'attendance Submit',
                        'url' => 'attendance/dashboard',
                        'message' => 'Staff attendance submitted' 
                    ];
                     $user->notify(new attendanceNotifications($message));
                // }
                return 'success';
            }else{
                return "warning";
            }
        }else{
            return "sunday";
        }

    }
     public function staff_filter(Request $request){

        // if(Auth::user()->hasRole('lawcollege')){
            $users =User::where('parent_id',Auth::user()->id)->get();
            // $users =User::whereRoleIs('teacher')->where('parent_id',Auth::user()->id)->get();
        // }else{
        //     $users = User::whereRoleIs('teacher')->where('parent_id',Auth::user()->parent_id)->get(); 
        // }

        $attendance_staffs = StaffAttendance::with('staff')->where('attendance_date',$request->attendance_date)->whereIn('staff_id',collect($users)->pluck('id'))->get();
        // return $attendance_staffs;

       return view('admin.attendance.manage.staff_table',compact('attendance_staffs'));
    }

    public function attendance_staff_update(Request $request){
        $presents = $request->presents;
        $totals = $request->totals;
        // if(Auth::user()->hasRole('lawcollege')){
            $user_id = Auth::user()->id;
            $submitted_by = $user_id;
        // }else{
        //     $user_id = Auth::user()->parent_id;
        //     $submitted_by = Auth::user()->id;
        // }  

        $data = [
            'user_id'         => $user_id,
            'submitted_by'    => $submitted_by,
            'attendance_date' => date('Y-m-d')
        ];
        if($presents !=null){
            $absents = array_diff($totals, $presents);
        }
        else{
            $absents = $totals;
        }
            foreach ($absents as $absent) {
                $data['staff_id'] = $absent;
                $data['present'] = 'A';
                StaffAttendance::where('staff_id',$absent)->where('attendance_date',$request->attendance_date)->update(['present' => 'A']);
            }
        if($presents !=null){
            foreach ($presents as $present) {       
                $data['staff_id'] = $present;
                $data['present'] = 'P';
                StaffAttendance::where('staff_id',$present)->where('attendance_date',$request->attendance_date)->update(['present' => 'P']);
            }
        }

        return 'success';
        return $request->all();
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
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
        return view('admin.attendance.report.student',compact('classes','batches','sections','studentData'));
	}
	public function manageStaffAttendance(){

		$attendance_staffs =array();
        return view('admin.attendance.manage.staff',compact('attendance_staffs'));
	    	
	}

	public function manageStudentFilter(Request $request){

		$students = studentsMast::select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')
        						->where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                        		->get();

        // $students = $students->where('user_id',Auth::user()->id);
        // dd($students);
        // if(Auth::user()->hasRole('lawcollege')){
            // $students = $students->where('user_id',Auth::user()->id);
        // }else{
        //     $students = $students->where('user_id',Auth::user()->parent_id);
        // } 
// dd($request);

         if(count($students) !=0){
            $attendance_students = StudentAttendance::with('student')->where('attendance_date',$request->attendance_date)->whereIn('s_id',collect($students)->pluck('id'))->get();
            // dd($attendance_students);
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
                StudentAttendance::where('s_id',$absent_student)->where('attendance_date',$request->attendance_date)->update(['present' => 'A']);
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

    public function report_generate(Request $request){

       $data =  $request->validate([
            'std_class_id' => 'required|not_in:""',
            'batch_id' => 'required|not_in:""',
            'section_id' => 'required|not_in:""',
            'attendance_date' => 'required',
        ],
        [
            'std_class_id.*' => 'Qualification Type field is required', 
            'std_class_id.*' => 'Qualification subcategory field is required', 
            
        ]
    );

        $date = $this->date_month_year($request->attendance_date);
        $month = $date['month'];
        $year = $date['year'];
        $monthStart = $date['monthStart'];
        $monthEnd = $date['monthEnd'];
      


        // $students = $this->filter($request)->with(['attendances' => function($query) use ($year, $month){
        //     $query->whereYear('attendance_date',$year)->whereMonth('attendance_date',$month);
        // }])->get();
        $students = studentsMast::with('attendances')->select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')
                                ->where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();      
        
// dd($students);
        $academic_dates = Helpers::academic_dates($month,$year);
        $monthDates = Helpers::month_dates($monthStart,$monthEnd);
        // dd($students);

        $headerData = [
            'monthYear' => $date['month1']->format('F, Y')
        ];

        // $qual = QualMast::find($request->qual_code);

        // $filter = [
        //     'qual' => $qual->qual_catg_desc,
        //     'qual_catg' => $qual->qual_desc,
        //     'year' => $request->year,
        //     'semester'=>$request->semester,
        //     'batch' => BatchMast::find($request->batch)->name
        // ];

        // return  view('attendance.report.clone',compact('monthDates','academic_dates','students','headerData','filter','data'));
        return  view('admin.attendance.report.monthly_report',compact('monthDates','academic_dates','students','headerData'));

        $exportData = [
            'monthDates' => $monthDates,
            'academic_dates' => $academic_dates,
            'students' => $students,
            'headerData' => $headerData,
            'filter' => $filter,
            'data' => $data,
        ];

        return Excel::download(new StudentAttendenceExport($exportData), 'sheet.xlsx');
         
    }

    public function date_month_year($attendance_date){
        $year = date('Y',strtotime($attendance_date));
        $month = date('m',strtotime($attendance_date));   

        $month1 = Carbon::createFromFormat('Y-m', $attendance_date);
        $monthStart = $month1->startOfMonth()->copy();
        $monthEnd = $month1->endOfMonth()->copy();
        return $data = [
            'year' => $year,
            'month' => $month,
            'month1' => $month1,
            'monthStart' => $monthStart,
            'monthEnd'  => $monthEnd,
        ]; 
    }

    public function filter($request){
        $students = studentsMast::select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')
                                ->where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
        // if(Auth::user()->hasRole('lawcollege')){
            $students = $students->where('user_id',Auth::user()->id);
        // }else{
        //     $students = $students->where('user_id',Auth::user()->parent_id);
        // }       
        return $students;
    }


    public function attendance_staff_report(){
        
        return view('admin.attendance.report.staff');
    }

     public function staff_report_generate(Request $request){
        $date = $this->date_month_year($request->attendance_date);
        $month = $date['month'];
        $year = $date['year'];
        $monthStart = $date['monthStart'];
        $monthEnd = $date['monthEnd'];
        
        $usersData = User::with(['attendances' => function($query) use ($year, $month){
            $query->whereYear('attendance_date',$year)->whereMonth('attendance_date',$month);
        }]);
        //  $usersData = User::with(['attendances' => function($query) use ($year, $month){
        //     $query->whereYear('attendance_date',$year)->whereMonth('attendance_date',$month);
        // }])->whereRoleIs('teacher');

        // if(Auth::user()->hasRole('lawcollege')){
            $users =$usersData->where('parent_id',Auth::user()->id)->get();

        // }else{
        //     $users =$usersData->where('parent_id',Auth::user()->parent_id)->get(); 
        // }

        $academic_dates = Helpers::academic_dates($month,$year);
        $monthDates = Helpers::month_dates($monthStart,$monthEnd);

        $headerData = [
            'monthYear' => $date['month1']->format('F, Y')
        ];

       
        return  view('admin.attendance.report.staff_monthly_report',compact('monthDates','academic_dates','users','headerData'));

        
    }
}
