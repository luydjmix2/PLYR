<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyects = Proyect::all();

        return view('admin.proyects.index', compact('proyects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proyects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyect = new Proyect();
        $proyect->proyect_name = $request->proyect_name;
        $proyect->proyect_description = $request->proyect_description;
        $proyect->proyect_start = $request->proyect_start;
        $proyect->proyect_end = $request->proyect_end;
        $proyect->c = $request->c;
        $proyect->r = $request->r;
        $proyect->u = $request->u;
        $proyect->d = $request->d;
        $proyect->s = $request->s;
        $proyect->userI = $request->userI;
        $proyect->save();

        return redirect()->route('admin.proyects.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Proyect $proyect)
    {
        $proyect = Proyect::findOrFail($proyect->id);

        return view('admin.proyects.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyect $proyect)
    {
        $proyect = Proyect::findOrFail($proyect->id);

        return view('admin.proyects.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyect $proyect)
    {
        $proyect = Proyect::findOrFail($proyect);
        $proyect->proyect_name = $request->proyect_name;
        $proyect->proyect_description = $request->proyect_description;
        $proyect->proyect_start = $request->proyect_start;
        $proyect->proyect_end = $request->proyect_end;
        $proyect->c = $request->c;
        $proyect->r = $request->r;
        $proyect->u = $request->u;
        $proyect->d = $request->d;
        $proyect->s = $request->s;
        $proyect->userI = $request->userI;

        $proyect->save();

        return redirect()->route('admin.proyects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyect $proyect)
    {
        $proyect = Proyect::findOrFail($proyect);
        $proyect->delete();

        return redirect()->route('admin.proyects.index');
    }
}