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
}
