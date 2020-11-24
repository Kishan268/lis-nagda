<?php

namespace App\Http\Controllers\Admin\composeSmsAndEmail;

use Auth;
use File;
use Validator;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\student\studentsMast;
use App\Models\AssignSubjectGroupStudent;
use App\Models\composeEmail\ComposeEmailStaffId;
use App\Models\composeEmail\ComposeEmailStudentId;
use App\Models\composeEmail\ComposeSmsStaffId;
use App\Models\composeEmail\ComposeSmsStudentId;
use App\Models\composeEmail\ComposeSmsStaffIdAndStudentId;
use App\Models\composeEmail\ComposeEmail;
use App\Models\composeEmail\ComposeSms;


use App\Models\compose\ComposeSmsEmailMast;
use App\Models\compose\ComposeSmsEmail;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeMail;
use App\Models\sendmessage\SendMessage;

class EmailAndSMSController extends Controller
{

// code start for compose email..................................

    public function emailCompose(){
    	  $classes = studentClass::get();
        $batches = studentBatch::get();


        
        $sections = studentSectionMast::get();
        $teacher = User::where('user_flag','T')->get();
        return view('admin.composeSmsAndEmail.email.index',compact('classes','sections','batches','teacher'));

    }

    public function getStudentsForEmailCompose(Request $request){

    	// $userRole = Auth::user()->roles;
    	if ($request->type =='student') {
    	
    	 $getData = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
       	$type ='student';
         return view('admin.composeSmsAndEmail.student-table',compact('getData','type'));                       

    	}else{
    		$getData = User::where('user_flag','T')->get();
    		$type ='faculty';
         return view('admin.composeSmsAndEmail.staff-table',compact('getData','type'));                       
    	}
    }

