<?php

namespace Wappr\Cloudflare\SelectionSets\FirewallAnalytics;

use GraphQL\Query;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;

class FirewallAnalyticsCount extends AbstractSelectionSet implements SelectionSetInterface
{
    protected $selectionSet = [
        'count',
    ];

    public function getSelection()
    {
        $query = new Query('count');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
