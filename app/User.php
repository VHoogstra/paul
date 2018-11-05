<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public static function roleAll()
    {
        $users = DB::table('users')->select('users.name', 'users.email', 'user_roles.name as role','users.id')
            ->leftJoin('user_roles', 'users.role', '=', 'user_roles.id')
            ->get();
        return $users;
    }

    public static function roleId($id)
    {
        $users = DB::table('users')->select('users.name', 'users.email', 'user_roles.name as role','users.id','users.role as role_id')
            ->leftJoin('user_roles', 'users.role', '=', 'user_roles.id')
            ->where('users.id','=',$id)
            ->first();
        return $users;
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    static public function hasRole($role){
        $user_id = Auth::id();

        $role= DB::table('user_roles')
            ->where('name','=',$role)
            ->get();
        $user =DB::table('users')
            ->where('role','=',$role[0]->id)
            ->get();
        if(count($user)==1){
            return true;
        }else{
            return false;
        }
    }
}
