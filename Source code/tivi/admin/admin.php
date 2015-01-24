<?php 
include '../include/config.php';  
include_once '../include/function.php';
session_start();
if (!$_SESSION['admin_login']=='login_ed'){
	header('location: index.php');
}else{
include ('./template/header.php');
?>
<script type="text/javascript">
    function checkChanel(){
    	window.open('./checkkenh.php?check=&url=' + document.getElementsByName("kenh_url")[0].value, "s", "width= 640, height= 480, left=0, top=0, resizable=yes, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no").blur();
        
    }
</script>
    

    <!-- bat dau Thân trang web -->
<div id="wrap" class="container">  
  <div class="left_col">
      <?php // menu
	  include_once ('./template/adminmenu.php');
	  ?>
  </div>
        
  <div class="right_col">
<?php
	if(isset($_REQUEST['tab'])){
	if($_REQUEST['tab']=='kenh'){
		include 'kenh.php';
	}elseif($_REQUEST['tab']=='gopy'){
		include 'quanlygopy.php';
	}
	}else

		require_once 'thongke.php';
	
?>
        </div> <!-- end Right -->
</div><!-- ket thuc Thân trang web -->
        <!-- bat dau Footer trang web -->
<?php
include ('template/footer.php');
}
?>

