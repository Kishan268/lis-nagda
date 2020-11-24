<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeCircular;
use Auth;
use App\User;
use App\Models\student\studentsMast;
use App\Models\master\studentBatch;
use App\Models\teachers\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Auth::user()->roles;
        $getNotication = NoticeCircular::get();
        $currentdate = date("Y-m-d");
        $birthUsers = User::where('user_flag','S')->whereDate('dob',date('Y-m-d'))->get();
        // return $getDob;

        $students = studentsMast::get();
        $studentBatch = studentBatch::get();
        $Teacher = Teacher::get();
        return view('home',compact('getNotication','birthUsers','currentdate','students','studentBatch','Teacher'));

    }

    public function studentDashboard(){
        return view('admin.students.student-details.create');

    }
}
