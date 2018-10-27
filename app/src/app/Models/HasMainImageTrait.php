<?php

namespace App\Models;

trait HasMainImageTrait
{
    public function getMainImageAttribute()
    {
        return $this->getFirstMediaUrl();
    }
}
