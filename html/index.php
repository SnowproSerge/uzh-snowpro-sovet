<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

include_once('../config.php');

\Uzh\Snowpro\Core\ApplicationContext::init();
echo "<h1>";
echo \Uzh\Snowpro\Core\ApplicationContext::getInstance()->getRequest()->getPath();

echo "</h1>";
phpinfo();