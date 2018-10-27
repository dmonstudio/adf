<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Story extends Model implements HasMedia
{
    use HasMediaTrait, HasVisibilityTrait, HasMainImageTrait;

    protected $fillable = [
        'name', 'name_en',
        'slug',
        'body', 'body_en',
        'visible',
    ];

    protected $appends = [
        'main_image',
    ];

    protected $with = [
        'media'
    ];
}
