<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\UserCompamy;
use App\Models\Register;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helpers;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $dataUserCompany = UserCompamy::where('user_id', $user->id)->first();
//        dd($dataUserCompany);
        $registers = Register::where('company_id',$dataUserCompany->company_id)->get();
//        dd($registers);
        return view("admin.dashboard.dashboard", compact('dataUserCompany', 'registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRegister()
    {
        $user = Auth::user();
        $dataUserCompany = UserCompamy::where('user_id', $user->id)->first();
//        dd($dataUserCompany);
        $registers = Register::where('company_id',$dataUserCompany->company_id)->get();

        return view("admin.dashboard.addRegister", compact('dataUserCompany', 'registers'));
    }

    public function createDocuments()
    {
        $user = Auth::user();
        $dataUserCompany = UserCompamy::where('user_id', $user->id)->first();
//        dd($dataUserCompany);
        $documents = Document::where('company_id',$dataUserCompany->company_id)->get();

        return view("admin.dashboard.addDocument", compact('dataUserCompany', 'documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeRegister(Request $request)
    {

        $validated = $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Position' => 'required',
            'Email' => 'required|unique:registers|email|max:255',
            'Email_Bloomberg' => 'required|email',
            'Mobile' => 'required'
        ]);

        $helper = new Helpers();
        $user = $helper->UserData();

        if(!Register::where('email',$validated['Email'])->exists()){
            Register::Create([
                'first_name'=> $validated['First_Name'],
                'last_name'=> $validated['Last_Name'],
                'position'=> $validated['Position'],
                'email'=> $validated['Email'],
                'phone'=> $validated['Mobile'],
                'movil'=> $validated['Mobile'],
                'bloomberg_email'=> $validated['Email_Bloomberg'],
                'firm'=> $validated['Email_Bloomberg'],
                'company_id'=> $user->company->id,
            ]);
        }else{
            return back()->withErrors('The record already exists check if another user has this same email');
        }
//        dd($request);
        return redirect()->back()->with('success', 'successful record');
    }

    public function storeDocuments(Request $request)
    {
        //
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
    public function editRegister($id)
    {
        //
    }

    public function editDocuments($id)
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
    public function updateRegister(Request $request, $id)
    {
        //
    }

    public function updateDocuments(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroyRegister($id)
    {
        //
    }

    public function destroyDocuments($id)
    {
        //
    }
}
