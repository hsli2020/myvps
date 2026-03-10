<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'original_name',
        'stored_name',
        'note',
        'mime_type',
        'size',
        'path',
        'user_id'
    ];
}
