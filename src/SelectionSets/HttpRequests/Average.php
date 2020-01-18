<?php

namespace Wappr\Cloudflare\SelectionSets\HttpRequests;

use GraphQL\Exception\InvalidSelectionException;
use GraphQL\Query;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;

class Average extends AbstractSelectionSet implements SelectionSetInterface
{
    /**
     * Fields to get when running query.
     *
     * @var array<int, string>
     * @package Wappr\Cloudflare\SelectionSets\FirewallActivityLog
     */
    protected $selectionSet = [
        'bytes',
    ];

    /**
     *
     * @return GraphQL\Query
     * @throws InvalidSelectionException
     */
    public function getSelection()
    {
        $query = new Query('avg');
        $query->setSelectionSet($this->selectionSet);

        return $query;
    }
}
