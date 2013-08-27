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
    public function __construct(CacheInterface $cacheEngine, array $config)
    {
        $this->setCache($cacheEngine);
        $this->setConfig($config);
    }

    /**
     * @var CacheInterface $cache
     */
    protected $cache;

    /**
     * @var array $config
     */
    protected $config;

    /**
     * @var array $services
     */
    protected $services = array();

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

        $service->setCache($this->getCache());
        $service->setConfig($this->getConfig());

        $this->services[$serviceName] = $service;

        return $service;
    }

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
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