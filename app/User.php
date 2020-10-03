<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','student_id','username','parent_id','user_flag','mobile_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function usersDetails(){
        return $this->belongsTo('App\User','id');
    }
     public function usersId(){
        return $this->hasMany('App\Models\team\TeachersTeam','id','users_id');
    }
     public function attendances(){
        return $this->hasMany('App\Models\StaffAttendance','staff_id');
    }
}
