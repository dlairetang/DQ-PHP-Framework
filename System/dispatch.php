<?php
require('.\System\sys.php');
function mkdirs($dir)  
{  
if(!is_dir($dir))  
{  
if(!mkdirs(dirname($dir))){  
return false;  
}  
if(!mkdir($dir,0777)){  
return false;  
}  
}  
return true;  
}  
 if(!is_dir(".".DS."Applications".DS.APP_NAME)){
        mkdirs(".".DS."Applications".DS.APP_NAME.DS."Action");
		mkdirs(".".DS."Applications".DS.APP_NAME.DS."Model");
		mkdirs(".".DS."Applications".DS.APP_NAME.DS."View".DS."templates".DS."Public");
		$counter_file=".".DS."Applications".DS.APP_NAME.DS."Action".DS.I("config","routeaction")."_Action.php";
		$fopen=fopen($counter_file, 'wb');
		fputs($fopen, '<?php class '.I("config","routeaction").'_Action extends M{ public function index(){echo "欢迎使用DQFramework 333";} } ?>');
		fclose($fopen);
		R("route");
    }else{
		R("route");
    }

?>