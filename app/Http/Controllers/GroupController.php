<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group();
        $group->group_description = $request->group_description;
        $group->c = $request->c;
        $group->r = $request->r;
        $group->u = $request->u;
        $group->d = $request->d;
        $group->s = $request->s;
        $group->delit = $request->delit;
        $group->save();

        return redirect()->route('admin.groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('admin.groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $group = Group::findOrFail($group->id);

        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $user = User::findOrFail($user->id);
        $group->group_description = $request->group_description;
        $group->c = $request->c;
        $group->r = $request->r;
        $group->u = $request->u;
        $group->d = $request->d;
        $group->s = $request->s;
        $group->delit = $request->delit;
        $group->save();

        return redirect()->route('admin.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group = Group::findOrFail($group->id);
        $group->delete();

        return redirect()->route('admin.groups.index');
    }
}
