<?php

use Tests\TestCase;

final class GuzzlehttpGuzzleTest extends TestCase
{
    public function testConnect()
    {
        $this->expectTimeout(GuzzleHttp\Exception\ConnectException::class);

        $client = new GuzzleHttp\Client(['timeout'  => 1]);
        $client->request('GET', $this->connectUrl());
    }

    public function testRead()
    {
        $this->expectTimeout(GuzzleHttp\Exception\ConnectException::class);

        $client = new GuzzleHttp\Client(['timeout'  => 1]);
        $client->request('GET', $this->readUrl());
    }
}
