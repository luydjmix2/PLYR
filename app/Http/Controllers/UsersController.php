<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersCreateRequest;
use App\Models\company;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller {

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id) {
        $group = Proyect::where('id', $id_group)->get()->toArray();
//        dd($group);
        $user = User::where('id', $id)->get()->toArray();
        $comanyGetName = company::where('company_name', $user[0]['company'])->get()->toArray();
        $comanyId = $comanyGetName[0]['id'];
        $company = company::get()->toArray();
//        dd($company);
        foreach ($company as $key => $value) {
            $companys[$value['id']] = $value['company_name'];
        }
        return view('admin.users.edit', compact('user', 'group', 'companys', 'comanyId'));
    }

    public function create() {

        return view('admin.users.create');
    }

    public function store(UsersCreateRequest $request) {
        $user = User::where('email', $request['email'])->get()->count();

        if ($user < '1') {
            $querryUser = User::create([
                        'name' => $request['first_name'] . ' ' . $request['last_name'],
                        'first_name' => $request['first_name'],
                        'last_name' => $request['last_name'],
                        'company' => $request['company'],
                        'profile' => $request['profile'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
            ]);
            $user = User::where('email', $request['email'])->first();
            company::create([
                'user_id' => $user->id,
                'company_name' => $request['company'],
            ]);
        }
        return redirect()->route('users.index');
    }

}
