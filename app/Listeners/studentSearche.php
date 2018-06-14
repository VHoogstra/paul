<?php

namespace App\Listeners;

use App\log;
use App\Events\studentSearched;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class studentSearche
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
     * @param  studentSearched  $event
     * @return void
     */
    public function handle(studentSearched $event)
    {
        $log = new log();
        $log->user_id = Auth::user()->id;
        $log->category = 'search';
        $log->info =Auth::user()->email. ' searched at'. \Carbon\Carbon::now() . '  for user: '. $event->student->stamnr ;
        $log->var = $event->student->stamnr ;
        $log->save();
    }
}
