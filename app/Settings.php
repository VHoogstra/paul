<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    /**
     * @return Model|\Illuminate\Database\Query\Builder|mixed|null|object
     */
    public static function getPhotoYear()
    {
        $year = DB::table('settings')->select('value')->where('name', '=', 'photoYear')->first();
        if (!$year) {
            $value = $year;
        } else {
            $value = $year->value;
        }
        return $value;
    }

    /**
     * @param $year
     */
    public static function updateYear($year): void
    {
        DB::table('settings')->where('name', '=', 'photoYear')->update(['value' => $year]);
    }
}
