<?php
namespace Service;

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
     * @return \Service\CacheInterface
     */
    public function getCache()
    {
        return $this->cache;
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