<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class CurlTest extends TestCase
{
    public function testConnect(): void
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, '10.255.255.1');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        curl_exec($ch);
        // 'Connection timeout' and 'Connection timed out' on different platforms
        $this->assertStringContainsString('Connection time', curl_error($ch));
        curl_close($ch);
    }
}
