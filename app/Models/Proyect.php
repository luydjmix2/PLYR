<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proyect_name',
        'proyect_description',
        'proyect_start',
        'proyect_end',
        'c',
        'r',
        'u',
        'd',
        's',
        'userId',
    ];
}
