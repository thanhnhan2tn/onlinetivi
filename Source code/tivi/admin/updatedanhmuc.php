<?php
/* --1-----------------------
File UPDATE danh muc chứa các chức năng quản lý danh mục

Người viết: Trần Thị Cẩm Giang
MSSV: 1111390

----1------------------------*/

	session_start();
	if (!$_SESSION['admin_login']=='login_ed'){
		header('location: index.php');
	}else{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	 table, tr, td {
		outline: 1px solid #ccc;
		min-width: 100px;
	 }
</style>

</head>

<body>
<?php
	if (!$_SESSION['admin_login']=='login_ed'){
	header('location: index.php');
	}
	else{

	// ket noi CSDL		sau này dùng hàm  dbconnect(); và include file func.php vào thay cho code này
		include_once ('./../include/config.php');
		include ('./../include/db.php');
		include ('./../include/function.php');
		//	$conn = mysql_connect($hostname, $dbUser,$dbPass) or die (" Can not connect this database");
		//	mysql_select_db("dbName", $conn);
	
	//---------------------------------them danh muc-------------------------------------------//
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
			$sql = sprintf("insert into danhmuc(danhmuc_id,danhmuc_name,danhmuc_des,danhmuc_stt) values(NULL, '%s', '%s', '%d')",$name,$des,$stt);
			$query = mysql_query($sql) or die(mysql_error()); 
			if($query) 
						echo("<script>alert(\"Thành công!\");</script>");	
						echo "<script>window.history.back();</script>" ;										//tải lại trang sau khi cập nhật
	}
}  //#1
	
//================================xoa danh muc=====================//
if(isset($_REQUEST['action'])){	 
	if($_REQUEST['action']=='delcat'){ //#2
		$getxoa=addslashes($_REQUEST['catid']);
		if(count_sql('kenh',$getxoa)>0){  // đếm số kênh có trong danh mục
			echo '<script type="text/javascript">
				alert("Danh mục này có chứa kênh, bạn phải chuyển kênh sang danh mục trước khi xóa!");
				window.history.back();
			</script>';
		}else{

			$sql1 = sprintf("delete from danhmuc where danhmuc_id='%d'",$getxoa);
			$query1 = mysql_query($sql1) or die(mysql_error());
			echo("<script>alert(\"Danh mục đã xóa thành công!\");</script>");
			echo "<script>window.history.back();</script>" ;
		}
		}
} //#2=====================================sua danh muc=====================//
if(isset($_POST['edit'])){
		if($_POST["danhmuc_name"]==null || $_POST["danhmuc_des"]==null){  // $_POST viết in hoa
		echo("<script>alert(\"Bạn phải nhập đầy đủ thông tin!\");</script>");							// Câu thông báo nên dùng BOXDialog
		echo "<script>window.history.back();</script>" ;
		}
		elseif (strlen($_POST["danhmuc_stt"])>0 && preg_match("/(.*)[^0-9\s.](.*)/",$_POST["danhmuc_stt"])){									// kiêm tra STT nhập vào là số hay không.
				echo("<script>alert(\"Số thứ tự chỉ điền số!\");</script>");
				echo "<script>window.history.back();</script>" ;
		}
	else{
		$name=addslashes($_POST["danhmuc_name"]);	//danhmuc_id là tự động nên không cần thêm
		$des=addslashes($_POST["danhmuc_des"]);
		$stt=addslashes($_POST["danhmuc_stt"]);	
		$getid = addslashes($_POST["editid"]);	 
		}
	if($name && $des && $stt ){
		$sql3= sprintf("update danhmuc set danhmuc_name='%s', danhmuc_des='%s', danhmuc_stt='%d' where danhmuc_id='".$getid."'",$name,$des,$stt);
		$query3=mysql_query($sql3)  or die(mysql_error());
		if($query3){
			echo("<script>alert(\"Đã lưu thông tin!\");window.history.go(-2);</script>");
			
				}
		
		}
	
		
	}
	
        
	
} // end issset session


?>
</body>
</html>
<?php
}
?>