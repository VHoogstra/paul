<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class registration extends Model
{
    public static function get_user_row($id, $userId)
    {
        return  DB::select('select * from registrations where party_id = ? AND user_id = ?', [$userId,$id]);
       // return registration::select('*')->where('user_id', $userId)->where('party', $id)->get();

    }
}
