<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniExperience extends Model
{
    use HasFactory;
    public function Alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
    public function WorkExperience()
    {
        return $this->belongsTo(WorkExperience::class);
    }
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
