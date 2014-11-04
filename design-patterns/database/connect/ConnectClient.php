<?php
include_once('UniversalConnect.php');

class ConnectClient {
	private $hookup;
	public function __construct() {
		//One line for entire connection operation
		$this->hookup=UniversalConnect::doConnect();
	}
}
$worker=new ConnectClient();