<?php

namespace App\Http\Controllers;

use App\Party;
use App\Student;
use App\Settings;
use Carbon\Carbon;
use App\Registration;
use Illuminate\Http\Request;
use App\Events\StudentSearched;
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

        $activeParty = Party::getActive();
        $students = Student::all();
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
     * @param  \App\Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activeParty = Party::getActive();
        if (!$activeParty) {
            $payed = false;
            $payedCount = false;
        } else {
            $payed = Registration::where('user_id', '=', $id)->where('party_id', '=', $activeParty->id)->first();
            $payedCount = Registration::where('user_id', '=', $id)->where('party_id', '=', $activeParty->id)->count();
        }

        $student = Student::find($id);
        $birthDate = Carbon::parse($student->birth_date);
        $age = Carbon::createFromDate($birthDate->year, $birthDate->month, $birthDate->day)->age;
        $year = Settings::getPhotoYear();
        $contents = Storage::url('images/' . $year . '/' . $student->stamnr . '.jpg');
        event(new StudentSearched($student));
        $payedStatus = true;
        $insideStatus = false;
        if ($payedCount == 0) {
            $payedStatus = true;
            $insideStatus = false;
        } else {
            if (($payed->special == 1 || $payed->payed == 1) && $payed->inside == 0) {
                $insideStatus = true;
            }
            if ($payedCount == 1 && ($payed->specal == 1 || $payed->payed == 1)) {
                $payedStatus = false;
            }
        }
        return view('registration.edit', compact('student', 'age', 'payed', 'payedCount', 'contents', 'insideStatus', 'payedStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Registration        $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }

    /**
     * @param $id
     */
    public function payed($id)
    {
        $currentParty = Party::getActive();
        $registration = Registration::getUserRow($currentParty->id, $id);
        if (empty($registration)) {
            $registration = new Registration();
            $registration->user_id = $id;
            $registration->party_id = $currentParty->id;
            $registration->payed = 1;
            $registration->save();
        } else {
            $registration = Registration::find($registration[0]->id);
            $registration->payed = 1;
            $registration->save();
        }
        return back()->with('error', 'success!');
    }

    public function inside($id)
    {
        $currentParty = Party::getActive();
        $registration = Registration::getUserRow($currentParty->id, $id);
        if (empty($registration)) {
            return back()->with('error', 'not payed!');
        } else {
            if ($registration[0]->payed || $registration[0]->special) {
                $registration = Registration::find($registration[0]->id);
                $registration->inside = 1;
                $registration->save();
            } else {
                return back()->with('error', 'not payed!');
            }
        }
        return back()->with('error', 'success!');
        ;
    }

    public function special($id)
    {
        $currentParty = Party::getActive();
        $registration = Registration::getUserRow($currentParty->id, $id);
        if (empty($registration)) {
            $registration = new Registration();
            $registration->user_id = $id;
            $registration->party_id = $currentParty->id;
            $registration->special = 1;
            $registration->save();
        } else {
            $registration = Registration::find($registration[0]->id);
            $registration->special = 1;
            $registration->save();
        }
        return back()->with('error', 'success!');
    }

    public function payedAndInside($id)
    {
        $currentParty = Party::getActive();
        $registration = Registration::getUserRow($currentParty->id, $id);
        if (empty($registration)) {
            $registration = new Registration();
            $registration->user_id = $id;
            $registration->party_id = $currentParty->id;
            $registration->payed = 1;
            $registration->inside = 1;
            $registration->save();
        } else {
            $registration = Registration::find($registration[0]->id);
            $registration->payed = 1;
            $registration->inside = 1;
            $registration->save();
        }
        return back()->with('error', 'success!');
    }

    public function reset($id)
    {
        $currentParty = Party::getActive();
        $registration = Registration::getUserRow($currentParty->id, $id);
        if (empty($registration)) {
            return back()->with('error', 'nothing to reset');
        } else {
            $registration = Registration::find($registration[0]->id);
            $registration->payed = 0;
            $registration->inside = 0;
            $registration->special = 0;
            $registration->save();
        }
        return back()->with('error', 'success!');
        ;
    }
}
