<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Page extends Model implements HasMedia
{
    use HasMediaTrait;

    public $incrementing = false;

    protected $casts = [
        'settings' => 'array'
    ];
}
