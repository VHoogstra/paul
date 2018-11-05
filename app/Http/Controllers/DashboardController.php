<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Party;
use App\User;
use App\Registration;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
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

        return view('dashboard.index', compact('activeParty', 'inside', 'payed', 'payedNInside'));
    }
}
