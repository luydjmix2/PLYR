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
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Storage;

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
        $registers = Register::where('company_id', $dataUserCompany->company_id)->get();
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
        $registers = Register::where('company_id', $dataUserCompany->company_id)->get();

        return view("admin.dashboard.addRegister", compact('dataUserCompany', 'registers'));
    }

    public function createDocuments()
    {
        $user = Auth::user();
        $dataUserCompany = UserCompamy::where('user_id', $user->id)->first();
//        dd($dataUserCompany);
        $documents = Document::where('company_id', $dataUserCompany->company_id)->get();

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

        if (!Register::where('email', $validated['Email'])->exists()) {
            Register::Create([
                'first_name' => $validated['First_Name'],
                'last_name' => $validated['Last_Name'],
                'position' => $validated['Position'],
                'email' => $validated['Email'],
                'phone' => $validated['Mobile'],
                'movil' => $validated['Mobile'],
                'bloomberg_email' => $validated['Email_Bloomberg'],
                'firm' => $validated['Email_Bloomberg'],
                'company_id' => $user->company->id,
            ]);
        } else {
            return back()->withErrors('The record already exists check if another user has this same email');
        }
//        dd($request);
        return redirect()->back()->with('success', 'successful record');
    }

    public function storeDocuments(Request $request)
    {

//        dd($request);
        $files = $request->file('file');
//        dd($files);
        $helper = new Helpers();
        $user = $helper->UserData();
//        $user->company_id = "2";
        $path = 'company/' . $user->company_id . '/';

        $fileName = $files[0]->getClientOriginalName();
        $fileName = $helper->eliminarEspacios($helper->eliminarAcentos($fileName));
//        dd($fileName);
        $arrayFile = explode(".", $fileName);
        $url_file = $path . $fileName;
        $newPath = Storage::disk('public')->putFileAs($path, $files[0], $fileName);
        $newPath = str_replace('//','/',$newPath);
//        dd($newPath);
        if(!Document::where(['document_name_full' => $fileName,'company_id' => $user->company_id])->exists()) {
            Document::create([
                'document_name_full' => $fileName,
                'document_name' => $arrayFile[0],
                'document_format' => $arrayFile[1],
                'document_url' => $newPath,
                'origin' => 'file-documents',
                'company_id' => $user->company_id,
            ]);
        }else{
            return response()->json(['code'=>401, 'message'=>"The file exist."]);
        }

        return response()->json(['code'=>200, 'message'=>"Ok upload."]);
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
        $helper = new Helpers();
        $user = $helper->UserData();
//        dd($user);
        $registers = Register::where('company_id', $user->company_id)->get();

        $register = Register::where('id', $id)->first();
//        dd($register);
        return view("admin.dashboard.editRegister", compact("registers", "register"));
    }

    public function editDocuments($id)
    {

        return $id;
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
        $validated = $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Position' => 'required',
            'Email' => 'required|unique:registers,email,' . $id . '|email|max:255',
            'Email_Bloomberg' => 'required|email',
            'Mobile' => 'required'
        ]);

        $helper = new Helpers();
        $user = $helper->UserData();

        try {
            $result = Register::where(['id' => $id])->Update([
                'first_name' => $validated['First_Name'],
                'last_name' => $validated['Last_Name'],
                'position' => $validated['Position'],
                'email' => $validated['Email'],
                'phone' => $validated['Mobile'],
                'movil' => $validated['Mobile'],
                'bloomberg_email' => $validated['Email_Bloomberg'],
                'firm' => $validated['Email_Bloomberg'],
                'company_id' => $user->company->id,
            ]);
        } catch (Exception $error) {
            return back()->withErrors('An error occurred while storing the information, check your internet connection and try again');
        }

        return redirect()->back()->with('success', 'successful update');
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
        $register = Register::find($id);
        if ($register->delete()) {
            return back()->withErrors('An error occurred while processing the information, check your internet connection and try again');
        }
        return redirect()->back()->with('success', 'successfully removed');
    }

    public function destroyDocuments($id)
    {
        //
    }
}