    public function sendEmail(Request $request){
   		
   		if($request->attechment !=null){
           //  $verify = $request->validate([
           //      'attechment'  => 'required|mimes:doc,docx,pdf,txt,xlsx,jpeg,png,jpg|max:2048',
           //  ]);
           //  $filename = time().'.'.$request->attechment->getClientOriginalName();
           //  $image = $request->attechment->storeAs('public/emailComposeAttechment_'.Auth::user()->id.'/emailComposeAttechment', $filename);
           // $data['attechment'] = 'emailComposeAttechment_'.Auth::user()->id.'/emailComposeAttechment'.$filename;
	   		$filename        = $request->file('attechment')->getClientOriginalName();
	        $extension       = $request->file('attechment')->getClientOriginalExtension();
	        $fileNameToStore = $filename;          
	        $path            = $request->file('attechment')->store('emailComposeAttechment_'.Auth::user()->id, 'public');

	        $data['attechment']    = $fileNameToStore;
        }else{
            $data['attechment'] = 'null';
        }
        $data['user_id']  = Auth::user()->id;
        $data['batch_id'] = $request->batch_id;
        $data['class_id'] = $request->std_class_id;
        $data['section_id'] = $request->section_id;
        $data['subject']  = $request->subject;
        $data['compose_mail_content'] = $request->compose_mail_content;
        if($request->sendtype == 1){
            $data['sender_type'] = 'send_to_all';
        }else if($request->sendtype == 2){
            $data['sender_type'] = 'send_to_students';
            $data['student_ids'] =  implode(',', $request->s_id);

        }else if($request->sendtype == 3){
            $data['sender_type'] = 'send_to_all_faculty';
            $data['staff_ids']   =  implode(',', $request->faculty_id);
        }

        $lastId = ComposeEmail::create($data)->id;
        if ($request->sendtype == 2) {
            $getComposeEmail = ComposeEmail::where('id',$lastId)->first();
            $studentIds = $getComposeEmail->student_ids;
            $studentIdsArray = explode(',', $studentIds);
            $getUser = studentsMast::whereIn('id',$studentIdsArray)->get();

            foreach ($getUser as  $getUsers) {
                // Send sms...........................................
               /* $studentsEmail = $getUsers->email;
                $content = File::get('storage/'.$path);
                $applicantData = ([
                    'data' => $data,
                    'file' => $content,
                    'exe' => $extension,
                ]);
                Mail::to($studentsEmail)->send(new ComposeMail($applicantData));*/
            }
       }else if ($request->sendtype == 3) {
            $getComposeSms = ComposeEmail::where('id',$lastId)->first();
            $staffIds = $getComposeSms->staff_ids;
            $staffIdsArray = explode(',', $staffIds);
            $getStaff = User::where('user_flag','T')->whereIn('id',$staffIdsArray)->get();

            foreach ($getStaff as  $getStaffs) {
            // Send email...........................................
               /*$teacherEmail = $getStaffs->email;
               $content = File::get('storage/'.$path);
                $applicantData = ([
                    'data' => $data,
                    'file' => $content,
                    'exe' => $extension,
                ]);
                Mail::to($teacherEmail)->send(new ComposeMail($applicantData));*/
            }
       }else if ($request->sendtype ==1) {
            
            $getAll = User::where('user_flag','T')->where('user_flag','S')->get();

             foreach ($getAll as  $getAlls) {
                $allEmail = $getAlls->email;
                // Send mail...........................................
               /* $content = File::get('storage/'.$path);
                $applicantData = ([
                    'data' => $data,
                    'file' => $content,
                    'exe' => $extension,
                ]);
                
                Mail::to($allEmail)->send(new ComposeMail($applicantData));
                */
                }

       }   
   

      return "success";
    }
// end code for compose mail..................................

// code start for compose SMS..................................
   public function smsCompose(){

         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $teacher = User::where('user_flag','T')->get();
        return view('admin.composeSmsAndEmail.sms.index',compact('classes','sections','batches','teacher'));
    }   
    public function getStudentsForSmsCompose(Request $request){
        if ($request->type =='student') {
        
         $getData = studentsMast::with('user_data')->where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
                                // dd($getData);
        $type ='student';
         return view('admin.composeSmsAndEmail.student-table',compact('getData','type'));                       

        }else{
            $getData = User::where('user_flag','T')->get();
            $type ='faculty';
         return view('admin.composeSmsAndEmail.staff-table',compact('getData','type'));                       
        }
    } 
    public function sendSms(Request $request){
    	$data['user_id']  = Auth::user()->id;
        $data['batch_id'] = $request->batch_id;
        $data['class_id'] = $request->std_class_id;
        $data['section_id'] = $request->section_id;
        $data['compose_sms_content'] = $request->compose_sms_content;
        if($request->sendtype == 1){
            $data['sender_type'] = 'send_to_all';
        }else if($request->sendtype == 2){
            $data['sender_type'] = 'send_to_students';
            $data['student_ids'] =  implode(',', $request->s_id);

        }else if($request->sendtype == 3){
            $data['sender_type'] = 'send_to_all_faculty';
            $data['staff_ids']   =  implode(',', $request->faculty_id);
        }


       if ($request->sendtype ==1) {
            $getAll = User::get();
             foreach ($getAll as  $getAlls) {
                $data['reciver_id'] = $getAlls->id;

                $lastId = ComposeSms::create($data)->id;

                $getMobile = $getAlls->mobile_no;
                // Send sms...........................................
                /*$sendData = [
                        'message' =>$data['compose_sms_content'],
                        'mobile' => $getMobile 
                    ]; 
                    $sendMessage = SendMessage::sendCode($sendData);
                    if ($sendMessage) {
                        $user = User::find($getStaffs->id)->update(['compose_message_sent' => '1']);
                    } */ 
                }

       }else if ($request->sendtype == 2) {
      
           $count1 = count($request->s_id);
            if($count1 != 0){
                $y = 0;
                while($y < $count1){
                    if($request->s_id[$y] !=''){
                        $data3 = array(
                           'user_id'  => Auth::user()->id,
                           'sender_type'  => $data['sender_type'],
                           'batch_id'  => $data['batch_id'],
                           'class_id'  => $data['class_id'],
                           'section_id'  => $data['section_id'],
                           'compose_sms_content' => $data['compose_sms_content'],
                            'reciver_id'    => $request->s_id[$y]
                        );

                        $getStudents = ComposeSms::create($data3);
                        //send sms......................
                        // $studentMast = User::where('user_flag','S')->where('id',$request->s_id[$y])->first();
                        // $studentMobile = $studentMast->mobile_no;
                        // $sendData = [
                        //     'message' => $data['compose_sms_content'],
                        //     'mobile' =>  $studentMobile
                        // ]; 
                        // $sendMessage = SendMessage::sendCode($sendData);
                        // if ($sendMessage) {
                        //     $user = User::where('id',$getStudents->s_id )->update(['compose_message_sent' => '1']);
                        // }
                    }             
                    $y++; 
                }
            } 
       }else if ($request->sendtype == 3) {
           
            $count1 = count($request->faculty_id);
            if($count1 != 0){
                $y = 0;
                while($y < $count1){
                    if($request->faculty_id[$y] !=''){
                        $data3 = array(
                           'user_id'  => Auth::user()->id,
                           'sender_type'  => $data['sender_type'],
                           'compose_sms_content' => $data['compose_sms_content'],
                            'reciver_id'    => $request->faculty_id[$y]
                        );

                        $getStaffs = ComposeSms::create($data3);
                        //send sms......................

                        // $teacherMast = User::where('user_flag','T')->where('id',$request->faculty_id[$y])->first();
                        // $teacherMobile = $teacherMast->mobile_no;
                        // $sendData = [
                        //     'message' => $data['compose_sms_content'],
                        //     'mobile' =>  $teacherMobile 
                        // ]; 
                        // $sendMessage = SendMessage::sendCode($sendData);
                        // if ($sendMessage) {
                        //     $user = User::where('id',$getStaffs->faculty_id )->update(['compose_message_sent' => '1']);
                        // }
                    }             
                    $y++; 
                }
            } 
       }
      
      return "success";
    } 

    public function smsDeliveryReport(){

        $getComposeSms = ComposeSms::with('get_user')->orderBy('id', 'DESC')->get();
        $getStaffId = [];
        $getstudent = [];
        // foreach ($getComposeSms as $getId) {
        //     foreach ($getId['get_compose_sms'] as $getstudents) {
        //         $getReciverId [] = $getstudents;
        //         $composeSmsId [] = $getstudents->compose_sms_id;

        //     }
        // } 
        // $getAll = ComposeSms::whereIn('reciver_id',$getReciverId)->get();
        // dd($getAll);
        return view('admin.composeSmsAndEmail.sms.delivery-record',compact('getComposeSms')); 
    }
    //end code for compose SMS..................................
}
