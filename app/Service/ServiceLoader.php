<?php
/**
 * taggart description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Service;


use Database\QueryBuilderHandler;

class ServiceLoader
{
    /**
     * @param CacheInterface $cacheEngine
     */
    public function __construct(QueryBuilderHandler $databaseHandler, CacheInterface $cacheEngine, array $config)
    {
        $this->setDatabaseHandler($databaseHandler);
        $this->setCache($cacheEngine);
        $this->setConfig($config);
    }

    /**
     * @var QueryBuilderHandler
     */
    protected $databaseHandler;

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

        if($service instanceof ServiceAbstract)
        {
            $service->setCache($this->getCache());
            $service->setConfig($this->getConfig());
            $service->setDatabaseHandler($this->getDatabaseHandler());
        }

        $this->services[$serviceName] = $service;

        return $service;
    }

    /**
     * setDatabaseHandler sets the databaseHandler property in object storage
     *
     * @param \Database\QueryBuilderHandler $databaseHandler
     * @throws \InvalidArgumentException
     * @return ServiceLoader
     */
    public function setDatabaseHandler($databaseHandler)
    {
        if (empty($databaseHandler))
        {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty databaseHandler');
        }
        $this->databaseHandler = $databaseHandler;
        return $this;
    }

    /**
     * getDatabaseHandler returns the databaseHandler from the object
     *
     * @return \Database\QueryBuilderHandler
     */
    public function getDatabaseHandler()
    {
        return $this->databaseHandler;
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