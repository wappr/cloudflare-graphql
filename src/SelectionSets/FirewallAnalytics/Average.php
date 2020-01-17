<?php

namespace Wappr\Cloudflare\SelectionSets\FirewallAnalytics;

use GraphQL\Query;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;

class Average extends AbstractSelectionSet implements SelectionSetInterface
{
    protected $selectionSet = [
        'sampleInterval',
    ];

    public function getSelection()
    {
        $query = new Query('avg');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
