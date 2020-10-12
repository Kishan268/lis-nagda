<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function redirectPath()
    // {
    //     $userFlag = Auth::user()->user_flag;
    //     // dd($userFlag);
    //     if (method_exists($this, 'redirectTo')) {
    //         return $this->redirectTo();
    //     }
    //     switch ($userFlag) {
    //         case 'A' : $login = '/admin';
    //             break;
    //         case 'T':
    //             return $login = '/teacher';
    //             break;
    //         case 'S':
    //             return $login = '/student';
    //             break;
    //         default:
    //             return $login='/';
    //     }
    //     return property_exists($this, 'redirectTo') ? $this->redirectTo : $login;
    // }

}
