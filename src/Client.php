<?php

namespace Wappr\Cloudflare\GraphQL;

use GraphQL\Client as GraphClient;

class Client
{
    protected $client;

    const API_VERSION = 'v4';

    public function __construct($email, $key)
    {
        $this->client = new GraphClient(
            'https://api.cloudflare.com/client/'.self::API_VERSION.'/graphql',
            [],
            [
                'headers' => [
                    'X-AUTH-EMAIL' => $email,
                    'X-AUTH-KEY'   => $key,
                ],
            ]
        );
    }
}
