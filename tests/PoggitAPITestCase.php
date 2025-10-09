<?php

namespace Aternos\PoggitApi\Test;

use Aternos\PoggitApi\Client\PoggitAPIClient;
use PHPUnit\Framework\TestCase;

class PoggitAPITestCase extends TestCase
{

    protected ?PoggitAPIClient $client = null;

    protected function setUp(): void
    {
        $this->client = new PoggitAPIClient();
        $this->client->setUserAgent("aternos/php-poggit-api@2.0.1 (contact@aternos.org)");
    }

}
