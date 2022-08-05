<?php declare(strict_types=1);
use Tests\TestCase;

final class GuzzlehttpGuzzleTest extends TestCase
{
    public function testConnect(): void
    {
        $this->expectTimeout(GuzzleHttp\Exception\ConnectException::class);

        $client = new GuzzleHttp\Client(['timeout'  => 1]);
        $client->request('GET', $this->connectUrl());
    }

    public function testRead(): void
    {
        $this->expectTimeout(GuzzleHttp\Exception\ConnectException::class);

        $client = new GuzzleHttp\Client(['timeout'  => 1]);
        $client->request('GET', $this->readUrl());
    }
}
