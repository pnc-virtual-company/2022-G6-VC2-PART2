<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniSkills extends Model
{
    use HasFactory;
    public function Alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
    public function Skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
