<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'phone',
        'profile',
        'batch',
        'major',
        'address',
        'dateOfBirth'
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
