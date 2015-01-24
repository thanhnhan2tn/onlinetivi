<?php
/* Thong ke.php
Người viết: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com

*/
if(!isset($_SESSION)) session_start();

include_once ('../include/config.php');
include_once ('../include/function.php');


if (!$_SESSION['admin_login']=='login_ed'){
	header('location: index.php');
}else{ 
include_once ('../plugin/thongke.php');

?>
<html>
<head>
</head>
<div>
	<h3>Bảng điều khiển</h3>
	<div  class="thongke"> <!-- khung thống kê -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h2 class="panel-title">Thống kê</h2>
		  </div>
		  <div class="panel-body">
		     <div class="col-md-4" >
			     <div class="padding-5"><a href="./danhmuc.php"><span class="glyphicon glyphicon-pushpin"></span>Danh mục: <span class="badge">
			     <?php count_sql('danhmuc');
			     ?>
			     </span></a></div>
			     <div class="padding-5"><a href="./kenh.php"><span class="glyphicon glyphicon-sound-stereo"></span>Tổng số kênh: <span class="badge">
			     <?php count_sql(); // đếm tổng số kênh hiện có 
			     ?>
			     </span></a></div>
			     <div class="padding-5"><a href="?tab=gopy"><span class="glyphicon glyphicon-envelope"></span>Góp ý: <span class="badge">
		     	<?php count_sql('gopy'); // Đếm tổng số góp ý
			     ?>
		     	</span></a></div>
			 </div>
		     <div class="col-md-4" >
		     	<div class="padding-5"><span class="glyphicon glyphicon-stats"></span>Số lượt xem hôm nay :<span class="badge">
			     <?php echo $day; // đếm tổng số kênh hiện có 
			     ?></span></div>
			     <div class="padding-5"><span class="glyphicon glyphicon-stats"></span>Tổng số lượt xem: <span class="badge">
			     <?php echo $visit; // đếm tổng số kênh hiện có 
			     ?></span></div>
			     <div class="padding-5" ><span class="glyphicon glyphicon-user"></span>Đang trực tuyến: <span class="badge">
			      <?php echo $online; // đếm tổng số kênh hiện có 
			     ?>
			     </span></div>
			 </div>
		  </div>
		</div>
	</div>
	<div class="panel panel-default them_kenh">
		  <div class="panel-heading">
		    <h2 class="panel-title">Thêm kênh nhanh</h2>
		  </div>
		  <div class="panel-body">
		    <div class="kenh_label" style="width: 30%;height: inherit;float: left; padding: 10px 0;" >
				<span>Tên kênh: </span>
				<span>Mô tả: </span>
				<span>Nhà cung cấp: </span>
				<span>Link phát: </span>
				<span>Link logo: </span>
				<span>Danh mục: </span>
				<span>Sắp xếp: </span>
			</div>
			
			<div class="input"style="width: 69%;height: inherit;float: left;">	
			<form method="post" action="./updatechanel.php"  enctype="multipart/form-data">
				<input class="form-control" type="textbox" name="kenh_name" placeholder="Nhập tên kênh *" required />
				<input class="form-control" type="textbox" name="kenh_des" placeholder="Nhập mô tả ngắn, hoặc tên đầy đủ của kênh *" required />
				<input class="form-control" type="textbox" name="kenh_cungcap" placeholder="Nhà cung cấp" />
				<input class="form-control" type="textbox" name="kenh_url" placeholder="URL *" required />
				<input class="form-control" type="file" name="logo">
				<select class="dropdown input-group" name="catid">
					<?php show_option_cat();  // chon danh muc
					?> 	
				</select>
				<input class="form-control" type="textbox" name="kenh_stt" placeholder="Vị trí (Mặc định: 1) " />
				<input class="btn btn-default" type="button" name="check" value="Kiểm tra link" onclick="checkChanel()" style="padding: 5px; margin: 10px; float: left;"/>
				<input class="btn btn-default" type="submit" name="add" value="Thêm Kênh" style="padding: 5px; margin-top: 10px; float: left; "/>

			</form>

			</div>
		  </div>
		</div>
<!--
	<div  class="themnhanh"> 
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h4 class="panel-title">Thêm kênh nhanh</h4>
		  </div>
		  <div class="panel-body">
		    Panel content
		  </div>
		</div>
	</div>
	-->
</div>
</html>
<?php 
	mysql_close();
} //End if else
 ?>