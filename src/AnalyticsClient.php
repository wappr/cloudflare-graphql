<?php

namespace Wappr\Cloudflare;

use GraphQL\Query;
use GraphQL\Client;
use Wappr\Cloudflare\Contracts\QueryInterface;

class AnalyticsClient
{
    protected $client;

    public function __construct($email, $key)
    {
        $this->client = new Client(
            'https://api.cloudflare.com/client/v4/graphql',
            [],
            [
                'headers' => [
                    'X-AUTH-EMAIL' => $email,
                    'X-AUTH-KEY'   => $key,
                ]
            ]
        );
    }

    public function runQuery(QueryInterface $query)
    {
        $gql = (new Query('viewer'))->setSelectionSet([$query->getQuery()]);

        return $this->client->runQuery($gql)->getResponseBody();
    }
}
