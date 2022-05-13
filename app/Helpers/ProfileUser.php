<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

//db
use App\Models\UserCompamy;

class ProfileUser
{
    private $User = '';
    public function __construct()
    {
        $this->User = Auth::user();
    }


    public function UserProfile(){
        $userCompany = UserCompamy::where('user_id', $this->User['id'])->first();
        return $userCompany;
    }




}
