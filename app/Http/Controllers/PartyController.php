<?php

namespace App\Http\Controllers;

use App\Party;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PartyController extends Controller
{
    /**
     * Display all parties
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partyActive = Party::getActive();
        $partys = Party::all()->where('archive', 0);
        return view('party.index', compact('partyActive', 'partys'));
    }

    /**
     * Display all parties that are archived
     *
     * @return \Illuminate\Http\Response
     */
    public function indexArchive()
    {
        $partyActive = Party::getActive();
        $partys = Party::all()->where('archive', 1);
        return view('party.archive', compact('partyActive', 'partys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $today = date('Y-m-d\TH:i');
        return view('party.create', compact('today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $party = new Party;
        $party->name = $request->name;
        $party->price = $request->price;
        $party->price_preSale = $request->price_presale;
        $party->price_special = $request->price_speciale;
        $party->preSale_start = $request->presale_start;
        $party->start_date = $request->start_date;
        $party->stop_date = $request->stop_date;
        $party->save();
        return redirect::route('party.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Party $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        //
        //todo show a single party on page, fixed this with edit page?
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Party $party
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $party = Party::find($id);
        $startsale = new DateTime($party->presale_start);
        $startsale = $startsale->format('Y-m-d') . 'T' . $startsale->format('h:i');
        $startDate = new DateTime($party->start_date);
        $start = $startDate->format('Y-m-d') . 'T' . $startDate->format('h:i');

        $stop = new DateTime($party->stop_date);
        $stop = $stop->format('Y-m-d') . 'T' . $stop->format('h:i');


        return view('party.edit', compact('party', 'startsale', 'start', 'stop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Party $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $party)
    {
        $party = Party::find($party);
        $party->name = $request->name;
        $party->price = $request->price;
        $party->price_preSale = $request->price_presale;
        $party->price_special = $request->price_speciale;
        $party->preSale_start = $request->presale_start;
        $party->start_date = $request->start_date;
        $party->stop_date = $request->stop_date;
        $party->save();
        return redirect::route('party.index');
    }

    /**
     * remove a party
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Party::destroy($id);
        return redirect::route('party.index');
    }

    /**
     * set party to active and all other parties to not active
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active($id)
    {
        //todo move this to model
        $oldActive = DB::table('parties')
            ->where('active', 1)
            ->update(['active' => 0]);
        $party = Party::find($id);
        $party->active = 1;
        $party->save();
        return redirect::route('party.index');
    }

    /**
     * archive a party and remove active
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function archive($id)
    {
        $party = Party::find($id);
        $party->archive = 1;
        $party->active = 0;
        $party->save();
        return redirect::route('party.index');
    }

    /**
     * dearchive party
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dearchive($id)
    {
        $party = Party::find($id);
        $party->archive = 0;
        $party->save();
        return redirect::route('party.indexArchive');
    }
}
