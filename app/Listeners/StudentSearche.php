<?php

namespace App\Listeners;

use App\Log;
use App\Events\StudentSearched;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentSearche
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
     * @param  StudentSearched $event
     * @return void
     */
    public function handle(StudentSearched $event)
    {
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->category = 'search';
        $log->info =Auth::user()->email. ' searched at'. \Carbon\Carbon::now() . '  for user: '. $event->student->stamnr ;
        $log->var = $event->student->stamnr ;
        $log->save();
    }
}
