<?php

$cacheEngine = new Cache\File($config['cacheDir']);

$serviceLoader = new Service\ServiceLoader($databaseHandler, $cacheEngine, $config);

