<?php

namespace App\Http\Controllers;

use App\party;
use App\registration;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function payedninside()
    {
        $location = 'Betaald en Binnen';
        $activeParty = party::getActive();
        $students = registration::payedNinsde($activeParty->id);
        return view('home',compact('students','location','activeParty'));
    }

    public function inside()
    {
        $location = 'Binnen';
        $activeParty = party::getActive();
        $students = registration::insideUsers($activeParty->id);
        return view('home',compact('students','location','activeParty'));
    }

    public function payed()
    {
        $location = 'Betaald';
        $activeParty = party::getActive();
        $students = registration::payedUsers($activeParty->id);
        return view('home',compact('students','location','activeParty'));
    }
}
