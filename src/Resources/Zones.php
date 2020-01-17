<?php

namespace Wappr\Cloudflare\Resources;

use GraphQL\Query;
use GraphQL\RawObject;
use Wappr\Cloudflare\Contracts\QueryInterface;

class Zones implements QueryInterface
{
    protected $request;
    protected $zoneid;

    public function __construct(QueryInterface $request, $zoneid)
    {
        $this->request = $request->getQuery();
        $this->zoneid  = $zoneid;
    }

    public function getQuery()
    {
        $query = new Query('zones');
        $query->setArguments(['filter' => new RawObject("{zoneTag: \"".$this->zoneid."\"}")]);
        $query->setSelectionSet([$this->request]);

        return $query;
    }
}
