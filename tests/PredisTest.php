<?php

use Tests\TestCase;

final class PredisTest extends TestCase
{
    public function testConnect()
    {
        $this->expectTimeout(Predis\Connection\ConnectionException::class);

        $client = new Predis\Client(['host' => $this->connectHost(), 'timeout' => 1]);
        $client->ping();
    }

    public function testRead()
    {
        $this->expectTimeout(Predis\Connection\ConnectionException::class);

        $client = new Predis\Client(['host' => $this->readHost(), 'port' => $this->readPort(), 'read_write_timeout' => 1]);
        $client->ping();
    }
}
