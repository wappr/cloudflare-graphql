<?php

namespace Wappr\Cloudflare;

use GraphQL\Query;
use GraphQL\Client;
use Wappr\Cloudflare\Contracts\ResourceInterface;

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
                ],
            ]
        );
    }

    public function runQuery(ResourceInterface $resource)
    {
        $gql = (new Query('viewer'))->setSelectionSet([$resource->getResource()]);

        return $this->client->runQuery($gql)->getResponseBody();
    }
}
