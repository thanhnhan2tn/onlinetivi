<?php
/* --1-----------------------
File Trang chủ dành cho các giao diện trang chính

Author: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com
----1------------------------*/

	include ('include/config.php');
	include ('include/function.php');
	//-------------------
		if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];
			$linkxem=get_chanel_byid($id); // su dung function lay link tivi tu ID
			$chn = get_chaneltitle($id);
			view_chanel($id);
			$view = get_view($id);
			}
		elseif(isset($_REQUEST['cat'])){
			$catsort = mysql_escape_string($_REQUEST['cat']);
			$linkxem=get_chanel_byid(null,$catsort); // mặc định khi chưa chọn kênh
			$chn = get_chaneltitle(null,$catsort);
			$view = get_view(null,$catsort);
		}
		else{
			$linkxem=get_chanel_byid(); // mặc định khi chưa chọn kênh
			$chn = get_chaneltitle(null);
			$view = get_view();
					//watch_link('')
			}	// End else
	if(isset($_REQUEST['id'])){
		$chn=get_chaneltitle($_REQUEST['id']);
		$view = get_view($_REQUEST['id']);
		}
// ---1-----------
	include_once './template/header.php';
?>

<!-- bat dau Thân trang web -->
<div id="wrap" class="container">
	<div class="right_col">
	
	<?php
		if(!isset($_REQUEST['gopy'])){ 
				if((isset($chn)) || (isset($view))) echo '<h3>Kênh truyền hình '.$chn.'</h3>
					<span style="float: right;margin-top: -35px;padding-right:10px;position: relative;">Lượt xem: '.$view.'</span>';  
		// ------------------
	?>
		<div class="player" style="width: auto; height:auto;">  <!-- Khung trình chiếu tivi -->
	<?php	
		
		watch_link($linkxem,$chn);
	?>
		</div>
	<?php
			}  // End !isset($_REQUEST['gopy'])
	?>
	
	<div class="list">
		<?php
			//hiển thị danh sach kênh
			
			if(isset($_REQUEST['gopy'])){ // Nếu gopy được click 
				require 'gopy.php';
				}
				
			elseif(!isset($_REQUEST['cat'])){	// Nếu đã chọn một danh muc
					echo '<div class="panel panel-default">';
					show_list();
					echo '</div>';
					}
			else show_list($_REQUEST['cat']);  // Mặc định
		?>
		</div>
    </div>    
	<div class="left_col">
      <?php // Left Menu 
       include_once './template/leftmenu.php';
      ?>
	</div>

</div><!-- ket thuc Thân trang web -->
<!-- bat dau Footer trang web -->
<?php include_once './template/footer.php';
?>