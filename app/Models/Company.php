<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;
use App\Models\User;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_bio',
        'company_address',
        'company_phone',
        'company_web',
        'company_url_logo',
        'company_code',
        'company_nid',
        'company_politics',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
