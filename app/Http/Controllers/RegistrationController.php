<?php

namespace App\Http\Controllers;

use App\party;
use App\student;
use App\settings;
use Carbon\Carbon;
use App\registration;
use Illuminate\Http\Request;
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
        return view('registration.index',compact('activeParty','students'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\registration  $registration
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
    public function edit( $id)
    {
        $activeParty = party::getActive();
        if( !$activeParty){
            $payed = false;
            $payedCount = false;

        }else{
            $payed = aanmeldingen::where('user_id','=',$id)->where('party_id','=',$activeParty->id)->get();
            $payedCount = aanmeldingen::where('user_id','=',$id)->where('party_id','=',$activeParty->id)->count();
        }

        $student = student::find($id);
        $birthDate = Carbon::parse($student->birth_date);
        $age = Carbon::createFromDate($birthDate->year, $birthDate->month, $birthDate->day)->age;
        $year = settings::getPhotoYear();
        $contents = Storage::url('images/'.$year.'/'.$student->stamnr.'.jpg');
        return view('registration.edit',compact('student','age','payed','payedCount','contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(registration $registration)
    {
        //
    }
}
