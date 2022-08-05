<?php declare(strict_types=1);
use Tests\TestCase;

final class GuzzlehttpGuzzleTest extends TestCase
{
    public function testConnect(): void
    {
        $this->expectTimeout(1);
        $this->expectException(GuzzleHttp\Exception\ConnectException::class);

        $client = new GuzzleHttp\Client(['timeout'  => 1]);
        $client->request('GET', 'http://10.255.255.1');
    }

    public function testRead(): void
    {
        $this->expectTimeout(1);
        $this->expectException(GuzzleHttp\Exception\ConnectException::class);

        $client = new GuzzleHttp\Client(['timeout'  => 1]);
        $client->request('GET', 'http://127.0.0.1:4567');
    }
}
