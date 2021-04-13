<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProyectCreateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Document;
use App\Models\Proyect;
use App\Models\User;
use App\Models\team;
use Validator;
use Auth;
use App\Helpers\Helper;

class ProyectController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

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
        return redirect()->route('group.view', ['namegroup' => $rulproyect]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug = '') {
        if ($slug == '') {
            $slug = 'demo';
        }
        $proyect_data = Proyect::where('proyect_url', $slug)->get()->toArray();
        $user = User::where('id', $proyect_data[0]['user_id'])->get()->toArray();
        $teamLoop = team::where('id_group', $proyect_data[0]['id'])->get()->toArray();
//        dd($proyect_data[0]['id']);
        $team = Helper::dataTeamGroup($proyect_data[0]['id']);
        $files = Document::where('group_id', $proyect_data[0]['id'])->get()->toArray();
        return view('admin.proyects.views', compact('proyect_data', 'user', 'files', 'team'));
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
        // return $request;
    }

    /**
     * Upfile the specified proyect resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateFile(Request $request) {
//        $path = '/home/mefurthe/public_html/groupsFiles/'.$request->id_group.'/';
        $path = public_path() . '/groupsFiles/' . $request->id_group . '/';
//        dd($request);
        $files = $request->file('file');
//        dd($files);
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $file->move($path, $fileName);
        }
//        dd($fileName);
        $arrayFile = explode(".", $fileName);
        $url_file = '/groupsFiles/' . $request->id_group . '/' . $fileName;
        Document::create([
            'document_name_full' => $fileName,
            'document_name' => $arrayFile[0],
            'document_format' => $arrayFile[1],
            'document_url' => $url_file,
            'group_id' => $request->id_group,
        ]);
        $group_data = Proyect::where('id', $request->id_group)->get()->toArray();
        return redirect()->route('group.view', $group_data[0]['proyect_url']);
    }

    /**
     * Remove the specified file resource from storage.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFile($id) {
        $file = Document::where('id', $id)->get()->toArray();
        $pathNew = '/groupsFilesDestroy/' . $file[0]['group_id'] . '/' . $file[0]['document_name_full'];
        $pathOld = '/groupsFiles/' . $file[0]['group_id'] . '/' . $file[0]['document_name_full'];
        $content = Storage::disk('public_uploads')->get($pathOld);
        Storage::disk('public_destroy')->put($file[0]['group_id'] . '/' . $file[0]['document_name_full'], $content);
        Storage::disk('public_uploads')->delete($pathOld);
        $user = Document::find($id);
        $user->delete();
        return back();
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
