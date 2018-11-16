<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Party;
use App\User;
use App\Registration;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the front page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inside = $payed = $payedNInside = 0;
        $activeParty = Party::getActive();
        if ($activeParty !== true) {
            $inside = Registration::insideCount();
            $payed = Registration::payedCount();
            $payedNInside = Registration::payedNotInsideCount();
        }

//        dd(Auth::user()->userRole);
        return view('dashboard.index', compact('activeParty', 'inside', 'payed', 'payedNInside'));
    }

    /**
     * Display the list of users depending on status
     *
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        $activeParty = Party::getActive();
        switch ($status) {
            case 'payed':
                $location = 'Betaald';
                $students = Registration::payedUsers($activeParty->id);
                break;
            case 'inside':
                $location = 'Binnen';
                $students = Registration::insideUsers($activeParty->id);
                break;
            case 'payedAndNotInside':
                $location = 'Betaald en niet binnen';
                $students = Registration::payedAndNotInside($activeParty->id);
                break;
        }
        return view('dashboard.list', compact('students', 'location', 'activeParty'));
    }
}
