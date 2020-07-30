<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

use DateTime;

class DateTimeGreaterThan extends AbstractFilter
{
    protected $key = 'datetime_gt';

    public function __construct(DateTime $datetime)
    {
        $this->value = $datetime->format('Y-m-d H:i:s');
    }
}
