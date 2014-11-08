<?php
//DataUpdate.php
include_once('UniversalConnect.php');

class DataUpdate {
	private $tableMaster;
	private $hookup;
	private $sql;

	public function __construct() {
		$this->tableMaster="cms";
		$this->hookup=UniversalConnect::doConnect();
		if ( isset($_POST['dpUpdate'] ))
			$dpHeader=$this->hookup->real_escape_string($_POST['dpUpdate']);
		if ( $_POST['newData'] )
			$newData=$this->hookup->real_escape_string($_POST['newData']);
		$changeField="textBlock";
		$this->sql = "UPDATE $this->tableMaster SET $changeField='$newData'
		WHERE dpHeader='$dpHeader'";
		if ($result = $this->hookup->query($this->sql)) {
			echo "$changeField changed to:<br /> $newData";
		}
		else {
			echo "Change failed: " . $hookup->error;
		}
	}
}

$worker=new DataUpdate();