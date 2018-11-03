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

    protected $with = [
        'media'
    ];

    public static function findByType(string $type)
    {
        return self::query()->whereType($type)->firstOrFail();
    }

    public function removeMedia()
    {
        $this->media->each(function($media) {
            $media->delete();
        });
    }

    public function getSettingsAttribute($settings)
    {
        $settings = json_decode($settings, true);
        
        return new PageSettings($settings);
    }
}
