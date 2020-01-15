# Cloudflare GraphQL Analytics API Client

This package is pretty specific to my needs, but maybe someone else will be able
to use it. Contributions are very welcome.

**The API will change soon**

Cloudflare's current API will stop supporting queries for Zone Analytics on May
31, 2020. You now have to use their
[GraphQL Analytics API](https://developers.cloudflare.com/analytics/graphql-api/)
. Also, at the time of writing this,
the [Cloudflare SDK](https://github.com/cloudflare/cloudflare-php)
for PHP does not support their new API.

## Usage

The GraphQL Analytics API offers you more control over the current API. I didn't
need that much control since I'm only getting some basic stats for each zone.

```php
<?php

use Wappr\Cloudflare\Analytics;

require 'vendor/autoload.php';

$analytics = new Analytics('email@yahoo.com', 'cloudflare_key');
$result = $analytics->basics('zone id', '2020-01-14');

echo (json_decode($result)->data->viewer->zones[0]->httpRequests1dGroups[0]->sum->bytes);
// 576901666
```
