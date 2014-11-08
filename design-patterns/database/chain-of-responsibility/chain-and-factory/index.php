<?php
//index.php
//trigger file
//This file can be replaced by
//wrapping this code around
//Client class
function __autoload($class_name) {
	include $class_name . '.php';
}

$worker=new Client();