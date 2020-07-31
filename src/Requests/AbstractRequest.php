<?php


namespace Wappr\Cloudflare\GraphQL\Requests;


use Wappr\Cloudflare\GraphQL\Filters\FilterInterface;

abstract class AbstractRequest
{
    protected $name = '';
    protected $filters;

    public function __construct(FilterInterface $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return FilterInterface
     */
    public function filters()
    {
        return $this->filters;
    }
}
