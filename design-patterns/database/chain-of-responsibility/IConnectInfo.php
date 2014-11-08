<?php
//Filename: IConnectInfo.php
interface IConnectInfo {
	const HOST ="localhost";
	const UNAME ="root";
	const PW ="password";
	const DBNAME = "test";
	public function doConnect();
}