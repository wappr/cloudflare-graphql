<?php

namespace Wappr\Cloudflare\DataSets\HttpRequests;

use DateTime;
use GraphQL\Query;
use GraphQL\RawObject;
use Wappr\Cloudflare\Contracts\DataSetInterface;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;

class HttpRequests1dGroups implements DataSetInterface
{
    protected $selectionSet = [];

    protected $date;
    protected $limit;

    public function __construct(SelectionSetInterface $selectionSet, DateTime $date, $limit)
    {
        $this->selectionSet[] = $selectionSet->getSelection();

        $this->date  = $date;
        $this->limit = $limit;
    }

    public function getDataSet()
    {
        $query = new Query('httpRequests1dGroups');
        $query->setArguments([
            'limit'  => $this->limit,
            'filter' => new RawObject('{date: "'.$this->date->format('Y-m-d').'"}'),
        ]);

        $query->setSelectionSet($this->selectionSet);

        return $query;
    }

    public function addSelectionSet(SelectionSetInterface $selectionSet)
    {
        $this->selectionSet[] = $selectionSet->getSelection();

        return $this;
    }
}
