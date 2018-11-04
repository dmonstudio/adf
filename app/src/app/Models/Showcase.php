<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Showcase extends Model implements HasMedia
{
    use HasMediaTrait, HasVisibilityTrait, HasMainImageTrait;

    const CATEGORIES = [
        'workspace' => '办公空间',
        'dinetertainment' => '餐饮娱乐',
        'realestate' => '地产'
    ];

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
