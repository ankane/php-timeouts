<?php

use Tests\TestCase;

final class CurlTest extends TestCase
{
    public function testConnect()
    {
        $this->expectTimeout();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->connectHost());
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        curl_exec($ch);
        // 'Connection timeout' and 'Connection timed out' on different platforms
        $this->assertStringContainsString('Connection time', curl_error($ch));
        curl_close($ch);
    }

    public function testRead(): void
    {
        $this->expectTimeout();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->readHostAndPort());
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_exec($ch);
        $this->assertStringContainsString('Operation timed out', curl_error($ch));
        curl_close($ch);
    }
}
