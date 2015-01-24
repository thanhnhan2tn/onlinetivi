<html>
<head>
<meta charset="UTF-8">
</head>
<?php
include_once '../include/config.php';
include_once '../include/function.php';
session_start();
if (!$_SESSION['admin_login']=='login_ed'){
	header('location: index.php');
}else{

	// ket noi CSDL		sau này dùng hàm  dbconnect(); và include file func.php vào thay cho code này
	
			$conn = mysql_connect($hostname, $dbUser,$dbPass) or die (" Can not connect this database");
			mysql_select_db("dbName", $conn);
	
	//----------------------------------------------------------------------------//
	if(isset($_POST["add"])){	//#1	$_POST in hoa, kiem tra người dung có bấm nút add chưa
		if($_POST["danhmuc_name"]==null || $_POST["danhmuc_des"]==null){  // $_POST viết in hoa
		echo("<script>alert(\"Bạn phải nhập đầy đủ thông tin!\");</script>");							// Câu thông báo nên dùng BOXDialog
		echo "<script>window.history.back();</script>" ;
		}
		elseif (strlen($_POST["danhmuc_stt"])>0 && preg_match("/(.*)[^0-9\s.](.*)/",$_POST["danhmuc_stt"])){									// kiêm tra STT nhập vào là số hay không.
				echo("<script>alert(\"Số thứ tự chỉ điền số!\");</script>");
				echo "<script>window.history.back();</script>" ;
		}
	else{
		$name=$_POST["danhmuc_name"];	//danhmuc_id là tự động nên không cần thêm
		$des=$_POST["danhmuc_des"];
		$_POST["danhmuc_stt"]!='' ? $stt=$_POST["danhmuc_stt"] : $stt=1;		//Nếu STT không xác định thì mặc định sẽ là 1
			$sql2 = "insert into danhmuc(danhmuc_id,danhmuc_name,danhmuc_des,danhmuc_stt) values(NULL, '".$name."', '".$des."', '".$stt."')";
			$query2 = mysql_query($sql2) or die(mysql_error()); 
			if($query2) echo("<script>alert(\"Thành công!\");</script>");	
				echo "<script>window.history.back();</script>" ;										//tải lại trang sau khi cập nhật
	}
}  //#1

}
?>