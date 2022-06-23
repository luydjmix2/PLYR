<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Group;
use App\Models\Register;
use App\Models\Groupbyregisteranddocument;
use Illuminate\Http\Request;

class MyGroupController extends Controller
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
        $groups = Group::where('usercompany_id', $user->id)->get();
//        dd($groups);
        return view("admin.mygroups.mygroups", compact("groups"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $helper = new Helpers();
        $user = $helper->UserData();
        $registers = Register::where('company_id', $user->company->id)->get();
//        dd($registers);
        $documents = Document::where('company_id', $user->company->id)->get();

        return view("admin.mygroups.addMyGroup", compact('registers', 'documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->{"check-register-group"}[2]);
        $validated = $request->validate([
            'group_name' => 'required',
            'description' => 'required',
        ]);
        $helper = new Helpers();
        $user = $helper->UserData();
//        dd($user);
        $exist = Group::where('name', $validated['group_name'])->where('usercompany_id', $user->id)->count();
//        dd($exist);
        if ($exist === 0) {
            $group = Group::create([
                'name' => $validated['group_name'],
                'description' => $validated['description'],
                'usercompany_id' => $user->company->id,
                'status' => '1'
            ]);
        } else {
            return back()->withErrors('the group already exists please check and try again');
        }
//        dd($request);
        if (isset($request->{"check-register-group"}) || isset($request->{"check-document-group"})) {

            if (!empty($request->{"check-register-group"})) {
//                dd($request->{"check-register-group"});
                foreach ($request->{"check-register-group"} as $valReg) {
                    $existReg = Groupbyregisteranddocument::where('register_id', $valReg)->where('group_id', $group->id)->count();
                    if ($existReg === 0) {
                        Groupbyregisteranddocument::create([
                            "group_id" => $group->id,
                            "register_id" => $valReg,
                            "status" => "1"
                        ]);
                    }
                }

            }

            if (!empty($request->{"check-document-group"})) {
//                dd($request->{"check-document-group"});
                foreach ($request->{"check-document-group"} as $valDoc) {
//                    dd($valDoc);
                    $existReg = Groupbyregisteranddocument::where('document_id', $valDoc)->where('group_id', $group->id)->count();
                    if ($existReg === 0) {
                        Groupbyregisteranddocument::create([
                            "group_id" => $group->id,
                            "document_id" => $valDoc,
                            "status" => "1"
                        ]);
                    }
                }
            }
        }
        return redirect()->back()->with('success', 'successful record');
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
//        dd($id);
        $helper = new Helpers();
        $user = $helper->UserData();
        $regis = Register::where('company_id', $user->company->id)->get();
//        dd($regis);
        $docum = Document::where('company_id', $user->company->id)->get();

        $countRecorsG = Groupbyregisteranddocument::where("group_id", $id)->count();
//        dd($countRecorsG);
        if ($countRecorsG > 0) {
            $grouRecors = Groupbyregisteranddocument::where("group_id", $id)->get();
//        dd($grouRecors[0]->register->id);
            $gRecors = [];
            foreach ($grouRecors as $valuesGR) {

                if ($valuesGR->group_id) {
//                    dd($valuesGR);
                    $gRecors["group"] = $valuesGR->group;
                }

                if ($valuesGR->register_id) {
//                dd($valuesGR);
                    $gRecors["register"][] = $valuesGR->register;
                }
                if ($valuesGR->document_id) {
//                dd($valuesGR);
                    $gRecors["document"][] = $valuesGR->document;
                }
            }
            $registers = [];
            if (!empty($gRecors["register"]) && isset($gRecors["register"])) {
                foreach ($regis as $valuReg) {
                    $collection = collect($gRecors["register"]);
//            dd($collection->contains('id', $valuReg->id), $valuReg->id, $gRecors["register"]);
                    $active = 0;
                    if ($collection->contains('id', $valuReg->id))
                        $active = 1;
                    $registers[] = $valuReg->setAttribute('check', $active);
                }
            } else {
                foreach ($regis as $valuReg) {
                    $active = 0;
                    $registers[] = $valuReg->setAttribute('check', $active);
                }
            }
//        dd($registers);

            $documents = [];
            if (!empty($gRecors["document"]) && isset($gRecors["document"])) {
                foreach ($docum as $valuDoc) {
                    $collection = collect($gRecors["document"]);
                    $active = 0;
                    if ($collection->contains('id', $valuDoc->id))
                        $active = 1;
                    $documents[] = $valuDoc->setAttribute('check', $active);
                }
            } else {
                foreach ($docum as $valuDoc) {
                    $active = 0;
                    $documents[] = $valuDoc->setAttribute('check', $active);
                }
            }
        } else {
            $gRecors["group"] = Group::where("id", $id)->first();
            $gRecors["register"] = $regis;
            $gRecors["document"] = $docum;

//            dd($regis->count());
            $registers = [];
            if ($regis->count() > 0) {
                foreach ($regis as $valuReg) {
                    $active = 0;
                    $registers[] = $valuReg->setAttribute('check', $active);
                }
            }
//        dd($registers);

            $documents = [];
            if ($docum->count() > 0) {
                foreach ($docum as $valuDoc) {
                    $active = 0;
                    $documents[] = $valuDoc->setAttribute('check', $active);
                }
            }
        }
//        dd($documents);
//        dd($gRecors);
        return view("admin.mygroups.editMyGroup", compact("gRecors", "registers", "documents"));
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
            'group_name' => 'required',
            'description' => 'required',
        ]);
        $helper = new Helpers();
        $user = $helper->UserData();
//        dd($user);

        $group = Group::where('id', $id)->update([
            'name' => $validated['group_name'],
            'description' => $validated['description'],
            'usercompany_id' => $user->company->id,
            'status' => '1'
        ]);
        Groupbyregisteranddocument::where('group_id', $id)->delete();
//        dd(isset($request->{"checked-register-group-edit"}), isset($request->{"checked-document-group-edit"}));
        if (isset($request->{"checked-register-group-edit"}) || isset($request->{"checked-document-group-edit"})) {

            if (!empty($request->{"checked-register-group-edit"})) {
//                dd($request->{"checked-register-group-edit"});
                foreach ($request->{"checked-register-group-edit"} as $valReg) {
                    $existReg = Groupbyregisteranddocument::where('register_id', $valReg)->where('group_id', $id)->count();
                    if ($existReg === 0) {
                        Groupbyregisteranddocument::create([
                            "group_id" => $id,
                            "register_id" => $valReg,
                            "status" => "1"
                        ]);
                    }
                }
            }

            if (!empty($request->{"checked-document-group-edit"})) {
//                dd($request->{"checked-document-group-edit"});
                foreach ($request->{"checked-document-group-edit"} as $valDoc) {
//                    dd($valDoc);
                    $existReg = Groupbyregisteranddocument::where('document_id', $valDoc)->where('group_id', $id)->count();
                    if ($existReg === 0) {
                        Groupbyregisteranddocument::create([
                            "group_id" => $id,
                            "document_id" => $valDoc,
                            "status" => "1"
                        ]);
                    }
                }
            }
        }
//        dd($request);
        return redirect()->route("mygroups.edit", $id)->with('success', 'successful record');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countGRD = Groupbyregisteranddocument::where('group_id', $id)->count();
        if ($countGRD > 0) {
            Groupbyregisteranddocument::where('group_id', $id)->delete();
        }
        $countG = Group::where("id", $id)->count();
        if ($countG > 0) {
            Group::where("id", $id)->delete();
        }
        return redirect()->route("mygroups");
    }
}
