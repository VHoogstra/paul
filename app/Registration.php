<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Registration extends Model
{
    /**
     * @param  $id
     * @param  $userId
     * @return array
     */
    public static function getUserRow($id, $userId): array
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
    public static function payedAndNotInside($id): array
    {
        $users = DB::select(
            'select * from registrations join students on registrations.user_id = students.id where party_id = ? AND (payed= 1 OR special =1) AND inside=0',
            [$id]
        );
        self::where(
            function ($query) {
                $query->where('payed', '=', '1')
                    ->orwhere('special', '=', '1');
            });
        return $users;
    }

    /**
     * @return int
     */
    public static function payedNotInsideCount(): int
    {
        $activeParty = Party::getActive();
        $userCount = self::where(
            function ($query) {
                $query->where('payed', '=', '1')
                    ->orwhere('special', '=', '1');
            })
            ->where('inside', '=', 0)
            ->where('party_id', '=', $activeParty->id)
            ->count();
        return $userCount;
    }

    /**
     * @return int
     */
    public static function payedCount(): int
    {
        $activeParty = Party::getActive();
        $userCount = self::where(
            function ($query) {
                $query->where('payed', '=', '1')
                    ->orwhere('special', '=', '1');
            })
            ->where('party_id', '=', $activeParty->id)
            ->count();
        return $userCount;
    }
    /**
     * @return int
     */
    public static function insideCount(): int
    {
        $activeParty = Party::getActive();
        $userCount = self::where('inside', '=', '1')->where('party_id', '=', $activeParty->id)->count();
        return $userCount;
    }
}
