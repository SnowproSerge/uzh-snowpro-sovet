<?php
/**
 * @author Sergey Naryshkin
 * Date: 21.01.2018 9:07
 */

namespace Uzh\Snowpro\Core\Data;
use Monolog\Logger;

/**
 *
 * Singleton
 * Class RepositoryManager
 * @package Uzh\Snowpro\Core\Data
 */
class RepositoryManager
{
    /** @var RepositoryManager */
    private static $instance;
    /** @var AbstractRepository[] */
    private $buffer;
    /** @var DbConnection */
    private $connect;
    /** @var Logger */
    private $logger;

    /**
     * RepositoryManager constructor.
     * @param $connect DbConnection
     * @param $logger Logger
     */
    private function __construct($connect,$logger)
    {
        $this->buffer = [];
        $this->connect = $connect;
        $this->logger = $logger;
    }

    /**
     * @param $connect
     * @param $logger
     * @return RepositoryManager
     */
    public static function init($connect,$logger): self
    {
        self::$instance = new self($connect,$logger);
        return self::$instance;
    }

    /**
     * @param $class string
     * @return AbstractRepository
     */
    public function getRepo($class): AbstractRepository
    {
        if(!isset($this->buffer[$class])) {
            try {
                $this->buffer[$class] = new $class($this->connect);
            } catch (\Exception $e) {
                $this->logger->addError('Unable create class '.$class .' : '.$e->getMessage() . $e->getTraceAsString());
            }
        }
        return $this->buffer[$class];
    }


    /**
     * @param $class
     * @return AbstractRepository
     */
    public static function getRepository($class): AbstractRepository
    {
        return self::$instance->getRepo($class);
    }
}