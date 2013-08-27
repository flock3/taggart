<?php

spl_autoload_register(function($className)
{
    $baseAutoloadPath = realpath(__DIR__);

    $classPath = str_replace(array('\\', '_'), DIRECTORY_SEPARATOR, $className);

    $fileName = $baseAutoloadPath . '/' . $classPath . '.php';

    require_once($fileName);
});