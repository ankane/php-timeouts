<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function expectTimeout($timeout) : void {
        $this->expectedTimeout = $timeout;
    }

    protected function setUp() : void {
        $this->start = hrtime(true);
        $this->expectedTimeout = NULL;
    }

    protected function tearDown() : void {
        if ($this->expectedTimeout) {
            $duration = (hrtime(true) - $this->start) / 1e9;
            $this->assertGreaterThanOrEqual($this->expectedTimeout, $duration);
            $this->assertLessThan($this->expectedTimeout + 1.25, $duration);
        }
    }
}
