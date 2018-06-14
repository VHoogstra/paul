<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class registration extends Model
{
    public static function get_user_row($id, $userId)
    {
        return DB::select('select * from registrations where party_id = ? AND user_id = ?', [$userId, $id]);
        // return registration::select('*')->where('user_id', $userId)->where('party', $id)->get();

    }

    public static function payedUsers($id)
    {
        $users = DB::select('select * from registrations join students on registrations.user_id = students.id where party_id = ? AND (payed= 1 OR special =1)', [$id]);
        return $users;
    }public static function insideUsers($id)
    {
        $users = DB::select('select * from registrations join students on registrations.user_id = students.id where party_id = ? AND (inside= 1 )', [$id]);
        return $users;
    }public static function payedNinsde($id)
    {
        $users = DB::select('select * from registrations join students on registrations.user_id = students.id where party_id = ? AND (payed= 1 OR special =1) AND inside=1', [$id]);
        return $users;
    }
}
