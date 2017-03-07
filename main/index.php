<?php

require '../vendor/autoload.php';

$app = new Slim\App();
$app = \Nested\Main\Factory::getApp($app);

$app->run();
