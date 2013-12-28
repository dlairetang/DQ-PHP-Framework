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
        $c_name=$route[0].'_Action';
        $c_path='.'.DS.'Applications'.DS.APP_NAME.DS.'Action'.DS.$c_name.'.php';
        $fileExists = @file_get_contents($c_path, null, null, -1, 1) ? true : false;
	if($fileExists==1)
        {
            require($c_path);
        }else{
            header("location: ".APP_ROUTE_DEFAULT);
        }
        if (!class_exists($c_name))
        {
            die("系统错误,控制器".$c_name."必须存在,请<a href=/index/index/>点击</a>返回首页");
	}else{
            $controller=new $c_name;
        }
        $class_methods = get_class_methods($c_name);
        
        if(!in_array($route[1],$class_methods))
        {
            die("系统错误,控制器方法必须存在,请<a href=/index/index/>点击</a>返回首页");
        }else{
            $controller->$route[1]();
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