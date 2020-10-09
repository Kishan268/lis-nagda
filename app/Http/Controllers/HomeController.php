<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeCircular;
use Auth;
use App\User;
use App\Models\student\studentsMast;

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
        $getNotication = NoticeCircular::get();
        $currentdate = date("Y-m-d");
        $getDob = user::get();

            return view('home',compact('getNotication','getDob','currentdate'));

    }

    public function studentDashboard(){
        return view('admin.students.student-details.create');

    }
}
