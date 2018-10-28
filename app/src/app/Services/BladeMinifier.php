<?php

namespace App\Services;

use HTMLMin\HTMLMin\Minifiers\BladeMinifier as BaseMinifier;

class BladeMinifier extends BaseMinifier
{
    public function render($value)
    {
        $value = parent::render($value);

        $value = str_replace('> <', '><', $value);

        return $value;
    }
}
