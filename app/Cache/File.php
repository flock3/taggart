<?php
/**
 * taggart description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Cache;


use Service\CacheInterface;

/**
 * Mad simple file cacher written in all of 10 minutes. Totally untested? No worries. I write code right the first time.
 * @package Cache
 *
 */
class File implements CacheInterface
{
    /**
     * Path to the cache files on this system
     * @var string $cachePath
     */
    protected $cachePath;

    /**
     * @param string $cachePath
     */
    public function __construct($cachePath)
    {
        $this->setCachePath($cachePath);
    }

    /**
     * get method accepts a string name and
     * @param string $name
     * @return mixed|null
     */
    public function get($name)
    {
        $file = $this->getCacheFile($name);

        if(is_null($file))
        {
            return null;
        }

        return $file['data'];
    }

    /**
     * set method accepts the name data and TTL of the entity
     * @param string $name
     * @param mixed $data
     * @param int $ttl
     * @return mixed|void
     */
    public function set($name, $data, $ttl = 86400)
    {
        $cacheFile = $this->getCacheFilePath($name);

        $fileData = array(
            'expires' => (time() + $ttl),
            'data' => $data,
        );

        file_put_contents($cacheFile, serialize($fileData));
    }

    /**
     * has accepts a name, opens the file if it exists and checks TTL
     * @param string $name
     * @return bool|null
     */
    public function has($name)
    {
        $file = $this->getCacheFile($name);

        if(is_null($file))
        {
            return null;
        }

        return ($file['expires'] > time());
    }

    /**
     * getCacheFile accepts a cache name and opens the file and returns the unserialized data within it.
     * @param $cacheName
     * @return mixed|null
     */
    protected function getCacheFile($cacheName)
    {
        if(!$this->cacheFileExists($cacheName))
        {
            return null;
        }

        $cache = unserialize(file_get_contents($this->getCacheFilePath($cacheName)));

        if($cache['expires'] < time())
        {
            unlink($this->getCacheFilePath($cacheName));
            return null;
        }

        return $cache;
    }

    /**
     * Confirms if the cache file exists or not.
     * @param $cacheName
     * @return bool
     */
    protected function cacheFileExists($cacheName)
    {
        return file_exists($this->getCacheFilePath($cacheName));
    }

    /**
     * returns the full path to the cache file
     * @param $cacheName
     * @return string
     */
    protected function getCacheFilePath($cacheName)
    {
        return $this->getCachePath() . '/' . $this->getFileCacheName($cacheName);
    }

    /**
     * returns the name of the cache file
     * @param $cacheName
     * @return string
     */
    protected function getFileCacheName($cacheName)
    {
        return hash('sha512', $cacheName);
    }

    /**
     * setCachePath sets the cachePath property in object storage
     *
     * @param string $cachePath
     * @throws \InvalidArgumentException
     * @return File
     */
    public function setCachePath($cachePath)
    {
        if (empty($cachePath))
        {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty cachePath');
        }
        $this->cachePath = $cachePath;
        return $this;
    }

    /**
     * getCachePath returns the cachePath from the object
     *
     * @return string
     */
    public function getCachePath()
    {
        return $this->cachePath;
    }
}