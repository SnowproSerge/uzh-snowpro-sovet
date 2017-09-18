<?php
/**
 * @author Sergey Naryshkin
 * @date: 12.08.17
 */

include_once('../config.php');

\Uzh\Snowpro\Core\ApplicationContext::init();
echo \Uzh\Snowpro\Core\ApplicationContext::getRequest()->getPath(),"<br>";
echo \Uzh\Snowpro\Core\ApplicationContext::getRequest()->getMethod(),"<br>";
echo print_r(\Uzh\Snowpro\Core\ApplicationContext::getRequest()->getParams(),true),"<br>";

