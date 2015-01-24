<?php
	include 'conf.php';
	//global $hostname, $dbUser ,$dbPass, $dbName;
	$conn =  mysql_connect($hostname, $dbUser ,$dbPass) or die('Không kết nối được CSDL');
	//$conn =  mysql_connect($hostname, $dbUser ,$dbPass) or die(mysql_error());
	mysql_set_charset('utf8',$conn);
	mysql_select_db( $dbName, $conn);
?>