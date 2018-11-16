<?php

namespace App\Listeners;


use App\Events\StudentSiteSearch;
use App\Log;
use Illuminate\Support\Facades\Auth;

class StudentSiteSearchListener
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
    public function handle(StudentSiteSearch $event)
    {
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->category = 'searchSite';
        $log->info = Auth::user()->email . ' searched at' . \Carbon\Carbon::now();
        $log->var = $event->searchedString;
        $log->save();
    }
}
