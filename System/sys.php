<?php
session_start();
/*
*@模板类继承PDO-MySQL类,让控制器更方便调用
*@模板类可按照需求进行拓展相应底包功能
**/
require('.\System\pdo\pdo.class.php');
require('.\System\mb\libs\Smarty.class.php');
class M extends D
{
    public $tpl=NULL;
    public $database=NULL;
    function __construct()
    {
        $this->tpl = new Smarty;
        $this->tpl->compile_dir = ".".DS."cache".DS."compile";
        $this->tpl->force_compile = true;
        $this->tpl->debugging = false;
        $this->tpl->caching = true;
        $this->tpl->cache_dir = ".".DS."cache".DS."cache";
        $this->tpl->cache_lifetime = 100;
        $this->database=new D(array(
        'database_type' => APP_DATABASE_TYPE,
	'database_name' => APP_DATABASE_NAME,
	'server' => APP_DATABASE_SERVER,
	'username' => APP_DATABASE_USER,
	'password' => APP_DATABASE_PASSWORD,
	'charset' => 'utf8'
        ));
        return $this;
    }
    public function instances($class)
    {
	return new $class;
    }
    public function LoadModule($model)
    {
	require("./Applications/".APP_NAME."/Model/".$model.".class.php");
    }
	public function SysLM($addons)
	{
	require("./System/addons/".$addons.".addons.php");
	}
	public function Sysinstances($class)
	{
	return new $class.'Addons';
	}
    public function assign($what,$target)
    {
        $this->tpl->assign($what,$target);
        return $this;
    }
    public function display($what,$list='Public')
    {
        $this->tpl->template_dir = ".".DS."Applications".DS.APP_NAME.DS."View".DS."templates".DS.$list;
        $this->tpl->display($what);
        return $this;
    }
    public function insert($table='',$data='')
    {
	$callback=$this->database->insert($table,$data);
	return $callback;
    }
    public function update($table='',$data='',$where='')
    {
	$callback=$this->database->update($table,$data,$where);
	return $callback;
    }
    public function select($table='',$columns='',$where='')
    {
        $select=$this->database->select($table,$columns,$where);
        return $select;
    }
    public function delete($table='',$where='')
    {
	$delete=$this->database->delete($table,$where);
	return $delete;
    }
    public function get($table='', $columns='', $where='')
    {
	$callback=$this->database->get($table, $columns, $where);
	return $callback;
    }
    public function has($table='', $where='')
    {
	$bool=$this->database->has($table, $where);
	return $bool;
    }
    public function count($table='', $where='')
    {
	$count=$this->database->count($table, $where);
	return $count;
    }
    public function max($table='', $column='', $where='')
    {
	$max=$this->database->max($table, $column, $where);
	return $max;
    }
    public function min($table='', $column='', $where='')
    {
	$min=$this->database->min($table, $column, $where);
	return $min;
    }
    public function avg($table='', $column='', $where='')
    {
	$avg=$this->database->avg($table,$column,$where);
	return $avg;
    }
    public function error()
    {
        $response=$this->database->error();
        return $response;
    }
    public function info()
    {
        $info=$this->database->info();
        return $info;
    }
}
?>