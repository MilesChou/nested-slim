<?php

require '../vendor/autoload.php';

$app = new Slim\App();
$app = \Nested\Sub\Factory::getApp($app);

$app->run();
