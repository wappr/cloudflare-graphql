<?php

namespace Wappr\Cloudflare\DataSets\FirewallAnalytics;

use DateTime;
use GraphQL\Query;
use GraphQL\RawObject;
use Wappr\Cloudflare\Contracts\DataSetInterface;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;

class FirewallEventsAdaptiveGroups implements DataSetInterface
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
        $query = new Query('firewallEventsAdaptiveGroups');
        $query->setArguments([
            'limit'  => $this->limit,
            'filter' => new RawObject('{datetime: "'.$this->date->format(DateTime::ATOM).'"}'),
        ]);

        $query->setSelectionSet($this->selectionSet);

        return $query;
    }

    public function addSelectionSet(SelectionSetInterface $selectionSet)
    {
    }
}
