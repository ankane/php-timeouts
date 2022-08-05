<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function expectTimeout($exception = NULL, $timeout = 1) : void {
        $this->expectedTimeout = $timeout;
        if ($exception) {
            $this->expectException($exception);
        }
    }

    protected function setUp() : void {
        $this->start = hrtime(true);
        $this->expectedTimeout = NULL;
    }

    protected function tearDown() : void {
        if ($this->expectedTimeout) {
            $duration = (hrtime(true) - $this->start) / 1e9;
            $this->assertGreaterThanOrEqual($this->expectedTimeout, $duration);
            $this->assertLessThan($this->expectedTimeout + 0.25, $duration);
        }
    }

    protected function connectHost() : string {
        return '10.255.255.1';
    }

    protected function connectUrl() : string {
        return 'http://' . $this->connectHost();
    }

    protected function readHost() : string {
        return '127.0.0.1';
    }

    protected function readPort() : int {
        return 4567;
    }

    protected function readHostAndPort() : string {
        return $this->readHost() . ':' . $this->readPort();
    }

    protected function readUrl() : string {
        return 'http://' . $this->readHostAndPort();
    }
}
