<?php
/* --1-----------------------
File Trang chủ dành cho các giao diện trang chính

Author: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com
----1------------------------*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<?php include_once ('./include/head.php');?>
</head>

<body>
<!-- script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script -->
<script type="text/javascript" src="./template/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/on-scroll.js"></script>

<div id="wrapper"  class="container">
  <header>
    <?php include_once('./template/header.php');?>
  </header>
  <div id="main"  class="container">
	   <article><div id="left">
		<?php
	if(isset($_REQUEST['s'])){ 
		if(!$_REQUEST['s']==''){ 
				echo '<h3>Kết quả tìm kiếm</h3>';
				$s=$mysqli->real_escape_string($_REQUEST['s']);
				search($s);
		// ------------------
		}
	
	} else header('Location: ./index.php');// end isset s
		?>
		
    </div> <!-- /end right_col -->
	    
</div>
    <!-- ket thuc Thân trang web -->
        <!-- bat dau Footer trang web -->

<?php include_once './template/footer.php';
?>