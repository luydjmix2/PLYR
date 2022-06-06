<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupbyregisteranddocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'group_id',
        'register_id',
        'document_id',
        'status',
    ];

    protected $table = "groupbyregisteranddocument";

    public function group()
    {
        return $this->belongsTo(Group::class, "group_id", "id");
    }

    public function register()
    {
        return $this->belongsTo(Register::class, "register_id", "id");
    }

    public function document()
    {
        return $this->belongsTo(Document::class, "document_id", "id");
    }
}
