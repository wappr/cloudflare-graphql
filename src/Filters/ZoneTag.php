<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

class ZoneTag extends AbstractFilter
{
    protected $key = 'zoneTag';

    public function __construct(string $zonetag)
    {
        $this->value = $zonetag;
    }
}
