<?php
/*
*@class readxml
*@读取res folder资源配置文件节点
*@return $mName =>{string}
*/
class readxml {
    private $xmlfiles;
    function __construct($xmlfiles){
        $this->xmlfiles=".".DS."res".DS.$xmlfiles.".xml";
    }
    public function getnode($name){
    $xml = simplexml_load_file($this->xmlfiles);
    $mName=$xml->$name;
    return $mName;
    }
}
/*
*@method I 
*@整合读取readxml类,让读取资源配置xml文件一目了然
*@return $response =>{string}
*/
function I($xmlfiles,$node)
{
    $res=new readxml($xmlfiles);
    $response=$res->getnode($node);
    return $response;
}
?>