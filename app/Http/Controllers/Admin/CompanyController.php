<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use App\Models\UserCompamy;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helper = new Helpers();
        $user = $helper->UserData();
        return view("admin.company.company", compact("user"));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = (object)$request->validate([
            "name_user" => "required",
            "name_company" => "required|unique:companies,company_name",
            "email_user" => "required|email:filter|unique:users,email",
        ]);

        $hashed_random_password = Hash::make(Str::random(8));

        $role = Role::where('id', "5")->firstOrFail();

        $user = User::create([
            "name"=>$validate->name_user,
            "email"=>$validate->email_user,
            "password"=>$hashed_random_password,
            'role_id' => $role->id,
        ]);

        $user->roles()->attach("7");

        $company =Company::create([
            "company_name"=>$validate->name_company,
        ]);

        UserCompamy::create([
            "user_id"=>$user->id,
            "company_id"=>$company->id,
        ]);

        return redirect()->route('counterparties');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'company_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'address_1' => 'required',
            'address_2' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'website' => 'nullable',
            'password' => 'nullable',
            'logo' => 'nullable|dimensions:min_width=100,min_height=100,max_width=900,max_height=900,ratio=2/2',
        ]);
//        dd($request);
        $helper = new Helpers();
        $user = $helper->UserData();
        $company = Company::where('id', $user->company_id)->first();
        $newPath = $company->company_url_logo;
        if ($request->file('logo')) {
            $files = $request->file('logo');
//        dd($files);
//        $user->company_id = "2";
            $path = 'company/' . $user->company_id . '/logo/';

            $fileName = $files->getClientOriginalName();
            $fileName = $helper->eliminarEspacios($helper->eliminarAcentos($fileName));
//        dd($fileName);
            $arrayFile = explode(".", $fileName);
            $fileName = $user->company->company_name . "Logo" . $user->company_id . '.' . $arrayFile[1];
//        dd($fileName);
            $url_file = $path . $fileName;
            $newPath = Storage::disk('public')->putFileAs($path, $files, $fileName);
            $newPath = str_replace('//', '/', $newPath);
//        dd($newPath);
        }
        Company::where('id', $user->company_id)->
        update([
            'company_name' => $validated["company_name"],
            'company_email' => $validated["email"],
            'company_number' => $validated["phone_number"],
            'company_address' => $validated["address_1"],
            'company_address_two' => $validated["address_2"],
            'company_code' => $validated["zip_code"],
            'company_country' => $validated["country"],
            'company_state' => $validated["state"],
            'company_city' => $validated["city"],
            'company_web' => $validated["website"],
            'company_url_logo' => $newPath,
        ]);
        if ($validated["password"]) {
            $user = User::where('id', $user->user_id)
                ->update(['password' => Hash::make($validated["password"])]);
        }
        return redirect()->back();
    }

//    public function updateLogo(Request $request, $id)
//    {
//        return $id;
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
