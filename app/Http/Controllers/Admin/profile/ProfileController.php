<?php

namespace App\Http\Controllers\Admin\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\master\countryMast;
use App\Models\master\stateMast;
use App\Models\master\cityMast;
use App\Models\student\studentsMast;

class ProfileController extends Controller
{


    public function __construct()
    {
         $this->middleware('auth');
         $this->country   = countryMast::get();
         $this->state     = stateMast::get();
         $this->city      = cityMast::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::with('city','state','country')->find($id);
        // dd($user);
        return view('admin.profile.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $country   = $this->country;
        $state     = $this->state;
        $city      = $this->city;
        $getUserData = User::with('city','state','country')->find($id);
        // dd($getUserData);
        return view('admin.profile.edit',compact('getUserData','country','state','city'));
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
        // $getUserData = user::find($id);

            $data = $request->validate([
                    'name' =>'required',
                    'created_at' =>'required',
                    'mobile' =>'required',
                    'alternative_mo_no' =>'required',
                    'country_id' =>'required',
                    'state_id' =>'required',
                    'city_id' =>'required',
                    'zip_code' =>'required',
                    'dob' =>'required'
            ]);
        if ($request->user_flag == null OR $request->user_flag == 'T') {
            if($request->photo !=null){
                $verify = $request->validate([
                    'photo' =>'required|image|mimes:jpeg,png,jpg' 
                ]);
                $filename = $request->name.'_'.time().'.'.$request->photo->getClientOriginalName();
                $year = date('Y');
                    
                if(!empty($student)){
                    if($student->photo !=null){
                     Storage::delete('public/'.$student->photo);   
                    }
                }
               $image = $request->photo->storeAs('public/profile_'.Auth::user()->id.'/profile/', $filename);
               $data['photo'] = 'profile_'.Auth::user()->id.'/profile/'.$filename;
            }
            else{
                $getProfile = user::find($id);
                $data['photo'] = $getProfile->photo;
            }
            user::where('id',$id)->update($data);

        }else if($request->user_flag == 'S'){
            if($request->photo !=null){
                $verify = $request->validate([
                    's_photo' =>'required|image|mimes:jpeg,png,jpg' 
                ]);
                $filename = $request->name.'_'.time().'.'.$request->photo->getClientOriginalName();
                $year = date('Y');
                    
                if(!empty($student)){
                    if($student->photo !=null){
                     Storage::delete('public/'.$student->photo);   
                    }
                }
               $image = $request->photo->storeAs('public/sprofile_'.Auth::user()->id.'/profile/', $filename);
               $data['s_photo'] = 'profile_'.Auth::user()->id.'/profile/'.$filename;
            }
            else{
                $getProfile = studentsMast::find($id);
                // dd($getProfile);
                $data['s_photo'] = $getProfile->s_photo;
                $getUser = user::find($id);
                $data['photo'] = $getUser->photo;
            }
            studentsMast::where('s_id',$id)->update($data);
            user::where('id',$id)->update($data);

        }
        return redirect()->back()->with('success','Profile Updated successfully');

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
}
