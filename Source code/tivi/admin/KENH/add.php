<html>
	<body>
		<?php
		$luong=$_POST["luong"];
		if($luong>1000){
			$conn = mysql_connect("localhost", "root", "") 
			or die("Could not connect: " . mysql_error());
			$db = mysql_select_db("nhapmon",$conn)
			or die("Could not select database");
			$sql = "insert into KENH_khuong(kenhid,kenhname,kenhmota,kenhstt) values(" .
			"'" . $_POST["kenhid"] . "'," .
			"'" . $_POST["kenhname"] . "'," .
			"'" . $_POST["kenhmota"] . "'," .
			"'" . $_POST["kenhstt"] .
			"')";
			$result = mysql_query($sql,$conn)
			or die("Could not insert into database");
			echo $sql . " success!";
			echo "Many thanks!</BR>";
			echo "<TABLE ";
			echo "<TR>
			<TH><a href=".'"view_KENH.php"'."> XEM DANH SÁCH KÊNH </a></TH>
			<TH><a href=".'"chon_chinhsua_KENH.php"'."> CHỈNH SỬA KÊNH </a></TH>
			<TH><a href=".'"chon_xoa_KENH.php"'."> XÓA KÊNH </a></TH>
			</TR> ";
	echo "</TABLE>";
			}
		else {
			echo "Nhập Kênh!";
			
		}
		?>
	</body>
</html>