<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    /**
     * @return mixed
     */
    public static function getArchive()
    {
        $users = DB::table('party')
            ->where('archive', '=', '1')
            ->get();
        return $users;
    }

    /**
     * @return array
     */
    public static function getActive()
    {
        $party = self::where('active', 1)->first();
        $partycount = self::where('active', 1)->count();

        if ($partycount === 0) {
            return false;
        }

        return $party;
    }

    /**
     * @param $id
     */
    public static function setActive($id): void
    {
        DB::table('party')
            ->where('active', '=', '1')
            ->update(['active' => 0]);

        DB::table('party')
            ->where('id', '=', $id)
            ->update(['active' => 1]);
    }

    /**
     * @param $id
     * @param $status
     */
    public static function setArchive($id, $status): void
    {
        DB::table('party')
            ->where('id', '=', $id)
            ->update(['archive' => $status]);
    }
}
