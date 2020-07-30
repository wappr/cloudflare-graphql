<?php

use PHPUnit\Framework\TestCase;
use Wappr\Cloudflare\GraphQL\Filters\DateTimeGreaterThan;
use Wappr\Cloudflare\GraphQL\Filters\DateTimeLessThan;
use Wappr\Cloudflare\GraphQL\Filters\FilterGroup;
use Wappr\Cloudflare\GraphQL\Filters\ZoneTag;

final class FiltersTest extends TestCase
{
    public function testDateTimeGreaterThanFilter()
    {
        $dtgt = new DateTimeGreaterThan(new \DateTime);

        $this->assertIsArray($dtgt->get());
    }

    public function testFilterGroup()
    {
        $dtgt = new DateTimeGreaterThan(new \DateTime);
        $dtlt = new DateTimeLessThan(new \DateTime);
        $filterGroup = new FilterGroup($dtgt, $dtlt);

        $this->assertIsArray($filterGroup->get());
    }

    public function testZoneTag()
    {
        $zonetag = new ZoneTag('1234');
        $this->assertIsArray($zonetag->get());

        $this->assertEquals('1234', $zonetag->get()['zoneTag']);
    }
}
