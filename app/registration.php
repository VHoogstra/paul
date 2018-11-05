<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class registration extends Model
{
    /**
     * @param  $id
     * @param  $userId
     * @return array
     */
    public static function get_user_row($id, $userId): array
    {
        return DB::select(
            'select * from registrations where party_id = ? AND user_id = ?',
            [$id, $userId]
        );
        // return registration::select('*')->where('user_id', $userId)->where('party', $id)->get();
    }

    /**
     * @param  $id
     * @return array
     */
    public static function payedUsers($id): array
    {
        $users = DB::select(
            'select * from registrations join students on registrations.user_id = students.id where party_id = ? AND (payed= 1 OR special =1)',
            [$id]
        );
        return $users;
    }

    /**
     * @param  $id
     * @return array
     */
    public static function insideUsers($id): array
    {
        $users = DB::select(
            'select * from registrations join students on registrations.user_id = students.id where party_id = ? AND (inside= 1 )',
            [$id]
        );
        return $users;
    }

    /**
     * @param  $id
     * @return array
     */
    public static function payedNinsde($id): array
    {
        $users = DB::select(
            'select * from registrations join students on registrations.user_id = students.id where party_id = ? AND (payed= 1 OR special =1) AND inside=0',
            [$id]
        );
        return $users;
    }
}
