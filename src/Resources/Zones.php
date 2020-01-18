<?php

namespace Wappr\Cloudflare\Resources;

use GraphQL\Query;
use GraphQL\RawObject;
use Wappr\Cloudflare\Contracts\DataSetInterface;
use Wappr\Cloudflare\Contracts\ResourceInterface;

class Zones implements ResourceInterface
{
    protected $dataset = [];
    protected $zoneid;

    public function __construct(DataSetInterface $dataset, $zoneid)
    {
        $this->dataset[] = $dataset->getDataSet();
        $this->zoneid    = $zoneid;
    }

    public function getResource()
    {
        $query = new Query('zones');
        $query->setArguments(['filter' => new RawObject('{zoneTag: "'.$this->zoneid.'"}')]);
        $query->setSelectionSet($this->dataset);

        return $query;
    }

    public function addDataSet(DataSetInterface $dataset)
    {
        $this->dataset[] = $dataset->getDataSet();
    }
}
