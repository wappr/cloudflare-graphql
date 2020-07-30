<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

interface FilterInterface
{
    public function get(): array;
}
