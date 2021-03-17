<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->appointment = $request->appointment;
        $user->phone = $request->phone;
        $user->movil = $request->movil;
        $user->bloomber_email = $request->bloomber_email;
        $user->signing = $request->signing;
        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::findOrFail($user->id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = User::findOrFail($user->id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->appointment = $request->appointment;
        $user->phone = $request->phone;
        $user->movil = $request->movil;
        $user->bloomber_email = $request->bloomber_email;
        $user->signing = $request->signing;

        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::findOrFail($user);
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
