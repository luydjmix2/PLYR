<?php

namespace App\Helpers;

use App\Helpers\ProfileUser;

class Helpers
{
    public static function UserData()
    {
        $UserData = "hola";
        $profileUser = new ProfileUser();

        $UserData = $profileUser->UserProfile();
//        dd($UserData->user->name);
        return $UserData;
    }


}
