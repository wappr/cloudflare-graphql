<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

class FilterGroup implements FilterInterface
{
    protected $filters = [];

    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    public function get(): array
    {
        return $this->filters;
    }
}
