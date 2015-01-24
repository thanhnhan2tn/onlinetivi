<html>

<body style = "background-color:#FAFAD2;">
<?php
$conn = mysql_connect("localhost", "root", "") 
	or die("Could not connect: " . mysql_error());
$db = mysql_select_db("nhapmon",$conn)
	or die("Could not select database");
	
$result = mysql_query("SELECT * FROM KENH_khuong",$conn);

echo "<h1 align=".">DANH SÁCH KÊNH</h1>";

echo "<TABLE BORDER = 1 ";
echo "<TR><TH> KÊNH ID</TH> <TH> TÊN KÊNH </TH>
		<TH> MÔ TẢ </TH> <TH> STT </TH> " ;

while ($row = mysql_fetch_array($result)) {
	echo "<TR>";
	echo "<TD> " . $row["kenhid"]. " </TD>";
	echo "<TD> " . $row["kenhname"]. " </TD>";
	echo "<TD> " . $row["kenhmota"] . " </TD>";
	echo "<TD> " . $row["kenhstt"]. " </TD>";
	echo "</TR>";
}
	echo "</TABLE>";
	echo "<TABLE ";
	echo "<TR>
	
    <TH><a href=".'"themKENH.html"'."> [ THÊM KÊNH ] </a></TH>
	<TH><a href=".'"chon_chinhsua_KENH.php"'."> [ CHỈNH SỬA KÊNH ] </a></TH>
	<TH><a href=".'"chon_xoa_KENH.php"'."> [ XÓA KÊNH ]</a></TH>

	</TR> ";
	echo "</TABLE>";
	
	echo "<a href=".'"JavaScript:window.print()"'."> In danh sách </a>";

?>
</body>
</html>

