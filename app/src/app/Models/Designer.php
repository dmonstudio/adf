<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Designer extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'name', 'en_name',
        'slug',
        'titles', 'en_titles',
        'achievements', 'en_achievements',
        'body', 'en_body',
        'visible',
    ];

    protected $casts = [
        'titles' => 'array',
        'achievements' => 'array',
        'en_titles' => 'array',
        'en_achievements' => 'array',
        'images' => 'array',
    ];

    protected $appends = [
        'main_image',
    ];

    protected $with = [
        'media'
    ];

    public function getMainTitleAttribute()
    {
        return array_first($this->titles);
    }

    public function getTitlesCountAttribute()
    {
        return count($this->titles);
    }

    public function getMainAchievementAttribute()
    {
        return array_first($this->achievements);
    }

    public function getAchievementsCountAttribute()
    {
        return count($this->achievements);
    }

    public function getMainImageAttribute()
    {
        return $this->getFirstMediaUrl();
    }

    public function setTitlesAttribute(array $titles)
    {
        $titles = array_values(array_filter($titles));
        $this->attributes['titles'] = json_encode($titles);
    }

    public function setAchievementsAttribute(array $achievements)
    {
        $achievements = array_values(array_filter($achievements));
        $this->attributes['achievements'] = json_encode($achievements);
    }
}
