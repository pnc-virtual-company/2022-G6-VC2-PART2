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
    ];
    protected $hidden = [

        'created_at',
        'updated_at'
    ];

}
