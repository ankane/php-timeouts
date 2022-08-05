<?php declare(strict_types=1);
use Tests\TestCase;

final class PredisTest extends TestCase
{
    public function testConnect(): void
    {
        $this->expectTimeout(Predis\Connection\ConnectionException::class);

        $client = new Predis\Client(['host' => '10.255.255.1', 'port' => 6379, 'timeout' => 1]);
        $client->ping();
    }

    public function testRead(): void
    {
        $this->expectTimeout(Predis\Connection\ConnectionException::class);

        $client = new Predis\Client(['host' => '127.0.0.1', 'port' => 4567, 'read_write_timeout' => 1]);
        $client->ping();
    }
}
