<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

include_once('../config.php');

\Uzh\Snowpro\Core\ApplicationContext::init();
echo \Uzh\Snowpro\Core\ApplicationContext::getInstance()->getRequest()->getPath(),"<br>";
echo \Uzh\Snowpro\Core\ApplicationContext::getInstance()->getRequest()->getUri(),"<br>";

