<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function expectTimeout($exception = null, $timeout = 1)
    {
        $this->expectedTimeout = $timeout;
        if ($exception) {
            $this->expectException($exception);
        }
    }

    protected function setUp(): void
    {
        $this->start = hrtime(true);
        $this->expectedTimeout = null;
    }

    protected function tearDown(): void
    {
        if ($this->expectedTimeout) {
            $duration = (hrtime(true) - $this->start) / 1e9;
            $this->assertGreaterThanOrEqual($this->expectedTimeout, $duration);
            $this->assertLessThan($this->expectedTimeout + 0.25, $duration);
        }
    }

    protected function connectHost()
    {
        return '10.255.255.1';
    }

    protected function connectUrl()
    {
        return 'http://' . $this->connectHost();
    }

    protected function readHost()
    {
        return '127.0.0.1';
    }

    protected function readPort()
    {
        return 4567;
    }

    protected function readHostAndPort()
    {
        return $this->readHost() . ':' . $this->readPort();
    }

    protected function readUrl()
    {
        return 'http://' . $this->readHostAndPort();
    }
}
