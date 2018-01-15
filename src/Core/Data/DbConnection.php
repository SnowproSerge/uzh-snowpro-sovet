<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 09.11.2016
 * Time: 19:40
 */

namespace Uzh\Snowpro\Core\Data;

/**
 * todo: отделить получение данных из конфига (в конструктор) от инициализации соъединения ( в отдельный метод)
 *
 * Class DbUzh
 * @package Uzh\Snowpro\Db
 */

use Uzh\Snowpro\Core\Config\Config;

class DbConnection
{
    const F_ONE = "fetchColumn";
    const F_ONE_ROW = "fetch";
    const F_ALL = "fetchAll";
    const EXEC = "fetch";

    private $_Pdo;


    public function __construct()
    {
        $dsn = Config::getConf()->SQL_DRIVER . ":dbname=" . Config::getConf()->SQL_SCHEMA . ";host=" . Config::getConf()->SQL_HOST . ";port=" . Config::getConf()->SQL_POST.";charset=utf8";
        try {
            $this->_Pdo = new \PDO($dsn, Config::getConf()->SQL_USER, Config::getConf()->SQL_PASS, [\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT]);
        } catch (\PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    protected function _execute($query, $param)
    {
        $sth = $this->_Pdo->prepare($query);
        foreach ($param as $key => &$val) {
            $sth->bindParam($key, $val);
        }

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
    public function selectAll($query, $param=[])
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
    public function selectOneRow($query, $param=[])
    {
        return $this->_select($query,$param,self::F_ONE_ROW);
    }

    /**
     * @param $query
     * @param array $param
     * @return mixed
     */
    public function selectOne($query, $param=[])
    {
        return $this->_select($query,$param,self::F_ONE);
    }

    /**
     * @param $query
     * @param $param
     * @return mixed
     */
    public function execute($query, $param)
    {
        return $this->_select($query,$param,self::EXEC);
    }

    /**
     *   Добавляет в таблицу запись
     * @param $tablename string - Имя таблицы
     * @param $param array - ассоциативный массив с индексами соответствующими именам полей
     * @return null|string
     */
    public function insert($tablename, $param)
    {
         if(!is_array($param) && !count($param)) return null;
         $i =true;
        $vals = array_keys($param);
        $names = $value = "";
         foreach ($vals as $val) {
             if($i) {
                 $i = false;
                 $names = " ".$val;
                 $value = " :".$val;
             } else {
                 $names .= ", ".$val;
                 $value .= ", :".$val."";
             }
         }
         $query = "INSERT INTO ".$tablename." (".$names.") VALUES (".$value.")";
         $sth = $this->_execute($query, $param);
  //      $this->_Pdo->exec("COMMIT;");
        return $this->_Pdo->lastInsertId();
    }
}