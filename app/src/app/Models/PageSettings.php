<?php

namespace App\Models;

use JsonSerializable;

class PageSettings implements JsonSerializable
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

    public function jsonSerialize()
    {
        return $this->data;
    }
}
