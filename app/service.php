<?php

$cacheEngine = new Cache\File($config['cacheDir']);

$serviceLoader = new Service\ServiceLoader($cacheEngine);

