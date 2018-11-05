<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    public static function getPhotoYear()
    {
        $year = DB::table('settings')->select("value")->where("name", "=", "photoYear")->first();
        if (!$year) {
            $value = $year;
        } else {
            $value = $year->value;
        }
        return $value;
    }

    public static function updateYear($year)
    {
        DB::table('settings')->where("name", "=", "photoYear")->update(["value" => $year]);
    }
}
