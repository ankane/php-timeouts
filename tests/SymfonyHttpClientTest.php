<?php

use Tests\TestCase;

use Symfony\Component\HttpClient\HttpClient;

final class SymfonyHttpClientTest extends TestCase
{
    public function testConnect()
    {
        $this->expectTimeout(Symfony\Component\HttpClient\Exception\TimeoutException::class);

        $client = HttpClient::create(['timeout'  => 1]);
        $client->request('GET', $this->connectUrl());
    }

    public function testRead()
    {
        $this->expectTimeout(Symfony\Component\HttpClient\Exception\TimeoutException::class);

        $client = HttpClient::create(['timeout'  => 1]);
        $client->request('GET', $this->readUrl());
    }
}
