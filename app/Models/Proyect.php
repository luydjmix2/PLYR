<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model {

    use HasFactory;

    protected $fillable = [
        'id',
        'proyect_name',
        'proyect_description',
        'proyect_start',
        'proyect_end',
        'proyect_url',
        'proyect_shared',
        'user_id',
    ];

}
