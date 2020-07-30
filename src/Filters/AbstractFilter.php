<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

abstract class AbstractFilter implements FilterInterface
{
    protected $key = '';
    protected $value = '';

    public function get(): array
    {
        return [$this->key => $this->value];
    }
}
