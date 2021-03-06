<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\team;
use App\Models\company;
use App\Models\Proyect;

class Helper {

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
            $team[$key]['company'] = $team_user[0]['company'];
            $team[$key]['firm'] = $team_user[0]['firm'];
            $team[$key]['start_date'] = $team_user[0]['start_date'];
        }
//        dd($team);
        return $team;
    }

    public static function upStorageFile($file, $id, $path) {
        $fileName = $file->getClientOriginalName();
        if ($_SERVER['HTTP_HOST'] == 'mefurther.com') {
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
        $userDataCompany = company::where('user_id', $id)->where('company_name', $userData->company)->get()->count();
        $r = Helper::validQuerryIcualZero($userDataCompany);
        return $r;
    }

    public static function validUserPropertyGroup($id, $nameGroup) {
        $userGroup = Proyect::where('user_id', $id)->where('proyect_name', $nameGroup)->get()->count();
        $r = Helper::validQuerryIcualZero($userGroup);
        return $r;
    }

}
