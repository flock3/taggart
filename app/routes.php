<?php

/**
 * Repositories list
 */
$app->get('/', function() use($app, $serviceLoader)
{
    $repositoryService = $serviceLoader->get('Service\Repositories'); /* @var Cache\Repositories $repositoryService */

    $repositories = $repositoryService->getRepositoryList();
    $app->render('index.php', array('title' => 'LOL', 'repositories' => $repositories));
});