<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 09.11.2016
 * Time: 19:40
 */

namespace Uzh\Snowpro\Core\Data;
use PDO;

/**
 * todo: отделить получение данных из конфига (в конструктор) от инициализации соъединения ( в отдельный метод)
 *
 * Class DbUzh
 * @package Uzh\Snowpro\Db
 */


class DbConnection
{
    public const F_ONE = 'fetchColumn';
    public const F_ONE_ROW = 'fetch';
    public const F_ALL = 'fetchAll';
    public const EXEC = 'fetch';

    private $_Pdo;


    /**
     * DbConnection constructor.
     * @param $config array
     */
    public function __construct($config)
    {

        $dsn = $config['SQL_DRIVER'] . ':dbname=' . $config['SQL_SCHEMA'] . ';host=' . $config['SQL_HOST'] . ';port=' . $config['SQL_POST']. ';charset=utf8';
        try {
            $this->_Pdo = new \PDO($dsn, $config['SQL_USER'], $config['SQL_PASS'], [\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT]);
        } catch (\PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
            echo $e->getTraceAsString();
            var_dump($config);
        }
    }

    protected function _execute($query,array $param): \PDOStatement
    {
        $sth = $this->_Pdo->prepare($query);
        foreach ($param as $key => &$val) {
            $sth->bindParam($key, $val);
        }
        unset($val);
        @$sth->execute();
        return $sth;
    }

    protected function _select($query, $param, $function)
    {
        $sth = $this->_execute($query, $param);
        $ret = $sth->$function();
        $sth->closeCursor();
        return $ret;
    }

    /**
     * Вернуть массив строк выполнения SELECT
     *
     * @param $query
     * @param array $param
     * @return mixed
     */
    public function selectAll($query, array $param = [])
    {
        return $this->_select($query,$param,self::F_ALL);
    }

    /**
     * Вернуть одну строка в виде ассоциативного массива
     *
     * @param $query
     * @param array $param
     * @return mixed
     */
    public function selectOneRow($query, array $param = [])
    {
        return $this->_select($query,$param,self::F_ONE_ROW);
    }

    /**
     * @param $query
     * @param array $param
     * @return mixed
     */
    public function selectOne($query, array $param = [])
    {
        return $this->_select($query,$param,self::F_ONE);
    }

    /**
     * @param $query
     * @param $param
     * @return mixed
     */
    public function execute($query,array $param)
    {
        return $this->_select($query,$param,self::EXEC);
    }

    /**
     *   Добавляет в таблицу запись
     * @param $tableName string - Имя таблицы
     * @param $param array - ассоциативный массив с индексами соответствующими именам полей
     * @return null|string
     */
    public function insert($tableName, array $param): ?string
    {
         if(!\is_array($param) && !\count($param)) {
             return null;
         }
         $i =true;
        $vals = array_keys($param);
        $names = $value = '';
         foreach ($vals as $val) {
             if($i) {
                 $i = false;
                 $names = ' ' .$val;
                 $value = ' :' .$val;
             } else {
                 $names .= ', ' .$val;
                 $value .= ', :' .$val. '';
             }
         }
         $query = 'INSERT INTO ' .$tableName. ' (' .$names. ') VALUES (' .$value. ')';
         $this->_execute($query, $param);
        return $this->_Pdo->lastInsertId();
    }

    public function select($query,array $param, $class): array
    {
        $sth = $this->_execute($query, $param);
        $ret = $sth->fetchAll(PDO::FETCH_CLASS, $class);
        $sth->closeCursor();
        return $ret;
    }
}