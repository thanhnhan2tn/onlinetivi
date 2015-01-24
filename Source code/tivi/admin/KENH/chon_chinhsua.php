<html>
	<body style = "background-color:#FAFAD2;">
	<h1 align="left">CHỈNH SỬA NHÂN VIÊN</h1>
	<form method="post" action="index_nhanvien.php"> <br>
<?php
$conn = mysql_connect("localhost", "root", "") 
	or die("Could not connect: " . mysql_error());
$db = mysql_select_db("nhapmon",$conn)
	or die("Could not select database");
	
$result = mysql_query("SELECT * FROM NHANVIEN_khoi_linh",$conn);

echo "<TABLE BORDER = 1 ";
echo "<TR><TH> MANV</TH> <TH> HO TEN </TH>
		<TH> NAM SINH </TH> <TH> GIOI TINH</TH> <TH> MADV </TH>
		<TH> MACV </TH> <TH> LUONG</TH> </TR>" ;

while ($row = mysql_fetch_array($result)) {
	echo "<TR>";
	echo "<TD> <input type=".'"radio"'." name= manv value=". $row["manv"].">". $row["manv"]."</TD>";
	echo "<TD> " . $row["hoten"]. " </TD>"; 
	echo "<TD> " . $row["namsinh"] . " </TD>";
	echo "<TD> " . $row["gioitinh"]. " </TD>";
	echo "<TD> " . $row["madv"]. " </TD>"; 
	echo "<TD> " . $row["macv"] . " </TD>";
	echo "<TD> " . $row["luong"] . " </TD>";
	echo "</TR>";
}
	echo "</TABLE>";
	echo "<input type=".'"submit"'." value=".'"Chinh Sua"'.">";

?>
</body>
</html>

