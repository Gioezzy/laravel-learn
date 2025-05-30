<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'file_upload'
    ];

}
