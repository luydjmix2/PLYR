<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\team;
use App\Models\company;
use App\Models\Proyect;

class Helper {

    public static function profile($user_id) {
        return $user_id;
    }

    public static function setActiveRoute($name) {
        return request()->routeIs($name) ? 'active' : '';
    }

    public static function setOpenRoute($name) {
        if (request()->routeIs($name) == $name) {
            return request()->routeIs($name) ? 'open' : '';
        } else {
            return request()->routeIs($name) ? 'active' : '';
        }
    }

    public static function dataUser($id) {
        $userData = User::find($id);
        return $userData;
    }

    public static function dataUserName($id) {
        $userData = User::find($id);
        return $userData->name;
    }

    public static function dataTeamGroup($id_group) {
//        dd($id_group);
        $team = [];
        $team_group = team::where('id_group', $id_group)->get()->toArray();

//        dd($team_group);
        foreach ($team_group as $key => $team_users) {
            $team_user = User::where('id', $team_users['user_id'])->get()->toArray();
            $team[$key]['id'] = $team_user[0]['id'];
            $team[$key]['name'] = $team_user[0]['name'];
            $team[$key]['position'] = $team_user[0]['position'];
            $team[$key]['email'] = $team_user[0]['email'];
            $team[$key]['movil'] = $team_user[0]['movil'];
            $team[$key]['phone'] = $team_user[0]['movil'];
            $team[$key]['first_name'] = $team_user[0]['first_name'];
            $team[$key]['last_name'] = $team_user[0]['first_name'];
            $team[$key]['bloomberg_email'] = $team_user[0]['bloomberg_email'];
            $team[$key]['company'] = Helper::valideNameCompany($team_user[0]['company']);
            $team[$key]['firm'] = $team_user[0]['firm'];
            $team[$key]['start_date'] = $team_user[0]['start_date'];
        }
//        dd($team);
        return $team;
    }

    public static function upStorageFile($file, $id, $path) {
        $fileName = $file->getClientOriginalName();
        if ($_SERVER['HTTP_HOST'] == 'plrupdating.com') {
            $file->move('/home/mefurthe/public_html' . $path . $id . '/', $fileName);
        } else {
            $file->move(public_path() . $path . $id . '/', $fileName);
        }
        $arrayFile = explode(".", $fileName);
        $url_file = $path . $id . '/' . $fileName;

        $respon = array('name_full' => $fileName, 'name' => $arrayFile[0], 'format' => $arrayFile[1], 'url_file' => $url_file);
        return $respon;
    }

    public static function validQuerryIcualZero($param) {
        if ($param == 0) {
            $r = 0;
        } else {
            $r = 1;
        }
        return $r;
    }

    public static function validUserEditCompany($id) {
        $userData = User::find($id);
        if ($userData->profile == '1') {
            $userDataCompany = company::where('user_id', $id)->where('id', $userData->company)->get()->count();
            $r = Helper::validQuerryIcualZero($userDataCompany);
        } else {
            $r = 0;
        }
        return $r;
    }

    public static function validUserPropertyGroup($id, $nameGroup) {
        $userGroup = Proyect::where('user_id', $id)->where('proyect_name', $nameGroup)->get()->count();
        $r = Helper::validQuerryIcualZero($userGroup);
        return $r;
    }

    public static function valideNameCompany($user_id) {
        $user = User::where('id', $user_id)->first();
//        dd($user->company);
        $company = company::where('id', $user->company)->first();
//        dd($company->company_name);
        return $company->company_name;
    }

    public static function dataTeam($param, $action, $text = '') {
        switch ($action) {
            case 'comp':
                $team = team::where("id_company", $param)->first();
                if ($text != '') {
                    $team = $team->{$text};
                }
                break;
            case 'group':
                $team = team::where("id_group", $param)->first();
                if ($text != '') {
                    $team = $team->{$text};
                }
                break;
            case 'user':
                $team = team::where("user_id", $param)->first();
                if ($text != '') {
                    $team = $team->{$text};
                }
                break;
        }
        return $team;
    }

    public static function listProfile() {
        $listProfile = ['1' => 'SAdmin', '2' => 'Admin-A', '3' => 'Admin-B', '4' => 'Editor', '5' => 'User', '6' => 'Invited'];
        return $listProfile;
    }

    public static function validaProfileName($param) {
        return Helper::listProfile()[$param];
    }

    public static function statusViewUser($user_id, $action) {
        $user = User::where('id', $user_id)->first();
        switch ($user->status) {
            case '0':
                $res = array('bts'=>'btn btn-outline-success waves-effect waves-light', 'icon'=>'fa-user-check', 'text' => 'Inactive');
                break;
            case '1':
                $res = array('bts'=>'btn btn-outline-danger waves-effect waves-light', 'icon'=>'fa-user-times', 'text' => 'Active');
                break;
        }
        return $res[$action];
    }

}
