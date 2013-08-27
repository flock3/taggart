<?php
/**
 * taggart description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Service;


interface CacheInterface
{
    /**
     * @param string $name
     * @param mixed $value
     * @param int $ttl
     * @return mixed
     */
    public function set($name, $value, $ttl = 86400);

    /**
     * @param string $name
     * @return null|mixed
     */
    public function get($name);

    /**
     * @param string $name
     * @return bool
     */
    public function has($name);
}