<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;

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
        'user_id',
    ];

    public function documents()
    {
        return $this->belongsTo(Document::class);
    }
}
