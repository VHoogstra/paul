<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogCategory extends Model
{

    protected $table = 'log_category';

    public static function generate()
    {
        $count = self::all()->count();
        if ($count === 0) {
            $cat = new self();
            $cat->name = 'login';
            $cat->save();

            $cat = new self();
            $cat->name = 'searchOnIndex';
            $cat->save();

            $cat = new self();
            $cat->name = 'showSearchData';
            $cat->save();
        }
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}