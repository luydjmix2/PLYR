<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groupbyregisteranddocument;
use App\Models\UserCompamy;

class Counterpart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'company_id',
        'groupbyregisteranddocument_id',
        'usercompany_id',
    ];

    public function groupbyregisteranddocument()
    {
        return $this->belongsTo(Groupbyregisteranddocument::class);
    }

    public function usercompamy()
    {
        return $this->belongsTo(UserCompamy::class, "usercompany_id", "id");
    }

}
