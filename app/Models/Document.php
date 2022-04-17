<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_name_full',
        'document_name',
        'document_format',
        'document_url',
        'origin',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
