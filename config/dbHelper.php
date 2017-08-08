<?php

	function dbConnect(){
		require_once dirname(__FILE__)."./dbConfig.php";

		static $conn;
	if($conn == null){
			$conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
		}

		if($conn->connect_error){
			return false;
		}
		return $conn;
	}
?>