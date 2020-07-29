<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

class SimpleFilterBuilder
{
    protected $filters = [];

    public function __construct(AbstractFilter ... $filters)
    {
        foreach($filters as $filter) {
            $this->filters[] = $filter->get();
        }
    }

    public function filters()
    {
        return json_encode($this->filters);
    }
}
