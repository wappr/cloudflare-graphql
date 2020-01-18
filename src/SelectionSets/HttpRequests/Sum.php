<?php

namespace Wappr\Cloudflare\SelectionSets\HttpRequests;

use GraphQL\Query;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;

class Sum extends AbstractSelectionSet implements SelectionSetInterface
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

    public function getSelection()
    {
        $query = new Query('sum');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
