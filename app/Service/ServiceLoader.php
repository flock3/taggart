<?php
/**
 * taggart description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Service;


class ServiceLoader
{
    /**
     * @var array $services
     */
    protected $services;

    /**
     * @param $serviceName
     * @return ServiceAbstract
     */
    public function get($serviceName)
    {
        if(array_key_exists($serviceName, $this->services))
        {
            return $this->services[$serviceName];
        }

        $service = new $serviceName; /* @var ServiceAbstract $service */

        $this->services[$serviceName] = $service;

        return $service;
    }
}