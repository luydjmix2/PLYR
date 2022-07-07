<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groupbyregisteranddocument;
use TCG\Voyager\Models\Role;
use App\Models\UserCompamy;
use App\Models\Counterpart;
use App\Models\Company;
use App\Models\Group;

class CounterPartiesController extends Controller
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
//        dd($user->user->roles);
        $companies = Company::where('id', 'not like', $user->company->id)->get();
        $listCompaniesIds = [];
        foreach ($companies as $company){
            $listCompaniesIds[] = $company->id;
        }
//        dd($listCompaniesIds);
        $usersComps = UserCompamy::whereIn('company_id',$listCompaniesIds)->get();
//        dd($companies);
//        dd($usersComps);
        $listCompInternalIds = [];
        $listCompExternalIds = [];
        foreach ($usersComps as $userComp){
//            dd($userComp->user->role_id);
            if($userComp->user->role_id != "5"){
                $listCompInternalIds[] =$userComp->company->id;
            }
            if($userComp->user->role_id == "5"){
                $listCompExternalIds[] =$userComp->company->id;
            }
        }
//        dd($listCompInternalIds);
//        dd($listCompExternalIds);
        $companiesInternal = Company::whereIn('id',$listCompInternalIds)->get();
        $companiesExternal = Company::whereIn('id',$listCompExternalIds)->get();
//        dd($companies);
        $groups = Group::where('usercompany_id', $user->id)->get();
        $counterparts = Counterpart::where("company_id", $user->company->id)->get();
        return view("admin.myCounterparties.myCounterparties", compact("user", "companiesInternal", "companiesExternal", "groups", "counterparts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.myCounterparties.createMyCounterparties");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $helper = new Helpers();
        $user = $helper->UserData();
        $validate = (object)$request->validate([
            'company_id' => "required",
            'group' => "required",
        ]);
        $groupbyregisteranddocument = Groupbyregisteranddocument::where("group_id", $validate->group)->first();
//        dd($groupbyregisteranddocument);
        $usercompany = UserCompamy::where("company_id", $validate->company_id)->first();
        $conterpartCount = Counterpart::where("groupbyregisteranddocument_id", $groupbyregisteranddocument->id)->where("company_id", $usercompany->id)->count();
        if ($conterpartCount == 0) {
            Counterpart::create([
                'company_id' => $user->company->id,
                'groupbyregisteranddocument_id' => $groupbyregisteranddocument->id,
                'usercompany_id' => $usercompany->id,
            ]);
        }
        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counterpart = Counterpart::find($id);
        $counterpart->delete();
        return redirect()->back();
    }
}
