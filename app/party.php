<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class party extends Model
{

    public static function getArchive()
    {
        $users = DB::table('party')
            ->where('archive', '=', '1')
            ->get();
        return $users;
    }

    public static function getActive()
    {
        $party = party::where('active', 1)->first();
        $partycount = party::where('active', 1)->count();

        if ($partycount == 0) {
            return false;
        } else {
            return $party;
        };
    }

    public static function setActive($id)
    {
        $users = DB::table('party')
            ->where('active', '=', '1')
            ->update(['active' => 0]);

        $users = DB::table('party')
            ->where('id', '=', $id)
            ->update(['active' => 1]);
    }
    public static function setArchive($id, $status)
    {
        $users = DB::table('party')
            ->where('id', '=', $id)
            ->update(['archive' => $status]);
    }
}
