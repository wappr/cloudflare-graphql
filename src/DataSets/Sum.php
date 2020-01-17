<?php

namespace Wappr\Cloudflare\DataSets;

use GraphQL\Query;
use Wappr\Cloudflare\Contracts\QueryInterface;

class Sum implements QueryInterface
{
    protected $selectionSet = [
        'pageViews',
        'requests',
        'threats',
        'bytes',
        'cachedBytes',
        'cachedRequests',
        'encryptedBytes',
        'encryptedRequests',
    ];

    public function __construct($selectionSet = [])
    {
        if($selectionSet) {
            $this->selectionSet = $selectionSet;
        }
    }

    public function getQuery()
    {
        $query = new Query('sum');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
