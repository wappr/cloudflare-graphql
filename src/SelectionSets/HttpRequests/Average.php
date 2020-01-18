<?php

namespace Wappr\Cloudflare\SelectionSets\HttpRequests;

use GraphQL\Query;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;

class Average extends AbstractSelectionSet implements SelectionSetInterface
{
    protected $selectionSet = [
        'bytes',
    ];

    public function getSelection()
    {
        $query = new Query('avg');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
