<?php
/*
*@Author：DlaireTang
*@Contact：Dlairetang@gmail.com
*@CreateTime：2014/03/15
*@DQ PHP Framework 1.4
*/
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");
define("DS",DIRECTORY_SEPARATOR);
require('.'.DS.'System'.DS.'rLoader.php');//resourse loader page
require('.'.DS.'System'.DS.'config.php');//system config page
require('.'.DS.'System'.DS.'rRouter.php');//system router page
require('.'.DS.'System'.DS.'dispatch.php');//run router page
?>