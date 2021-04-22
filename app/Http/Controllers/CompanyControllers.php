<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use App\Models\User;
use Auth;
use App\Http\Requests\CompanyUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Helpers\Helper;

class CompanyControllers extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name) {
        $idUser = Auth::id();
//        dd($idUser);
        $company = company::where('company_name', $name)->where('user_id', $idUser)->get()->toArray();
//        dd($name);
//        dd($company);
        if (!empty($company[0]['id'])) {
            return view('admin.company.index', compact("company"));
        } else {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, $id) {
        if ($request->hasFile('company_logo')) {
            $path = '/avatar/';
            $files = $request->file('company_logo');
            $respon = Helper::upStorageFile($files, $id, $path);
        } else {
            if ($request->company_url_logo != '') {
                $url_file = explode("/", $request->company_url_logo);
                $arrayNameFile = explode(".", $url_file[(sizeof($url_file) - 1)]);
                $respon = array(
                    "name_full" => $url_file[(sizeof($url_file) - 1)],
                    "name" => $arrayNameFile[0],
                    "format" => $arrayNameFile[1],
                    "url_file" => $request->company_url_logo
                );
            } else {
                $respon = array(
                    "name_full" => "",
                    "name" => "",
                    "format" => "",
                    "url_file" => ""
                );
            }
        }

        company::where('id', $request->id)->update([
            'company_name' => $request->company_name,
            'company_bio' => $request->company_bio,
            'company_address' => $request->company_address,
            'company_phone' => $request->company_phone,
            'company_web' => $request->company_web,
            'company_url_logo' => $respon['url_file'],
            'company_code' => $request->company_code,
            'company_nid' => $request->company_nid,
            'company_politics' => $request->company_politics,
            'user_id' => $request->user_id,
        ]);

        User::where('id', $request->user_id)->update([
            'company' => $request->company_name,
        ]);

        return redirect()->route('company.index', $request->company_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
