<?php

namespace Wappr\Cloudflare\GraphQL\Filters;

use DateTime;

class DateTimeLessThan extends AbstractFilter
{
    protected $key = 'datetime_lt';

    public function __construct(DateTime $datetime)
    {
        $this->value = $datetime->format('Y-m-d H:i:s');
    }
}
