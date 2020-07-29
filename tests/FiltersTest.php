<?php

use PHPUnit\Framework\TestCase;
use Wappr\Cloudflare\GraphQL\Filters\DateTimeGreaterThan;
use Wappr\Cloudflare\GraphQL\Filters\DateTimeLessThan;
use Wappr\Cloudflare\GraphQL\Filters\SimpleFilterBuilder;

final class FiltersTest extends TestCase
{
    public function testSimpleFilterBuilder()
    {
        $dategt = new DateTimeGreaterThan('2020-07-01');
        $datelt = new DateTimeLessThan('2020-07-01');

        $filters = new SimpleFilterBuilder($dategt, $datelt);

        $this->assertJson($filters->filters());
    }
}
