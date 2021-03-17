<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proyect_Id',
        'group_Id',
        'groupCustom_Id',
        'name',
        'formato',
        'url',
        'delit',
    ];
}
