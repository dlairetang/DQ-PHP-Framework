DQ_PHP_framework_v1.0
=====================

DQFramework V1.0 based on GPL

开发者:Dlairetang@gmail.com

DQ PHP Framework是一个轻量级为开发而开发的PHP框架,欢迎吐槽

DQ PHP Framework 基于MVC架构 

使用前请确定你的Apache服务器或者Nginx服务器 打开PHP PathInfo并且隐藏index.php

/config.php里配置PDO MySQL实现数据库连接

/res/config.xml设置项目名称 项目目录 项目控制器 项目动作 （自动生成）

1.使用全局模型I(resource,Node); 取res资源文件下的xml配置文件 例如新建一个menu.xml资源文件 取其中的节点active

利用I("menu","active"); 系统自行映射到menu.xml下的active子节点

2.控制器继承类M实现模板
模板使用的是smarty的模板机制,使用标签为<{}>
$this->assign(variable,value);
$this->display(templetes);
$this->display(templetes,folder);
模板存放在项目文件夹下的View文件夹里
一般不存在制定文件夹便设置为公用文件夹Public里边,设置文件夹就在View下自行新建一个文件夹即可
3.控制器继承类M继承数据模型
Select
select($table, $columns, $where)
table [string]
表的名称.
columns [string/array]
返回的字段列.
where (optional) [array]
WHERE 条件语句.
返回值: [array] 查询到的数组

Insert
insert($table, $data)
table [string]
表名.
data [array]
插入到表里的数据.
Return: [number] 返回插入的id

Update
update($table, $data, $where)
table [string]
表名.
data [array]
修改的数据.
where (optional) [array]
WHERE 条件.
Return: [number] 受影响的行数.

Delete
delete($table, $where)
table [string]
表名.
where [array]
WHERE 删除条件.
Return: [number] 返回被删除的行数.

Get
get($table, $columns, $where)
table [string]
表名.
columns [string/array]
返回的字段列.
where (optional) [array]
WHERE 条件.
Return: [string/array] 返回查询到的数据.

Has
has($table, $where)
table [string]
表名.
where [array]
WHERE 条件.
Return: [bool] 返回 TRUE 或者 FALSE.

Count
count($table, $where)
table [string]
表名.
where (optional) [array]
WHERE 条件.
Return: [number] 行的数量.

Max
max($table, $column, $where)
table [string]
表名.
column [string]
查询的字段列.
where (optional) [array]
WHERE 条件.
Return: [number] 返回最大的值.

Min
min($table, $column, $where)
table [string]
表名.
column [string]
需要查询的列.
where (optional) [array]
WHERE 条件.
Return: [number] 返回最小的值.

Avg
avg($table, $column, $where)
table [string]
表名.
column [string]
列字段
where (optional) [array]
WHERE 条件.
Return: [number] 平均值.

4.继承Boostrap和jquery方便制作网站
res/js res/style

5.动作内调用项目模型Applications/项目/Model/名字.class.php
$this->LoadModule(名字);
$this->instances(类名)->功能;

6.后续拓展性例如分页类、登陆类、以及各方面的类还在完善 等待2.0出现吧
