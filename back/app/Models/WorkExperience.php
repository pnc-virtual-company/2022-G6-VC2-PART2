<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'company',
        'position',
        'profile',
        'start_year',
        'end_year',
        'company_link',
        'duration',
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
