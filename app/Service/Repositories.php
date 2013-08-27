<?php
/**
 * taggart description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Service;

use RecursiveIteratorIterator, RecursiveDirectoryIterator;

class Repositories extends ServiceAbstract
{
    public function getRepositoryList()
    {
        $directories = new \DirectoryIterator($this->getRepositoryPath());

        $repositories = array();
        foreach($directories as $name => $fileInfo) /* @var \DirectoryIterator $fileInfo */
        {
            if(!$fileInfo->isDir() || $fileInfo->isDot())
            {
                continue;
            }


            $repositories[] = $fileInfo->getBasename();
        }

        return $repositories;
    }
}