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
     * Show all people payed and inside
     *
     * @return \Illuminate\Http\Response
     */
    public function payedninside()
    {
        $location = 'Betaald en Binnen';
        $activeParty = Party::getActive();
        $students = Registration::payedAndNotInside($activeParty->id);
        return view('home', compact('students', 'location', 'activeParty'));
    }

    /**
     * show all people that are inside
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function inside()
    {
        $location = 'Binnen';
        $activeParty = Party::getActive();
        $students = Registration::insideUsers($activeParty->id);
        return view('home', compact('students', 'location', 'activeParty'));
    }

    /**
     * show all people that have payed
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payed()
    {
        $location = 'Betaald';
        $activeParty = Party::getActive();
        $students = Registration::payedUsers($activeParty->id);
        return view('home', compact('students', 'location', 'activeParty'));
    }
}
