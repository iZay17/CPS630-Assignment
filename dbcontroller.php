<?php
class Connection {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "SCS";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectingdb();
	}
	
	function connectingdb() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>