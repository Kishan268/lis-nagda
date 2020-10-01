<?php

namespace App\Http\Controllers\Admin\teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\teachers\Teacher;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 'edsfdsf';
        $teachers = Teacher::with('teacher')->where('status',1)->get();
        // dd($teachers);
        return view('admin.teachers.index',compact('teachers'));

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
        $data = $request->validate([
            'name'          => 'required|string|max:255|min:3',
            'email'         => 'required|email|max:255|unique:users',
            'mobile_no'     => 'required|min:10|max:11|regex:/^[0-9]+$/',
            'password'      => 'required|string|max:10|min:5'
        ]);
        $data['user_flag']  = 'T';
        $data['parent_id']  = Auth::user()->id;
        $data['password'] = Hash::make($request->password);
        $data['username'] = $request->email;
        $data = User::create($data);
        $lastId = $data->id;
        $teacherData['id']   = $lastId;
        $teacherData['parent_id']   = $data['parent_id'];
        Teacher::create($teacherData);
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
        $teachers = Teacher::with('teacher')->where('status',1)->get();
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
}
