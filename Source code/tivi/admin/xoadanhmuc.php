<?php

	include_once ('./../include/config.php');
	include ('./../include/db.php');
	//include ('./../include/function.php');
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
<script type="text/javascript">
	function delconfirm(){
    var del = confirm("Bạn có muốn xóa danh mục này không?");
    return del;
}
</script>

</head>

<body>

<?php

	// ket noi CSDL		sau này dùng hàm  dbconnect(); và include file func.php vào thay cho code này
	
			$conn = mysql_connect($hostname, $dbUser,$dbPass) or die (" Can not connect this database");
			mysql_select_db("dbName", $conn);
	
	//----------------------------------------------------------------------------//
	if($_REQUEST['action']=='xoa'){
		$sql = 'delete from danhmuc where danhmuc_id='.$_REQUEST["catid"];
		$query = mysql_query($sql) or die(mysql_error());
		echo("<script>alert(\"Danh mục đã xóa thành công!\");</script>");
		echo "<script>window.history.back();</script>" ;
		}
	

	elseif($_REQUEST['action']=='sua'){
	$getsua=$_REQUEST['catid'];
	$sql2='select danhmuc_name, danhmuc_des, danhmuc_stt from danhmuc where danhmuc_id='.$getsua;
	$query2=mysql_query($sql2) or die(mysql_error());
	$row=mysql_fetch_array($query2);
?>


<form action="xoadanhmuc.php?catid=<?=$getsua?>" method="post">
        Đặt lại Danh Mục mới :<br /> 
    	Tên Danh Mục : <input type="text" name="danhmuc_name" value="<?=$row['danhmuc_name'] ?>" size="50" /> <br/>  
    	Mô tả Danh Mục : <input type="text" name="danhmuc_des" value="<?=$row['danhmuc_des'] ?>" size="50" /> <br/>
    	Số thứ tự Danh Mục : <input type="text" name="danhmuc_stt" value="<?=$row['danhmuc_stt'] ?>"  size="10"/> <br/>
    <input type="submit" name="edit" value="Edit" />
 </form>
<?php
//bo dau ngoac }


if(isset($_POST['edit'] ) ){	
			if($_POST["danhmuc_name"]==null || $_POST["danhmuc_des"]==null || $_POST["danhmuc_stt"]==null){ 
				echo("<script>alert(\"Bạn phải nhập đầy đủ thông tin!\");</script>");
			}						
			else if 
				(preg_match("/(.*)[^0-9\s.](.*)/",$_POST["danhmuc_stt"] ) )									
				echo("<script>alert(\"Số thứ tự chỉ điền số!\");</script>");	
		else{
			$name=$_POST["danhmuc_name"];	
			$des=$_POST["danhmuc_des"];
			$stt=$_POST["danhmuc_stt"];
			
			if($name & $des & $stt){
				$sql1='update danhmuc set danhmuc_name="'.$name.'", danhmuc_des="'.$des.'", danhmuc_stt="'.$stt.'" where danhmuc_id="'.$getsua.'"';
				$query1 = mysql_query($sql1) or die(mysql_error());
				}
			}
		}
}		
?>	
	


<div class="danhmuc">
	<!-- start in ra danh muc -->
	<table>
		<tr>
		<thead bgcolor="yellow"><td align="center">
		ID</td><td align="center">
		Tên Danh Mục</td><td align="center">
		Mô tả</td><td align="center">
		Vị trí</td><td colspan="2" align="center">
		Thao tác</td><thead>
		</tr>
<?php
		$sql = "select * from danhmuc";
			$query = mysql_query($sql) or die(mysql_error()); 
							//$KQXuat = mysql_fetch_array($query);  
							if(mysql_num_rows($query)){
								while($rows=mysql_fetch_array($query)){
								echo "<tr>";
								  echo "<td>".$rows['danhmuc_id']."</td>";
								  echo "<td>".$rows['danhmuc_name']."</td>";
								  echo "<td>".$rows['danhmuc_des']."</td>";
								  echo "<td>".$rows['danhmuc_stt']."</td>";
								  echo "<td><a href=xoadanhmuc.php?catid=".$rows['danhmuc_id']." &action=editcat>Sửa</a></td>";
								  echo "<td><a href=xoadanhmuc.php?catid=".$rows['danhmuc_id']." &action=delcat onclick=\"return delconfirm()\">Xóa</a></td>";
								  
								echo "</tr>";
								}							
							}								
?>

	</table>
    </div>
	<!-- end in ra danh muc
</body>
</html>
<?php
}
?>