<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProyectCreateRequest;
use App\Models\Document;
use App\Models\Proyect;
use app\Models\User;
use Validator;
use Auth;

class ProyectController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $proyects = Proyect::all();

        return view('admin.proyects.index', compact('proyects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $user_id = Auth::id();
        return view('admin.proyects.create', compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectCreateRequest $request) {
        $rulproyect = preg_replace('([^A-Za-z0-9 ])', '', str_replace(' ', '_', $request->proyect_name));
//        dd(Auth::id());
        Proyect::create([
            'proyect_name' => $request->proyect_name,
            'proyect_description' => $request->proyect_description,
            'proyect_start' => $request->proyect_start,
            'proyect_end' => $request->proyect_end,
            'proyect_url' => $rulproyect,
            'proyect_shared' => '1',
            'user_id' => Auth::id(),
//            'user_id' => $request->user_id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug = '') {
        if ($slug=='') {
            $slug = 'demo';
        }
        $proyect_data = Proyect::where('proyect_url', $slug)->get()->toArray();
        return view('admin.proyects.views', compact('proyect_data'));
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
    public function update(Request $request, $id) {
        //
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
