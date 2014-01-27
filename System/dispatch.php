<?php
require('.'.DS.'System'.DS.'sys.php');
   function createFolder($path)
	 {
	  if (!file_exists($path))
	  {
	   createFolder(dirname($path));
	   mkdir($path, 0777);
	  }
	 }
 if(!is_dir(".".DS."Applications".DS.APP_NAME)){
        createFolder(".".DS."Applications".DS.APP_NAME.DS."Action");
		createFolder(".".DS."Applications".DS.APP_NAME.DS."Model");
		createFolder(".".DS."Applications".DS.APP_NAME.DS."View".DS."templates".DS."Public");
		$counter_file=".".DS."Applications".DS.APP_NAME.DS."Action".DS.I("config","routeaction")."_Action.php";
		$fopen=fopen($counter_file, 'wb');
		fputs($fopen, '<?php class '.I("config","routeaction").'_Action extends M{ public function '.I("config","routetarget").'(){echo "欢迎使用DQFramework 333";} } ?>');
		fclose($fopen);
		R("route");
    }else{
		R("route");
    }

?>