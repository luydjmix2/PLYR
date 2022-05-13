<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

//db
use App\Models\Company;

class ProfileUser
{
    private $User = '';
    public function __construct()
    {
        $this->User = Auth::user();
    }


    public function UserProfile(){
        return $this->User;
    }


}
