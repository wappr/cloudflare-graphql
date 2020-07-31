<?php

namespace Wappr\Cloudflare\GraphQL;

use GraphQL\Client as GraphClient;
use GraphQL\Query;
use GraphQL\QueryBuilder\QueryBuilder;
use Wappr\Cloudflare\GraphQL\Filters\FilterInterface;
use Wappr\Cloudflare\GraphQL\Requests\AbstractRequest;
use Wappr\Cloudflare\GraphQL\Views\ViewInterface;
use Wappr\Cloudflare\GraphQL\Views\Zone;

class Client
{
    protected $scope;
    protected $client;
    protected $builder;
    protected $requests;

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

        $this->builder = new Query('viewer');
    }

    public function view(ViewInterface $view, FilterInterface $filter)
    {
        $this->scope = (new Query($view->name()))->setArguments(['filters' => $filter->get()]);

        return $this;
    }

    public function requests(AbstractRequest ...$requests)
    {

        foreach($requests as $request) {
            $this->requests[] = (new Query($request->name()))->setArguments(['filters' => $request->filters()]);
        }

        return $this;
    }

    public function run()
    {
        $this->scope->setSelectionSet($this->requests);
        $this->builder->setSelectionSet([$this->scope]);

        return $this->client->runQuery($this->builder);
    }
}
