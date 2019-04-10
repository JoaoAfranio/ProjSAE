<?php
	function conecta(){
		$con = mysqli_connect(HOST, USER, PASS, BANCO);
		$con->set_charset("utf8");
		return $con;
	}
?>