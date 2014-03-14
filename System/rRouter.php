<?php

class R
{
    public function urlphrase()
    {
        $url_part=APP_URL_PHRASE;
        $url_part_phase=substr($url_part,-1);
	$url_part_phase=='/'?$url_part=substr($url_part,0,strlen($url_part)-1):$url_part;
	$url_arr=explode("/",$url_part);
        return $url_arr;
    }
    public function route()
    {
        $route=array();
        $url_arr=$this->urlphrase();
        foreach($url_arr as $url_route => $route_name)
	{
            $route[]=$route_name;
	}
        $route=$this->ra($route);
	$group=I("group","group");
	$grouparr=array();
        $grouparr=explode(",",$group);
	if(!$route)
	{
	   header("Refresh:0;url=".APP_ROUTE_DEFAULT);
	   exit; 
	}
        if(!in_array($route[0],$grouparr))
        {
            echo $route[0]."群组不存在,请<a href=".APP_ROUTE_DEFAULT.">点击</a>返回首页<br /><h1>:) 3秒后自动返回<h1>";
	    header("Refresh:3;url=".APP_ROUTE_DEFAULT);
	    exit;
        }
	$c_name=$route[1].'_Action';
        $c_path='.'.DS.'Applications'.DS.$route[0].DS.'Action'.DS.$c_name.'.php';
        $fileExists = @file_get_contents($c_path, null, null, -1, 1) ? true : false;
	if($fileExists==1)
        {
            require($c_path);
        }else{
	    echo "系统错误,控制器路径".$c_path."<br />及其表现路由节点".$route[1]."不存在,请<a href=".APP_ROUTE_DEFAULT.">点击</a>返回首页<br /><h1>:) 3秒后自动返回<h1>";
            header("Refresh:3;url=".APP_ROUTE_DEFAULT);
	    exit;
        }
        if (!class_exists($c_name))
        {
            echo "系统错误,控制器".$c_name."必须存在,请<a href=".APP_ROUTE_DEFAULT.">点击</a>返回首页<br /><h1>:) 3秒后自动返回<h1>";
	    header("Refresh:3;url=".APP_ROUTE_DEFAULT);
	    exit;
	}else{
            $controller=new $c_name;
        }
        $class_methods = get_class_methods($c_name);
        
        if(!in_array($route[2],$class_methods))
        {
            echo "系统错误,控制器方法必须存在,请<a href=".APP_ROUTE_DEFAULT.">点击</a>返回首页<br /><h1>:) 3秒后自动返回<h1>";
	    header("Refresh:3;url=".APP_ROUTE_DEFAULT);
	    exit;
        }else{
            $controller->$route[2]();
        }
	
    }
    public function ra($route)
    {
	array_shift($route);
	array_shift($route);
	return $route;
    }
}
function R($dowhat)
{
    $router=new R();
    $router->$dowhat();
}
?>