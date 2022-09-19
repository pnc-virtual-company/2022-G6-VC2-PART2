<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniStudyBackground extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function Alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
    public function StudyBackground()
    {
        return $this->belongsTo(StudyBackground::class);
    }
}
