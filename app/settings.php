<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    static public function getPhotoYear()
    {
        $year = DB::table('settings')->select("value")->where("name", "=", "photoYear")->first();
        if (!$year) {
            $value = $year;
        } else {
            $value = $year->value;
        }
        return $value;
    }

    static public function updateYear($year)
    {
        DB::table('settings')->where("name", "=", "photoYear")->update(["value" => $year]);
    }
}
