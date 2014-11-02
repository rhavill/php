<?php
//Client.php
function __autoload($class_name) {
	include $class_name . '.php';
}

class Client {
	private $context;

	public function __construct() {
		$this->context=new Context();
		$this->context->doUp();
		$this->context->doRight();
		$this->context->doDown();
		echo "<br/>";
		$this->context->doDown();
		$this->context->doLeft();
		$this->context->doUp();
	}
}
$worker=new Client();