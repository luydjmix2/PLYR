<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Proyect;
use App\Models\company;
use App\Models\User;
use App\Models\team;
use Illuminate\Support\Facades\Hash;

class GroupUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_group) {

        $company = company::get()->toArray();
//        dd($company);
        foreach ($company as $key => $value) {
            $companys[$value['id']] = $value['company_name'];
        }
//        dd($companys);
        return view('admin.users.create', compact('id_group', 'companys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request) {
        $name = $request->first_name . " " . $request->last_name;
        $company = company::where('id', $request->company)->get()->toArray();
        User::create([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'bloomberg_email' => $request->bloomberg_email,
            'phone' => $request->phone,
            'movil' => $request->movil,
            'firm' => $request->firm,
            'start_date' => $request->start_date,
            'company' => $company[0]['company_name'],
        ]);
        $user = User::where('email', $request->email)->get()->toArray();

        team::create([
            'user_id' => $user[0]['id'],
            'id_group' => $request->id_group,
            'id_company' => $request->company,
        ]);

        $group = Proyect::where('id', $request->id_group)->get()->toArray();
        return redirect()->route('group.view', ['namegroup' => $group[0]['proyect_url']]);
//        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_group, $id) {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request) {
        $name = $request->first_name . " " . $request->last_name;
        $company = company::where('id', $request->company)->get()->toArray();
        User::where('id', $request->id)->update([
            'name' => $name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'bloomberg_email' => $request->bloomberg_email,
            'phone' => $request->phone,
            'movil' => $request->movil,
            'firm' => $request->firm,
            'start_date' => $request->start_date,
            'company' => $company[0]['company_name'],
        ]);

        team::where('user_id', $request->id)->where('id_group', $request->id_group)->update([
            'user_id' => $request->id,
            'id_group' => $request->id_group,
            'id_company' => $request->company,
        ]);
        $group = Proyect::where('id', $request->id_group)->get()->toArray();
        return redirect()->route('group.view', ['namegroup' => $group[0]['proyect_url']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user) {
        $user = User::find($id_user);
        $user->delete();

        return redirect()->back();
    }

}
