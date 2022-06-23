<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;
use App\Models\Register;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_number',
        'company_address',
        'company_address_two',
        'company_code',
        'company_country',
        'company_state',
        'company_city',
        'company_web',
        'company_url_logo',
        'company_nid',
        'company_politics',
    ];

    public function register()
    {
        return $this->belongsTo(Register::class);
    }
}
