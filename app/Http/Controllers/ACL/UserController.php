<?php

namespace App\Http\Controllers\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use DB;
use App\Models\acl\Role;
use App\Models\acl\Permission;

// use App\Models\acl\User;

class UserController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

  
    public function create()
    {
        $role        = Role::get();
        return view('acl.users.create',compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 'name' =>'required',
                                   'email' => 'required|email',
                                   'mobile_no'=>'required|numeric',
                                   'role'=>'required|numeric'
                                 ]);
        $password = substr($request->name,0,4).'1234';
        $name['name']     = strtolower($request->name);
        $name['password'] = $password;
        $name['username'] = $request->email;
        $name['mobile_no'] = $request->mobile_no;
        $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'mobile_no' => $request->mobile_no,
                );
        $user = User::insert($data);
        // $user->attachRole(3);

        $dta = array(
            'password' => $password, 
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
        );
        
        return $dta;
        // Mail::to($request->email)->send(new SendMailable($name));
        // return redirect('admin');
    }

   
    public function show($id)
    {
        // dd('');
        $data  = array();
        $data['user']        = User::find($id);
        $data['role']        = Role::get();
        $data['permissions'] = Permission::get();
        $permission          = DB::table('permissions')->where('id',$id)->get();
        $role                = DB::table('role_user')->where('user_id',$id)->get();
        $user                = User::where('parent_id',$id)->get();      
        $type                = $data['user']->acc_type;  

        $permission_ids = array();
        $role_ids = array();
        foreach ($permission as $ids) {
            $permission_ids[] = $ids->id; 
        }
        foreach ($role as $roles) {
            $role_ids[] = $roles->role_id; 
        }

        return view('acl.users.show',compact('data','permission_ids','user','role_ids','type'));
    }

    
    public function edit($id)
    {
        $data = User::find($id);
        return view('acl.users.edit',compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name' =>'required',
                                  ]);
        $data = User::find($id);
    
        $data['name'] = $request->name;
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }
       $data->save();
        return redirect('admin');
    }

    
    public function destroy($id)
    {
        User::destroy($id);
        DB::table('fleet_mast')->where('fleet_owner',$id)->delete();
        return redirect('admin');
    }

    public function changesRole(Request $request){
        $userId = $request->userId;
        $roleId = $request->roleId;

        $user = User::where('id', '=', $userId)->firstOrFail();
        $user->roles()->sync($roleId);
        return 'success';
        
    }

    public function changePermission(Request $request){
        $user         = User::findOrFail($request->userId);
        // dd($user);
        $permissionid = $request->permissionId;
        $user->syncPermissions($permissionid);
        return 'success';
    }
    public function showUserRolePermission(Request $request){
        // dd($request);
        $id = $request->id;
        $data  = array();
        $data['user']        = User::find($id);
        $data['role']        = Role::get();
        $data['permissions'] = Permission::get();
        $permission          = DB::table('permissions')->where('id',$id)->get();
        $role                = DB::table('role_user')->where('user_id',$id)->get();
        $user                = User::where('id',$id)->get();      
        $type                = $data['user']->acc_type;  
// dd($user);
        $permission_ids = array();
        $role_ids = array();
        foreach ($permission as $ids) {
            $permission_ids[] = $ids->id; 
        }
        foreach ($role as $roles) {
            $role_ids[] = $roles->role_id; 
        }

       if ($request->val == 'role') {

            return view('acl.users.assign-role',compact('data','permission_ids','user','role_ids','type'));

       }elseif($request->val == 'permission'){

            return view('acl.users.assign-permission',compact('data','permission_ids','user','role_ids','type'));
       }

    }
}

