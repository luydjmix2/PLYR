<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model {

    use HasFactory;

    protected $fillable = [
        'id',
        'company_name',
        'company_bio',
        'company_addres',
        'company_phone',
        'company_web',
        'company_url_logo',
        'company_code',
        'company_nid',
        'company_politics',
        'user_id',
    ];

}
