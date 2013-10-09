<?php

require(__DIR__ . '/vendor/autoload.php');

$app = new \Slim\Slim();
$app->config('templates.path', realpath(__DIR__ . '/views'));

$config = require(realpath(__DIR__)  . '/config.php');

/**
 * Autoloader for the app/ directory
 */
require(realpath(__DIR__) . '/app/autoloader.php');

/**
 * Loader of the ServiceLoader (app/Service)
 */
require(realpath(__DIR__) . '/app/service.php');

/**
 * Loader of the database handler
 */
require(realpath(__DIR__) . '/app/database.php');

/**
 * Loader of the routes (the actual application really)
 */
require(realpath(__DIR__) . '/app/routes.php');


$app->run();
