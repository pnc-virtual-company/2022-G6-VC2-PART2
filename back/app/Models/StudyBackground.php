<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyBackground extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumni_id',
        'school',
        'school_logo',
        'start_year',
        'end_year',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function Alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
    public function AlumniStudyBackground()
    {
        return $this -> hasMany(StudyBackground::class);
    }
}
