<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|null|object
     */
    public static function roleId($id)
    {
        $users = DB::table('users')->select(
            'users.name',
            'users.email',
            'user_roles.name as role',
            'users.id',
            'users.role as role_id'
        )
            ->leftJoin('user_roles', 'users.role', '=', 'user_roles.id')
            ->where('users.id', '=', $id)
            ->first();
        return $users;
    }

    /**
     * @param $role
     * @return bool
     */
    public static function hasRole($role)
    {
        $user_id = Auth::id();

        $role = DB::table('user_roles')
            ->where('name', '=', $role)
            ->get();
        $user = DB::table('users')
            ->where('role', '=', $role[0]->id)
            ->get();
        return count($user) === 1;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userRole()
    {
        return $this->hasOne('App\UserRole', 'id', 'role');
    }
}
