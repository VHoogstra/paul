<?php

namespace App\Http\Controllers;

use App\party;
use App\student;
use App\settings;
use Carbon\Carbon;
use App\registration;
use Illuminate\Http\Request;
use App\Events\studentSearched;
use Illuminate\Support\Facades\Storage;


class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $activeParty = party::getActive();
        $students = student::all();
        return view('registration.index', compact('activeParty', 'students'));
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
     * @param  \App\registration $registration
     * @return \Illuminate\Http\Response
     */
    public function show(registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activeParty = party::getActive();
        if (!$activeParty) {
            $payed = false;
            $payedCount = false;

        } else {
            $payed = registration::where('user_id', '=', $id)->where('party_id', '=', $activeParty->id)->get();
            $payedCount = registration::where('user_id', '=', $id)->where('party_id', '=', $activeParty->id)->count();
        }

        $student = student::find($id);
        $birthDate = Carbon::parse($student->birth_date);
        $age = Carbon::createFromDate($birthDate->year, $birthDate->month, $birthDate->day)->age;
        $year = settings::getPhotoYear();
        $contents = Storage::url('images/' . $year . '/' . $student->stamnr . '.jpg');
        event(new studentSearched($student));
        return view('registration.edit', compact('student', 'age', 'payed', 'payedCount', 'contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\registration $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\registration $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(registration $registration)
    {
        //
    }

    /**
     * @param $id
     */
    public function payed($id)
    {
        $currentParty = party::getActive();
        $registration = registration::get_user_row($currentParty->id, $id);
        if (empty($registration)) {
            $registration = new registration();
            $registration->user_id = $id;
            $registration->party_id = $currentParty->id;
            $registration->payed = 1;
            $registration->save();
        } else {
            $registration = registration::find($registration[0]->id);
            $registration->payed = 1;
            $registration->save();
        }
        return back()->with('error', "success!");
    }

    public function inside($id)
    {
        $currentParty = party::getActive();
        $registration = registration::get_user_row($currentParty->id, $id);
        if (empty($registration)) {
            return back()->with('error', "not payed!");
        } else {
            if ($registration[0]->payed || $registration[0]->special) {
                $registration = registration::find($registration[0]->id);
                $registration->inside = 1;
                $registration->save();
            } else {
                return back()->with('error', "not payed!");
            }
        }
        return back()->with('error', "success!");;
    }

    public function special($id)
    {
        $currentParty = party::getActive();
        $registration = registration::get_user_row($currentParty->id, $id);
        if (empty($registration)) {
            $registration = new registration();
            $registration->user_id = $id;
            $registration->party_id = $currentParty->id;
            $registration->special = 1;
            $registration->save();
        } else {
            $registration = registration::find($registration[0]->id);
            $registration->special = 1;
            $registration->save();
        }
        return back()->with('error', "success!");
    }
    public function payedAndInside($id)
    {
        $currentParty = party::getActive();
        $registration = registration::get_user_row($currentParty->id, $id);
        if (empty($registration)) {
            $registration = new registration();
            $registration->user_id = $id;
            $registration->party_id = $currentParty->id;
            $registration->payed = 1;
            $registration->inside = 1;
            $registration->save();
        } else {
            $registration = registration::find($registration[0]->id);
            $registration->payed = 1;
            $registration->inside = 1;
            $registration->save();
        }
        return back()->with('error', "success!");
    }

    public function reset($id)
    {
        $currentParty = party::getActive();
        $registration = registration::get_user_row($currentParty->id, $id);
        if (empty($registration)) {
            return back()->with('error', "nothing to reset");
        } else {
            $registration = registration::find($registration[0]->id);
            $registration->payed = 0;
            $registration->inside = 0;
            $registration->special = 0;
            $registration->save();
        }
        return back()->with('error', "success!");;
    }
}
