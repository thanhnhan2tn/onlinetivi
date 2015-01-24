
<html>
	<body style = "background-color:#FAFAD2;">
	<h1 align="center">CHỈNH SỬA KÊNH</h1>
	<form method="post" action="update_KENH.php"> <br>
<?php
include_once 'config.php';
include_once 'function.php';
$sql = "SELECT * FROM kenh where kenh_id =". $_POST["kenhid"];
$result = mysql_query($sql,$conn);

echo "<TABLE BORDER = 1 ";
echo "<TR><TH> KÊNH ID</TH> <TH> TÊN KÊNH </TH>
		<TH> MÔ TẢ </TH> <TH> STT</TH> 
		</TR>" ;

while ($row = mysql_fetch_array($result)) {
	echo "<TR>";
	echo "<TD> <select name=".'"kenhid"'.">
		<option value=". $row["kenhid"].">". $row["kenhid"].
	"</select></TD>";
	echo "<TD> <input type=".'"text"'." name= kenhname size= 30 value=". $row["kenhname"]."></TD>";
	echo "<TD> <input type=".'"text"'." name= kenhmota size= 10 value=". $row["kenhmota"]."></TD>";	
	echo "<TD> <input type=".'"text"'." name= kenhstt size= 10 value=". $row["kenhstt"]."></TD>";	
	echo "</TR>";
}
	echo "</TABLE>";
	echo "<input type=".'"submit"'." value=".'"xong"'.">";
?>
</body>
</html>

