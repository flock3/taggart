<?php
/**
 * taggart description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

if(!array_key_exists('database', $config))
{
    throw new RuntimeException('There is no key called database in the configuration. Have you copied the dist?');
}

$pixieConnection = new \Pixie\Connection('mysql', $config['database']);

$databaseHandler = new \Database\QueryBuilderHandler($pixieConnection);

