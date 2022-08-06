# PHP Timeouts

An unresponsive service can be worse than a down one. It can tie up your entire system if not handled properly. **All network requests should have a timeout.**

Here’s how to add timeouts for popular PHP packages. **[All have been tested](tests)**. The default is no timeout, unless otherwise specified. Enjoy!

Also available for [Ruby](https://github.com/ankane/the-ultimate-guide-to-ruby-timeouts), [Python](https://github.com/ankane/python-timeouts), [Node](https://github.com/ankane/node-timeouts), [Go](https://github.com/ankane/go-timeouts), and [Rust](https://github.com/ankane/rust-timeouts)

[![Build Status](https://github.com/ankane/php-timeouts/workflows/build/badge.svg?branch=master)](https://github.com/ankane/php-timeouts/actions)

## Contents

Standard library

- [cURL](#curl)

Packages

- [guzzlehttp/guzzle](#guzzlehttpguzzle)
- [opensearch-project/opensearch-php](#opensearch-projectopensearch-php)
- [predis/predis](#predispredis)
- [symfony/http-client](#symfonyhttp-client)

## Standard Library

### cURL

```php
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 1);
```

No exception is raised. Use `curl_error($ch)` to check for a timeout.

## Packages

### guzzlehttp/guzzle

```php
new GuzzleHttp\Client(['timeout'  => 1]);
```

Raises `GuzzleHttp\Exception\ConnectException`

### opensearch-project/opensearch-php

```php
$client = (new \OpenSearch\ClientBuilder())
    ->setConnectionParams(['client' => ['curl' => [CURLOPT_CONNECTTIMEOUT => 1, CURLOPT_TIMEOUT => 1]]])
    ->build();
```

Raises `OpenSearch\Common\Exceptions\NoNodesAvailableException`

### predis/predis

```php
new Predis\Client(['timeout' => 1, 'read_write_timeout' => 1]);
```

Default: 5s connect timeout

Raises `Predis\Connection\ConnectionException`

### symfony/http-client

```php
HttpClient::create(['timeout'  => 1]);
```

Raises `Symfony\Component\HttpClient\Exception\TimeoutException`

## Don’t see a library you use?

[Let us know](https://github.com/ankane/php-timeouts/issues/new). Even better, [create a pull request](https://github.com/ankane/php-timeouts/pulls) for it.

## Running the Tests

```sh
git clone https://github.com/ankane/php-timeouts.git
cd php-timeouts
composer install
php tests/server.php
```

To run all tests, use:

```sh
composer test
```

To run individual tests, use:

```sh
composer test -- --filter guzzle
```
