<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = new Document();
        $document->proyect_Id = $request->proyect_Id;
        $document->group_Id = $request->group_Id;
        $document->groupCustom_Id = $request->groupCustom_Id;
        $document->name = $request->name;
        $document->formato = $request->formato;
        $document->url = $request->url;
        $document->delit = $request->delit;
        $document->save();

        return redirect()->route('admin.documents.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $document = Document::findOrFail($document->id);

        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $document = Document::findOrFail($document->id);

        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $document = Document::findOrFail($document);
        $document->proyect_Id = $request->proyect_Id;
        $document->group_Id = $request->group_Id;
        $document->groupCustom_Id = $request->groupCustom_Id;
        $document->name = $request->name;
        $document->formato = $request->formato;
        $document->url = $request->url;
        $document->delit = $request->delit;
        $document->save();

        return redirect()->route('admin.documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document = Document::findOrFail($document->id);
        $document->delete();

        return redirect()->route('admin.documents.index');
    }
}