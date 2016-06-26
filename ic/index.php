<?php
define('ROOT_DIR', dirname(__FILE__));
	$p=isset($_GET['p'])?$_GET['p']:'front';
	$c=isset($_GET['c'])?$_GET['c']:'One';
	$a=isset($_GET['a'])?$_GET['a']:'one';
	$controller_name=$c.'Controller';
	$action_name=$a.'Action';
	$controller=new $controller_name;
	$controller->$action_name();
function __autoload($class_name){
	$map=array(
		'MySQLDB'=>'./framework/MySQLDB.class.php',
		'Model'=>'./framework/Model.class.php'
		);
	if (isset($map[$class_name])) {
		require $map[$class_name];
	}elseif (substr($class_name, -10)=='Controller') {
			require './app/controller'.'/'.$GLOBALS['p'].'/'.$class_name.'.class.php';
	}elseif (substr($class_name, -5)=='Model') {
		require './app/model'.'/'.$class_name.'class.php';
	}
}