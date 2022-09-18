<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ero extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'verify_code',
    ];
    protected $hidden = [

        'created_at',
        'updated_at'
    ];

}
