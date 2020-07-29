<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

class AbstractFilter
{
    protected $key;
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function get()
    {
        return [$this->key => $this->value];
    }
}
