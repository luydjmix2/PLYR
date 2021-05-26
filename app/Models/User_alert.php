<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_alert extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'u_alerts_id_group',
        'u_alerts_id_company',
        'u_alerts_mail',
        'u_alerts_movil',
    ];
}
