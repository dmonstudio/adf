<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasVisibilityTrait;

    protected $fillable = [
        'title', 'title_en',
        'description', 'description_en',
        'requirements', 'requirements_en'
    ];

    protected $casts = [
        'requirements' => 'array',
        'requirements_en' => 'array'
    ];
}
