
		<?php
			$conn = mysql_connect("localhost", "root", "") 
			or die("Could not connect: " . mysql_error());
			$db = mysql_select_db("nhapmon",$conn)
			or die("Could not select database");
			
			$sql="Delete From KENH_khuong where kenhid = ". "'" . $_POST["kenhid"]."';";
						
			$result = mysql_query($sql,$conn)
			or die("Could not Update database");
			echo $sql . " success!";
			echo "Many thanks! </BR>";
			echo "<TABLE ";
			echo "<TR>
			<TH><a href=".'"view_KENH.php"'."> XEM DANH SÁCH KÊNH</a></TH>
			<TH><a href=".'"chon_chinhsua_KENH.php"'."> CHỈNH SỬA KÊNH </a></TH>
			<TH><a href=".'"themKENH.html"'."> THÊM KÊNH </a></TH>
			</TR> ";
	echo "</TABLE>";
		?>
