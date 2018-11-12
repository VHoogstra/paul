<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Registration extends Model
{

    protected $table = 'registrations';
    protected $appends = array('state');

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
            'select * from registrations join students on registrations.user_id = students.stamnr where party_id = ? AND (payed= 1 OR special =1)',
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
            'select * from registrations join students on registrations.user_id = students.stamnr where party_id = ? AND (inside= 1 )',
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
            'select * from registrations join students on registrations.user_id = students.stamnr where party_id = ? AND (payed= 1 OR special =1) AND inside=0',
            [$id]
        );
        self::where(
            function ($query) {
                $query->where('payed', '=', '1')
                    ->orwhere('special', '=', '1');
            }
        );
        return $users;
    }

    /**
     * @return int
     */
    public static function payedNotInsideCount(): int
    {
        $activeParty = Party::getActive();

        if (!$activeParty) {
            $userCount = 0;
        } else {
            $userCount = self::where(
                function ($query) {
                    $query->where('payed', '=', '1')
                        ->orwhere('special', '=', '1');
                }
            )
                ->where('inside', '=', 0)
                ->where('party_id', '=', $activeParty->id)
                ->count();
        }
        return $userCount;
    }

    /**
     * @return int
     */
    public static function payedCount(): int
    {
        $activeParty = Party::getActive();
        if (!$activeParty) {
            $userCount = 0;
        } else {
            $userCount = self::where(
                function ($query) {
                    $query->where('payed', '=', '1')
                        ->orwhere('special', '=', '1');
                }
            )
                ->where('party_id', '=', $activeParty->id)
                ->count();
        }

        return $userCount;
    }

    /**
     * @return int
     */
    public static function insideCount(): int
    {
        $activeParty = Party::getActive();
        if (!$activeParty) {
            $userCount = 0;
        } else {
            $userCount = self::where('inside', '=', '1')->where('party_id', '=', $activeParty->id)->count();
        }
        return $userCount;
    }

    /**
     * returns null if user has not payed and isn't inside
     * returns 1 if user has payed but not inside
     * returns 2 if user has pasyed and is inside
     *
     * @param $userId
     * @param $partyId
     * @return null|int
     */
    public function status()
    {
        $user= $this;
        if ($user == null || ($user->payed === 0 && $user->special === 0 && $user->inside === 0)) {
            return ['code'=>0,'msg'=>'Wie is dit?'];
//          return null;
        }
        if (($user->payed === 1 || $user->special === 1) && $user->inside === 0) {
            return ['code'=>1,'msg'=>'Student heeft betaald'];
//            return 1;
        }
        if (($user->payed === 1 || $user->special === 1) && $user->inside === 1) {
            return ['code'=>2,'msg'=>'Student heeft betaald en is binnen'];
//          return 2;
        }
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->status();
    }

    public function hasUser()
    {
        return $this->belongsTo('App\User');
    }
}
