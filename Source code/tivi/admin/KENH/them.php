<?php
	$conn = mysql_connect("localhost","root","") or die ("Khong ket noi duoc: ".mysql_error());
	$db = mysql_select_db("nhapmon",$conn) or die("Khong ket noi duoc csdl mydb");
	$kenhid = $_POST['txtkenhid'];
	$kenhname = $_POST['txtkenhname'];
	$kenhmota = $_POST['txtkenhmota'];
	$kenhstt = $_POST['txtkenhstt'];
	if($kenhname==''){echo "<script language='javascript'>alert('Chưa có nhập tên Kênh!');</script>";
	echo "<script language='javascript'>window.history.back();</script>";}
	else{
	$sql = "insert into NHANVIEN_khoi_linh values('$kenhid','$kenhname','$kenhmota','$kenhstt')";
	$query = mysql_query($sql,$conn);
	echo "<script language='javascript'>alert('Them kenh thanh cong!');</script>";
	echo "<TABLE ";
	echo "<TABLE BORDER = 1 ";
			echo "<TR>
			<TH><a href=".'"view_KENH.php"'."> XEM DANH SACH KENH </a></TH>
			<TH><a href=".'"chon_chinhsua_KENH.php"'."> CHINH SUA KENH </a></TH>
			<TH><a href=".'"chon_xoa_KENH.php"'."> XOA KENH </a></TH>
			</TR> ";
	echo "</TABLE>";
	}
?>