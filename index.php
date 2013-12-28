<?php
/*
*@Author：DlaireTang
*@Contact：Dlairetang@gmail.com
*@CreateTime：2013/12/20
*@DQ PHP Framework 1.0
*/
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");
require('.\System\rLoader.php');//resourse loader page
require('.\System\config.php');//system config page

require('.\System\rRouter.php');//system router page
require('.\System\dispatch.php');//run router page
?>