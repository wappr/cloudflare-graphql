<?php

namespace Wappr\Cloudflare\SelectionSets\HttpRequests;

use GraphQL\Query;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;

class Unique extends AbstractSelectionSet implements SelectionSetInterface
{
    protected $selectionSet = [
        'uniques',
    ];

    public function getSelection()
    {
        $query = new Query('uniq');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
