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
//todo can be removed?
}
