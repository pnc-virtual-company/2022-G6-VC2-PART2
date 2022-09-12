<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumni_id',
        'company',
        'position',
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
}
