<?php

use Tests\TestCase;

final class OpensearchProjectOpensearchPhpTest extends TestCase
{
    public function testConnect()
    {
        $this->expectTimeout(OpenSearch\Common\Exceptions\NoNodesAvailableException::class);

        $client = (new \OpenSearch\ClientBuilder())
            ->setConnectionParams(['client' => ['curl' => [CURLOPT_CONNECTTIMEOUT => 1]]])
            ->setHosts([$this->connectUrl()])
            ->build();
        $client->info();
    }

    public function testRead()
    {
        $this->expectTimeout(OpenSearch\Common\Exceptions\NoNodesAvailableException::class);

        $client = (new \OpenSearch\ClientBuilder())
            ->setConnectionParams(['client' => ['curl' => [CURLOPT_TIMEOUT => 1]]])
            ->setHosts([$this->readUrl()])
            ->build();
        $client->info();
    }
}
