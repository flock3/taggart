<?php

/**
 * Repositories list
 */
$app->get('/', function() use($app, $serviceLoader)
{

    $app->render('index.php', array('title' => 'LOL'));
});