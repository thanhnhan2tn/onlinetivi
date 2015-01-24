<?php 
/*
File UPDATE danh muc chứa các chức năng quản lý danh mục

Người viết: Trần Thị Cẩm Giang
MSSV: 1111390
*/
if(!isset($_SESSION)) session_start();
if(!$_SESSION['admin_login']=='login_ed'){
	header('location: index.php');
}else{
	require '../include/config.php';
	require '../include/function.php';
	require ('../include/db.php');
	
	include ('./template/header.php');
	
?>
<head>
        <link href="./template/modal.css" rel="stylesheet" type="text/css" />
</head>		
<script type="text/javascript">
	function delconfirm(){
    var del = confirm("Bạn có muốn xóa danh mục này không?");
    return del;
}
</script>
<script type="text/javascript" src="./../js/core.js"> // JS xử lý thêm kênh
</script>

    <!-- bat dau Thân trang web -->
<div id="wrap" class="container">  
<!-- Cột trái Menu  -->
  <div class="left_col">  
      <?php // menu
	  include_once ('./template/adminmenu.php');
	  ?>
  </div>

<!-- Cột Phải  -->
<div class="right_col">
	<h3>Quản lý danh mục</h3>
	<div class="list_danhmuc">	
	<?php
			$sql = sprintf("select * from danhmuc ORDER BY danhmuc_stt ASC;");
			$query = mysql_query($sql) or die(mysql_error()); 
			if(mysql_num_rows($query)){
		?>
			<table scpacing="0"><tr><thead><th>STT</th> <th>Tên Danh Mục</th> <th>Mô Tả</th><th>Số Kênh</th> <th>Sắp Xếp</th><th colspan="2">Thao Tác</th></thead></tr>
			<?php
			
							//$KQXuat = mysql_fetch_array($query);  
							
								$stt=1;
								while($rows=mysql_fetch_array($query)){
								echo "<tr>";
								  echo "<td align=center>".$stt."</td>";
								  echo "<td>".$rows['danhmuc_name']."</td>";
								  echo "<td>".$rows['danhmuc_des']."</td>";
								  echo "<td align=center>".count_sql('kenh',$rows['danhmuc_id'])."</td>";

								  echo "<td align=center>".$rows['danhmuc_stt']."</td>";
								  echo "<td align=center><a href=?editid=".$rows['danhmuc_id']."#edit>Sửa</a></td>";
								  echo "<td align=center><a href=./updatedanhmuc.php?catid=".$rows['danhmuc_id']."&action=delcat onclick=\"return delconfirm()\">Xóa</a></td>";
								echo "</tr>";
								$stt++;
								}	
			?>
			
			
			</table>
<?php
		}else echo '<div class="alert alert-info margin-10">Chưa có danh mục nào!</div>';
?>

		</div>
	<div class="panel panel-default them_danhmuc">
		  <div class="panel-heading">
		    <h2 class="panel-title">Thêm danh mục</h2>
		  </div>
		  <div class="panel-body">
		    <!-- form method="post" action="updatedanhmuc.php" -->
				<input class="danhmuc_name" type="textbox" name="danhmuc_name" placeholder="Tên danh mục" required/>
				<input class="danhmuc_des" type="textbox" name="danhmuc_des" placeholder="Mô tả" required />
				<input class="danhmuc_stt" type="textbox" name="danhmuc_stt" placeholder="Vị trí (Mặc định: 1) " />
				<input type="submit" id="add_cat" name="add" value="Thêm"/>
				
			<!-- /form -->
		  </div>
	</div>
	</div>
	<?php

	if(isset($_REQUEST['editid'])){
			$getsua=$_REQUEST['editid'];
			$getsua = mysql_real_escape_string($getsua);  //han che thong tin gui di
			$sql2= sprintf("select danhmuc_name,danhmuc_des,danhmuc_stt from danhmuc where danhmuc_id='%d'",$getsua);
			$query2=mysql_query($sql2) or die(mysql_error());
			$rows=mysql_fetch_array($query2);
	
?>

	<!-- popup form #2 --> <!-- Sua kenh -->
        <a href="#x" class="overlay" id="edit"></a>
        <div class="popup update-kenh">
            <div class="panel panel-default edit-chanel">
          <div class="panel-heading">
            <h2 class="panel-title">Sửa thông tin danh mục</h2>
          </div>
          <div class="panel-body">
	
			<div class="input"style="width: 69%;height: inherit;float: left;">	
			<form method="post" action="./updatedanhmuc.php"  enctype="multipart/form-data">
				<label>Tên danh muc: </label><input class="form-control" type="textbox" name="danhmuc_name" value="<?php echo $rows['danhmuc_name']; ?>" required />
				<label>Mô tả ngắn: </label><input class="form-control" type="textbox" name="danhmuc_des" value="<?php echo $rows['danhmuc_des']; ?>" required />
				<label>Sắp xếp: </label><input class="form-control" type="textbox" name="danhmuc_stt" placeholder="Vị trí (Mặc định: 1) " value="<?php echo $rows['danhmuc_stt']; ?>" />
				<input type="hidden" name="editid" value="<?php echo $getsua; ?>" />
				<input class="btn btn-default" type="submit" name="edit" value="Lưu" style="padding: 5px; margin-top: 10px; float: left; "/>

			</form>

			</div>
			</div>
		</div>
            <a class="close" href="#close"></a>
	</div> <!-- end popup edit kenh -->
		<?php
		} // end If isset EDIT
       ?>
</div> <!-- ket thuc Thân trang web -->
        <!-- bat dau Footer trang web -->

<?php
include ('template/footer.php');

} // End login
?>