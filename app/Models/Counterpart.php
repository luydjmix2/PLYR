<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groupbyregisteranddocument;
use App\Models\UserCompamy;

class Counterpart extends Model
{
    use HasFactory;

    public function groupbyregisteranddocument()
    {
        return $this->belongsTo(Groupbyregisteranddocument::class);
    }

    public function usercompamy()
    {
        return $this->belongsTo(UserCompamy::class);
    }

}
