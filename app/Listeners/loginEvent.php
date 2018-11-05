<?php

namespace App\Listeners;

use App\log;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class loginEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $log = new log();
        $log->user_id = $event->user->id;
        $log->category = 'logon';
        $log->info = $event->user->email. ' logged in at '. \Carbon\Carbon::now() . ' from: '.app('request')->ip() ;
        $log->var = app('request')->ip() ;
        $log->save();
    }
}
