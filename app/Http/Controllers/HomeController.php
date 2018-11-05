<?php

namespace App\Http\Controllers;

use App\Party;
use App\Registration;
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
        $activeParty = Party::getActive();
        $students = Registration::payedNinsde($activeParty->id);
        return view('home', compact('students', 'location', 'activeParty'));
    }

    public function inside()
    {
        $location = 'Binnen';
        $activeParty = Party::getActive();
        $students = Registration::insideUsers($activeParty->id);
        return view('home', compact('students', 'location', 'activeParty'));
    }

    public function payed()
    {
        $location = 'Betaald';
        $activeParty = Party::getActive();
        $students = Registration::payedUsers($activeParty->id);
        return view('home', compact('students', 'location', 'activeParty'));
    }
}
