<?php
	//include_once './../../include/function.php';
	include_once './../../include/config.php';
	include_once './../../include/db.php';
	

	$conn =  mysql_connect($hostname, $dbUser ,$dbPass) or die(mysql_error());
	mysql_set_charset('utf8',$conn);
	mysql_select_db('$dbName');
	$sqls='SELECT kenh_name,kenh_des FROM kenh';
	$querys= mysql_query($sqls);
	$aUsers = array();
	$aInfo = array();
	$i=0;
	while($temp = mysql_fetch_array($querys)){
		$aUsers[$i] = $temp[0];
		$aInfo[$i] = $temp[1];
		
	$i++;
	}
	if(isset($_GET['input'])){
	$input = $_GET['input'];
	$len = strlen($input);
	
	
	$aResults = array();
	
	if ($len)
	{
		for ($i=0;$i<count($aUsers);$i++)
		{
			// had to use utf_decode, here
			// not necessary if the results are coming from mysql
			//
			if (strtolower(substr(utf8_decode($aUsers[$i]),0,$len)) == $input)
				$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($aUsers[$i]), "info"=>htmlspecialchars($aInfo[$i]) );
			
			//if (stripos(utf8_decode($aUsers[$i]), $input) !== false)
			//	$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($aUsers[$i]), "info"=>htmlspecialchars($aInfo[$i]) );
		}
		for ($i=0;$i<count($aInfo);$i++)
		{
			// had to use utf_decode, here
			// not necessary if the results are coming from mysql
			//
			if (strtolower(substr(utf8_decode($aInfo[$i]),0,$len)) == $input)
				$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($aInfo[$i]), "info"=>htmlspecialchars($aUsers[$i]) );
			
			//if (stripos(utf8_decode($aUsers[$i]), $input) !== false)
			//	$aResults[] = array( "id"=>($i+1) ,"value"=>htmlspecialchars($aUsers[$i]), "info"=>htmlspecialchars($aInfo[$i]) );
		}
	}
	
	header("Content-Type: text/xml");

		echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><results>";
		for ($i=0;$i<count($aResults);$i++)
		{
			echo "<rs id=\"".$aResults[$i]['id']."\" info=\"".$aResults[$i]['info']."\">".$aResults[$i]['value']."</rs>";
		}
		echo "</results>";
	}
	
?>