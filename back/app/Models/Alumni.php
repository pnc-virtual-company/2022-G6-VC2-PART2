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
        'dateOfBirth',
        'placeOfBirth',
        'telegram'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function AlumniExperience()
    {
        return $this -> hasMany(AlumniExperience::class);
    }
    
    public function alumniSkills()
    {
        return $this -> hasMany(AlumniSkills::class);
    }

    public function AlumniStudyBackground()
    {
        return $this -> hasMany(AlumniStudyBackground::class);
    }
}
