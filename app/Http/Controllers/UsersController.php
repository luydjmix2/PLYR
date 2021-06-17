<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\company;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($user_id) {
        $user = User::where('id', $user_id)->first();
//        dd($user->id);
        return view('admin.users.edit', compact('user'));
    }

    public function create() {

        return view('admin.users.create');
    }

    public function store(UsersCreateRequest $request) {
        $requesUser = User::create([
                    'name' => $request['first_name'] . ' ' . $request['last_name'],
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'profile' => $request['profile'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'estado' => '1',
        ]);
//        dd($requesUser);
        $requesCompany = company::updateOrCreate(['user_id' => $requesUser->id, 'company_name' => $request['company']], [
                    'company_name' => $request['company'],
        ]);
//        dd($requesCompany);
        $requesUpUser = User::updateOrCreate(['id' => $requesUser->id], [
                    'company' => $requesCompany->id,
        ]);
//        dd($requesUpUser);
        return redirect()->route('users.index');
    }

    public function update(UsersUpdateRequest $request) {
        $requesUser = User::updateOrCreate(['id' => $request->user_id], [
                    'name' => $request['first_name'] . ' ' . $request['last_name'],
                    'first_name' => $request['first_name'],
                    'last_name' => $request['last_name'],
                    'profile' => $request['profile'],
                    'email' => $request['email'],
                    'estado' => $request['estado'],
        ]);
        if ($request['password']) {
            User::updateOrCreate(['id' => $request->user_id], [
                'password' => Hash::make($request['password']),
            ]);
        }
//        dd($requesUser);
        $requesCompany = company::updateOrCreate(['id' => $requesUser->company], [
                    'company_name' => $request['company'],
        ]);
//        dd($requesCompany);
        return redirect()->route('users.index');
    }

    public function destroy($id) {
        
    }

    public function status($user_id) {
        $user = User::where('id', $user_id)->first();

        switch ($user->status) {
            case '1':
                User::where('id', $user_id)->update([
                    'status' => '0',
                ]);
                break;
            case '0':
                User::where('id', $user_id)->update([
                    'status' => '1',
                ]);
                break;
        }

        return back();
    }

}
