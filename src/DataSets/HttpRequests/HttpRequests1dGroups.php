<?php

namespace Wappr\Cloudflare\DataSets\HttpRequests;

use DateTime;
use GraphQL\Query;
use GraphQL\RawObject;
use Wappr\Cloudflare\Contracts\QueryInterface;

class HttpRequests1dGroups implements QueryInterface
{
    protected $selectionSet;

    protected $date;
    protected $limit;

    public function __construct(QueryInterface $query, DateTime $date, $limit)
    {
        $this->selectionSet = $query->getQuery();

        $this->date  = $date;
        $this->limit = $limit;
    }

    public function getQuery()
    {
        $query = new Query('httpRequests1dGroups');
        $query->setArguments([
            'limit'  => $this->limit,
            'filter' => new RawObject('{date: "'.$this->date->format("Y-m-d").'"}')
        ]);

        $query->setSelectionSet([$this->selectionSet]);

        return $query;
    }
}
