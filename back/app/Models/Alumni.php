<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'profile',
        'generation',
        'major',
        'address',
        'dateOfBirth'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
