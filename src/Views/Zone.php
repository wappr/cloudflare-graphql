<?php

namespace Wappr\Cloudflare\GraphQL\Views;

use Wappr\Cloudflare\GraphQL\Filters\FilterInterface;
use Wappr\Cloudflare\GraphQL\Requests\AbstractRequest;

class Zone implements ViewInterface
{
    protected $name = 'zones';

    protected $filters;

    protected $requests = [];

    public function __construct(FilterInterface $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    public function setRequests(AbstractRequest ...$requests)
    {
        $this->requests[] = $requests;
    }
}
