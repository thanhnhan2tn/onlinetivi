<?php
		$luong = $_POST['luong'];
		if($kenhname!='')
		{
			$conn = mysql_connect("localhost", "root", "") 
			or die("Could not connect: " . mysql_error());
			$db = mysql_select_db("nhapmon",$conn)
			or die("Could not select database");
			$sql="update KENH_khuong
				set kenhid = " .
				"'" . $_POST["kenhid"] . "',kenhname=" .
				"'" . $_POST["kenhname"] . "',kenhmota =" .
				"'" . $_POST["kenhmota"] . "',kenhstt=" .
				"'" . $_POST["kenhstt"].
			$result = mysql_query($sql,$conn)
			or die("Could not Update database");
			echo $sql . " success!";
			echo "Many thanks! </BR>";
			echo "<TABLE ";
			echo "<TR>
			<TH><a href=".'"view_KENH.php"'."> XEM DANH SÁCH KÊNH </a></TH>
			<TH><a href=".'"themKENH.html"'."> THÊM KÊNH </a></TH>
			<TH><a href=".'"chon_xoa_KENH.php"'."> XÓA KÊNH </a></TH>
			</TR> ";
	        echo "</TABLE>";
	}
	else 
	{
	echo "Nhập tên Kênh";
	}
		?>
