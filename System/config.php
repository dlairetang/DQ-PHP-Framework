<?php
define("APP_TITLE",I("config","appname"));
define("APP_NAME", I("config","appdirectory"));
define("APP_ROUTE_DEFAULT","/".I("config","appdirectory")."/".I("config","routeaction")."/".I("config","routetarget")."/");
define("APP_URL_PHRASE", $_SERVER['PHP_SELF']);
define("APP_DOMAIN","http://".$_SERVER['SERVER_NAME']);
/*
*@必填写的项目，PDOSQL
**/
define("APP_SQL_STT","off");
define("APP_DATABASE_NAME","");
define("APP_DATABASE_TYPE","mysql");
define("APP_DATABASE_SERVER","localhost");
define("APP_DATABASE_USER","root");
define("APP_DATABASE_PASSWORD","");
/*
*@Over必填写的项目，PDOSQL
**/
?>
