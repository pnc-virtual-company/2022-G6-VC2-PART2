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
        'updated_at'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function workExperience()
    {
        return $this -> hasMany(WorkExperience::class);
    }
    
    public function alumniSkills()
    {
        return $this -> hasMany(AlumniSkills::class);
    }

    public function studyBackground()
    {
        return $this -> hasMany(StudyBackground::class);
    }
}
