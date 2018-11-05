<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\party;
use App\User;
use App\registration;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeParty = party::getActive();
        $role = User::hasRole('user');
        if ($activeParty==false) {
            $inside= 0;
            $payed= 0;
            $payedNInside= 0;
        } else {
            $inside = registration::where('inside', '=', '1')->where('party_id', '=', $activeParty->id)->count();

            $payed = registration::where(
                function ($query) {
                    $query->where('payed', '=', '1')
                        ->orwhere('special', '=', '1');
                }
            )
                ->where('party_id', '=', $activeParty->id)
                ->count();

            $payedNInside = registration::where(
                function ($query) {
                    $query->where('payed', '=', '1')
                        ->orwhere('special', '=', '1');
                }
            )
                ->where('inside', '=', '0')
                ->where('party_id', '=', $activeParty->id)
                ->count();
        }

        return view('dashboard.index', compact('activeParty', 'inside', 'payed', 'payedNInside'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
