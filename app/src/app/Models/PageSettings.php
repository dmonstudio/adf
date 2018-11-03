<?php

namespace App\Models;

class PageSettings
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function get($key, $default = null)
    {
        return array_get($this->data, $key, $default);
    }
}
