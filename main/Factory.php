<?php
namespace Nested\Main;

use Slim\Http\Request;
use Slim\Http\Response;

class Factory
{
    /**
     * @param \Slim\App $app
     * @return \Slim\App
     */
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
}