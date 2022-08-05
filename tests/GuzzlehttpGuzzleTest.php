<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use GuzzleHttp\Client;

final class GuzzlehttpGuzzleTest extends TestCase
{
    public function testConnect(): void
    {
        $this->expectException(GuzzleHttp\Exception\ConnectException::class);

        $client = new Client(['timeout'  => 1]);
        $client->request('GET', 'http://10.255.255.1');
    }
}
