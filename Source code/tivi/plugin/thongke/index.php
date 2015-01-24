<!-- Shared SinhVienIT.Net -->
<html>
<head>
   <title>SinhVienIT.Net - demo thong ke...</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
#main {
	margin: auto;
	border: 1px solid #cccccc;
	width: 500px;
	background: #FF6600;
	font-family: Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size : 12px;
	}
#caption{
	font-family: Arial, Helvetica, sans-serif;
	font-weight:bold;
	margin:10px;
	font-size : 14px;
	color:#990000;
	}
#Statistics {
	margin: auto;
	border: 1px solid #cccccc;
	width: 500px;
	background: #66FF99;
	font-family: Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size : 12px;
	}
#copyright {
	margin: auto;
	border: 1px solid #cccccc;
	width: 500px;
	background: #66FF99;
	font-family: Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size : 12px;
	}
-->
</style>
</head>
<body background="img/bg.jpg" text="#FFFFFF">


		
		
		
		<table style="height:100%; width: 100%; text-align: center">
<tr><td style="padding-top:20">
	<div style="padding-top: 5px; padding-bottom: 5px;" id="statistics" align="center"><font color="green">
<?
$log_file="./info/active.txt";
if($users=="0"){ die("1 user online"); }
		$min_online="1";
		if ($HTTP_X_FORWARDED_FOR == "") 	{
		$ip = getenv(REMOTE_ADDR);
							}
else 	{
	$ip = getenv(HTTP_X_FORWARDED_FOR);
	}
		$day =date("d");
			$month =date("m");
			$year =date("Y");
			$date="$day-$month-$year";
			$ora = date("H");
			$minuti = date("i");
			$secondi = date("s");
			$time="$ora:$minuti:$secondi";
			$users_read = fopen("$log_file", "r");
			@$users = fread($users_read, filesize("$log_file"));
			fclose($users_read);
			$to_write="$ip|$time|$date";
			if($users==0){
			$user_write = fopen("$log_file", "w");
			fputs($user_write , $to_write );
			fclose($user_write );
	}
else	{	
			$users=explode("\n",$users);
			$user_da_tenere=array();
while (list ($key, $val) = each ($users)) {
			$user_sing=explode("|",$val);
			if($date==$user_sing[2]){
			$h=explode(":",$user_sing[1]);
			if($ip!=$user_sing[0]){
			if(($h[0]==$ora)and(($minuti-$h[1])<=$min_online)){
			$user_da_tenere[]=$val;}
			if(($h[0]==($ora-1))and((($minuti+2)-$h[1])<=$min_online)){
			$user_da_tenere[]=$val;
	}
		}
			}
 }
			$user_da_tenere[]=$to_write;
			$user_write = fopen("$log_file", "w");
fputs($user_write , "" );
fclose($user_write );
while (list ($k, $v) = each ($user_da_tenere)) {
	$new_file_log = fopen ("$log_file", "a");
fwrite($new_file_log,"$v\n");
fclose($new_file_log);
	}
		}
			$users_online_read = fopen("$log_file", "r");
			@$users_online = fread($users_online_read, filesize("$log_file"));
fclose($users_online_read);
	$users_online=explode("\n",$users_online);
	$n_u_online=count($users_online)-1;
	if (($n_u_online==0) || ($n_u_online=='0')) $n_u_online=1;
echo "Đang Online : <b><font color='red'>$n_u_online\n</font></b> ||   ";

?>
<? $CountFile = "./info/visited.log";
	$CF = fopen ($CountFile, "r");
	$Hits = fread ($CF, filesize ($CountFile) ); 
fclose ($CF);
   $Hits++;

	$CF = fopen ($CountFile, "w");
fwrite ($CF, $Hits);
fclose ($CF);
echo "Lượt Truy Cập: <b><font color='red'>$Hits\n</font></b>";

?>
</font></div>
	<div style="padding-top: 5px; padding-bottom: 5px;" id="copyright" align="center"><strong><font color="red">Copyright 2008 &copy; <a href="http://sinhvienit.net" style="text-decoration: none" target="_blank">SinhVienIT.Net</a> . All rights reserved</font></strong></div>
</td></tr>
</table>
		



</body>
</html>