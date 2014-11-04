<?php
include_once('UniversalConnect.php');

class CreateTable {
	private $tableMaster;
	private $hookup;

	public function __construct() {
		$this->tableMaster="proxyLog";
		$this->hookup=UniversalConnect::doConnect();
		$drop = "DROP TABLE IF EXISTS $this->tableMaster";
		if($this->hookup->query($drop) === true) {
			printf("Old table %s has been dropped.<br/>\n",$this->tableMaster);
		}
		$sql = "CREATE TABLE {$this->tableMaster} (uname NVARCHAR(15),
		pw NVARCHAR(120))";
		if($this->hookup->query($sql) === true) {
			echo "Table $this->tableMaster has been created successfully.<br/>\n";
		} else {
			echo "Error: " . mysqli_error($this->hookup) . "<br/>\n";
		}
		$this->hookup->close();
	}
}
$worker=new CreateTable();