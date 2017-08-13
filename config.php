<?php
/**
 * Загрузка конфигурации
 *
 * Created by PhpStorm.
 * User: uzhass
 * Date: 26.08.16
 * Time: 10:06
 */

use Uzh\Snowpro\Core\Config\Config;

require_once 'vendor/autoload.php';
require_once 'secret_data.php';
date_default_timezone_set("Europe/Moscow");

$secret_data["SQL_DRIVER"] = "mysql";

Config::getConf()->loadConfig($secret_data);
