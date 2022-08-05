<?php declare(strict_types=1);
use Tests\TestCase;

use Symfony\Component\HttpClient\HttpClient;

final class SymfonyHttpClientTest extends TestCase
{
    public function testConnect(): void
    {
        $this->expectTimeout(Symfony\Component\HttpClient\Exception\TimeoutException::class);

        $client = HttpClient::create(['timeout'  => 1]);
        $client->request('GET', $this->connectUrl());
    }

    public function testRead(): void
    {
        $this->expectTimeout(Symfony\Component\HttpClient\Exception\TimeoutException::class);

        $client = HttpClient::create(['timeout'  => 1]);
        $client->request('GET', $this->readUrl());
    }
}
