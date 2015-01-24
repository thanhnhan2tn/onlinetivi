<html>
	<body style = "background-color:#FAFAD2;">
	<h1 align="left">XOÁ KÊNH</h1>
	<form method="post" action="delete_kenh.php"> <br>
<?php
$conn = mysql_connect("localhost", "root", "") 
	or die("Could not connect: " . mysql_error());
$db = mysql_select_db("nhapmon",$conn)
	or die("Could not select database");
	
$result = mysql_query("SELECT * FROM KENH_khuong",$conn);


echo "<TABLE BORDER = 1 ";
echo "<TR><TH> KENH ID</TH> <TH> TEN KENH </TH>
		<TH> MO TA </TH> <TH> STT</TH></TR>" ;
while ($row = mysql_fetch_array($result)) {
	echo "<TR>";
	echo "<TD> <input type=".'"radio"'." name= kenhid value=". $row["kenhid"].">". $row["kenhid"]."</TD>";
	echo "<TD> " . $row["kenhid"]. " </TD>"; 
	echo "<TD> " . $row["kenhname"] . " </TD>";
	echo "<TD> " . $row["kenhmota"]. " </TD>";
	echo "<TD> " . $row["kenhstt"]. " </TD>"; 
	echo "</TR>";
}
	echo "</TABLE>";
	echo "<input type=".'"submit"'." value=".'"Xoa"'.">";

?>
</body>
</html>

