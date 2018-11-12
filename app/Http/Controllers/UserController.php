<?php

namespace App\Http\Controllers;

use App\user;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRoles = UserRole::all();
        $users = user::all();
        return view('user.index', compact('users', 'userRoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $users = user::roleId($id);
        $roles = UserRole::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);

        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();


        return redirect(route('user.index'));
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
        $users = user::roleId($id);
        $roles = UserRole::all();
        return view('user.edit', compact('users', 'roles'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {

        if ($id == 0) {
            user::whereIn('id', $request->users)->update(['role' => $request->role]);
            return Response::json('true', 200);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required',
        ]);
        $user = user::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        user::whereIn('id', $request->users)->delete();
        return Response::json('true', 200);
    }
}
