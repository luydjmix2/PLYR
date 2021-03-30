<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model {

    use HasFactory;

    protected $fillable = [
        'id',
        'document_name_full',
        'document_name',
        'document_format',
        'document_url',
        'proyect_id',
    ];

}
