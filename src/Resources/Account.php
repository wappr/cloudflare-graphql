<?php

namespace Wappr\Cloudflare\Resources;

use GraphQL\Query;
use GraphQL\RawObject;
use Wappr\Cloudflare\Contracts\DataSetInterface;
use Wappr\Cloudflare\Contracts\ResourceInterface;

class Account implements ResourceInterface
{
    protected $dataset = [];
    protected $accountTag;

    public function __construct(DataSetInterface $dataset, $accountTag)
    {
        $this->dataset[]     = $dataset->getDataSet();
        $this->accountTag    = $accountTag;
    }

    public function getResource()
    {
        $query = new Query('accounts');
        $query->setArguments(['filter' => new RawObject('{accountTag: "'.$this->accountTag.'"}')]);
        $query->setSelectionSet($this->dataset);

        return $query;
    }

    public function addDataSet(DataSetInterface $dataset)
    {
        $this->dataset[] = $dataset->getDataSet();
    }
}
