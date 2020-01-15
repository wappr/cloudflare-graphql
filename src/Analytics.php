<?php

namespace Wappr\Cloudflare;

use GraphQL\Query;
use GraphQL\Client;
use GraphQL\RawObject;

class Analytics
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

    public function basics($zoneid, $date, $limit = 10)
    {
        $gql = (new Query('viewer'))->setSelectionSet([
            (new Query('zones'))
                ->setArguments(['filter' => new RawObject('{zoneTag: "'.$zoneid.'"}')])/* zone arguments */
                ->setSelectionSet([
                    (new Query('httpRequests1dGroups'))
                        ->setArguments(['limit' => $limit, 'filter' => new RawObject('{ date: "'.$date.'"}')])
                        ->setSelectionSet([
                            (new Query('sum'))
                                ->setSelectionSet([
                                    'pageViews',
                                    'requests',
                                    'threats',
                                    'bytes',

                                    'cachedBytes',
                                    'cachedRequests',

                                    'encryptedBytes',
                                    'encryptedRequests',
                                ])
                        ]),
                ])
        ]);

        return $this->query($gql);
    }

    protected function query($query)
    {
        return $this->client->runQuery($query)->getResponseBody();
    }
}
