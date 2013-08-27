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
     * @param CacheInterface $cacheEngine
     */
    public function __construct(CacheInterface $cacheEngine)
    {
        $this->setCache($cacheEngine);
    }

    /**
     * @var CacheInterface $cache
     */
    protected $cache;

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


    /**
     * @param CacheInterface $cache
     * @return $this
     */
    public function setCache(CacheInterface $cache)
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @return CacheInterface
     */
    public function getCache()
    {
        return $this->cache;
    }
}