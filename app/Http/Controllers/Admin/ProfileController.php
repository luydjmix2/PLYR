<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helper = new Helpers();
        $userCom = $helper->UserData();
        return view("admin.profile.profile", compact("userCom"));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"nullable|email",
            "phone_number"=>"required|numeric",
            "address"=>"required",
            "zip_code"=>"required",
            "city"=>"required",
            "state"=>"required",
            "country"=>"required",
            "password"=>"nullable",
            "confirm_password"=>"nullable|same:password"
        ]);

        User::where('id', $id)
            ->update([
                'first_name' => $validated["first_name"],
                'last_name' => $validated["last_name"],
                'phone_number' => $validated["phone_number"],
                'address' => $validated["address"],
                'zip_code' => $validated["zip_code"],
                'city' => $validated["city"],
                'state' => $validated["state"],
                'country' => $validated["country"],
            ]);
//        dd($id, $request);
        if ($validated["password"]) {
            $user = User::where('id', $id)
                ->update(['password' => Hash::make($validated["password"])]);
        }
        return redirect()->back()->with('success', 'successful record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
