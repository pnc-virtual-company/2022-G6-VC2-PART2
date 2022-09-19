<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ero extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'phone',
        'telegram',
    ];
    protected $hidden = [

        'created_at',
        'updated_at'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
