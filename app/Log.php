<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    public static function fixTable()
    {
        $logs = self::where('log_category_id', 0)->get();
        $logCount = self::where('log_category_id', 0)->count();
        $amount = 50;
        if ($logCount < 50) {
            $amount = $logCount;
        }
        for ($i = 0; $i < $amount; $i++) {
            $log = $logs[$i];
            if ($log->category == 'logon') {
                $category = LogCategory::where('name', 'login')->first();
            }
            if ($log->category == 'searchSite') {
                $category = LogCategory::where('name', 'searchOnIndex')->first();
            }
            if ($log->category == 'search') {
                $category = LogCategory::where('name', 'showSearchData')->first();
            }
            $log->logCategory()->associate($category);
            $log->save();
        }
        return self::where('log_category_id', 0)->count();
    }

    public function logCategory()
    {
        return $this->belongsTo(LogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
