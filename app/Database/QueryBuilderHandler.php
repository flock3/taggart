<?php
/**
 * taggart description
 * 
 * @author Thomas Gray <thomas.gray@randomstorm.com>
 * @package 
 * @subpackage 
 */

namespace Database;


use Pixie\Connection, Pixie\QueryBuilder\QueryBuilderHandler as PixieHandler;

class QueryBuilderHandler
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @todo change Pixie QB so that it's interfaces are testable as Connection cannot be anything but inheritance mocked
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->setConnection($connection);
    }

    /**
     * @return PixieHandler
     */
    public function getQueryBuilder()
    {
        return $this->getConnection()->getQueryBuilder();
    }

    /**
     * setConnection sets the connection property in object storage
     *
     * @param \Pixie\Connection $connection
     * @throws \InvalidArgumentException
     * @return QueryBuilderHandler
     */
    public function setConnection($connection)
    {
        if (empty($connection))
        {
            throw new \InvalidArgumentException(__METHOD__ . ' cannot accept an empty connection');
        }
        $this->connection = $connection;
        return $this;
    }

    /**
     * getConnection returns the connection from the object
     *
     * @return \Pixie\Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}