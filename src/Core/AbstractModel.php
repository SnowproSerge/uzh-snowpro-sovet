<?php
/**
 * @author Sergey Naryshkin
 * Date: 19.01.2018 20:13
 */

namespace Uzh\Snowpro\Core;


use Uzh\Snowpro\Core\Data\DbConnection;

abstract class AbstractModel
{
    /** @var DbConnection */
    private $dbConnection;

    /**
     * AbstractModel constructor.
     * @param DbConnection $dbConnection
     */
    public function __construct(DbConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}