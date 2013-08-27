<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->config('templates.path', realpath(__DIR__ . '/views'));

$config = require(realpath(__DIR__ . '/config.php'));

require(realpath(__DIR__) . '/app/autoloader.php');
require(realpath(__DIR__) . '/app/service.php');
require(realpath(__DIR__) . '/app/routes.php');

$app->run();
