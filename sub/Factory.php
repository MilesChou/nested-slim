<?php
namespace Nested\Sub;

use Slim\Http\Request;
use Slim\Http\Response;

class Factory
{
    /**
     * @param null|\Slim\App $app
     * @return \Slim\App
     */
    public static function getApp(\Slim\App $app = null)
    {
        if (null === $app) {
            $app = new \Slim\App();
        }

        $app->get('/hello/{name}', function (Request $request, Response $response) {
            $name = $request->getAttribute('name');
            $response->getBody()->write("Hello, $name, I am sub App.");

            return $response;
        });

        $app->get('/app', function (Request $request, Response $response) {
            $response->getBody()->write("Hello, I am sub App.");

            return $response;
        });

        return $app;
    }
}