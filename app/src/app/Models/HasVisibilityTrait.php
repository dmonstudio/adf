<?php

namespace App\Models;

trait HasVisibilityTrait
{
    public function scopeVisible($builder)
    {
        $builder->where('visible', true);
    }

    public function scopeInvisible($builder)
    {
        $builder->where('visible', false);
    }
}
