<?php
//Client.php
function __autoload($class_name) {
	include $class_name . '.php';
}

class Client {
	function __construct() {
		$caption="Modigliani painted elongated faces.";
		$mo=new ConcreteClass();
		$mo->templateMethod("modig.png",$caption);
	}
}

$worker=new Client();