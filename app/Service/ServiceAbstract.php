<?php
namespace Service;

use Database\QueryBuilderHandler;

class ServiceAbstract
{
    /**
     * @var CacheInterface $cache
     */
    protected $cache;

    /**
     * @var array $config
     */
    protected $config;

    /**
     * @var QueryBuilderHandler
     */
    protected $databaseHandler;

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
     * getCache returns the cache from the object
     *
     * @return \Cache\CacheInterface
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * setDatabaseHandler sets the databaseHandler property in object storage
     *
     * @param \Database\QueryBuilderHandler $databaseHandler
     * @throws \InvalidArgumentException
     * @return ServiceAbstract
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

    public function getRepositoryPath()
    {
        $config = $this->getConfig();

        if(!array_key_exists('repositoryPath', $config))
        {
            throw new \RuntimeException(__METHOD__ . ' could not find the repository path in the configuration!');
        }

        return $config['repositoryPath'];
    }
}