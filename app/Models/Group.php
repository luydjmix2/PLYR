<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserCompamy;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'usercompany_id',
        'status',
    ];
    public function userCompamy(){
        return $this->belongsTo(UserCompamy::class, "usercompany_id", "id");
    }
}
