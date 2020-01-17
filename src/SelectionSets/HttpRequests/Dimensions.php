<?php

namespace Wappr\Cloudflare\SelectionSets\HttpRequests;

use GraphQL\Query;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;

class Dimensions extends AbstractSelectionSet implements SelectionSetInterface
{
    protected $selectionSet = [
        'date',
    ];

    public function getSelection()
    {
        $query = new Query('dimensions');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
