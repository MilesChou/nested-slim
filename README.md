# Nested Slim

Test for nested [Slim](https://www.slimframework.com/).

## Version 1

Using function builder.

Sub App builder:

```php
public static function getApp(\Slim\App $app)
{
    $app->get('/hello/{name}', function (Request $request, Response $response) {
        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello, $name");

        return $response;
    });

    $app->get('/app', function (Request $request, Response $response) {
        $response->getBody()->write("Hello, I am sub App.");

        return $response;
    });

    return $app;
}
```

Main App builder:

```php
public static function getApp(\Slim\App $app)
{
    $app->get('/hello/{name}', function (Request $request, Response $response) {
        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello, $name, I am main App.");

        return $response;
    });

    $app->get('/app', function (Request $request, Response $response) {
        $response->getBody()->write("Hello, I am main App.");

        return $response;
    });

    $app->group('/sub', function () {
        \Nested\Sub\Factory::getApp($this);
    });

    return $app;
}
```

index.php

```php
<?php

require '../vendor/autoload.php';

$app = \Nested\Main\Factory::getApp();

$app->run();
```

Use `\Nested\Main\Factory` if you want run main app. you can use Sub Factory run sub app too.
