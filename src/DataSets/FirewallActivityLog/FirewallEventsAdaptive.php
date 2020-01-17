<?php

namespace Wappr\Cloudflare\DataSets\FirewallActivityLog;

use DateTime;
use GraphQL\Query;
use GraphQL\RawObject;
use Wappr\Cloudflare\Contracts\DataSetInterface;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;

class FirewallEventsAdaptive implements DataSetInterface
{
    protected $selectionSet = [];

    protected $date;
    protected $limit;

    public function __construct(SelectionSetInterface $selectionSet, DateTime $date, $limit)
    {
        $this->addSelectionSet($selectionSet);

        $this->date  = $date;
        $this->limit = $limit;
    }

    public function getDataSet()
    {
        $query = new Query('firewallEventsAdaptive');
        $query->setArguments([
            'limit'  => $this->limit,
            // @TODO - need a way to create these raw filters with all the possible variations.
            'filter' => new RawObject('{datetime_gt:"2020-01-15T13:00:00Z", datetime_lt:"2020-01-16T13:00:00Z"}'),
        ]);

        $query->setSelectionSet($this->selectionSet);

        return $query;
    }

    public function addSelectionSet(SelectionSetInterface $selectionSet)
    {
        if (is_array($selectionSet->getSelection())) {
            $this->selectionSet = $selectionSet->getSelection();

            return $this;
        }

        $this->selectionSet[] = $selectionSet->getSelection();

        return $this;
    }
}
