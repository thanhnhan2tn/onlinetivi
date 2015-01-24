
<?php 

if(!isset($_SESSION)) session_start();
if (!$_SESSION['admin_login']=='login_ed'){
	header('location: index.php');
}else{
include_once '../include/config.php';
include_once '../include/function.php';
include ('./template/header.php');	
require ('../include/db.php');
?>
<head>
        <link href="./template/modal.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function checkChanel(){
    	window.open('./checkkenh.php?check=&url=' + document.getElementsByName("kenh_url")[0].value, "s", "width= 640, height= 480, left=0, top=0, resizable=yes, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no").blur();
        
    }
    function reloaddiv() {
                (jQuery)("#edit-kenh").html('<label>Logo: </label><input class="form-control" type="file" name="logo">');
    }
    function delconfirm(){
    var del = confirm("Bạn có muốn xóa danh mục này không?");
    return del;
	}
</script>
</head>
<div id="wrap" class="container">  
<!-- Cột trái Menu  -->
  <div class="left_col">  
      <?php // menu
	  include_once ('./template/adminmenu.php');
	  ?>
  </div>

<!-- Cột Phải  -->
<div class="right_col">
	<h3>Quản lý Kênh</h3>
		<?php
		if(!isset($_REQUEST['select_catid'])){
		?>
		
		<div class="panel panel-default margin-10">
		  <div class="panel-heading">
		    <h4 class="panel-title">Chọn danh mục để quản lý</h4>
		  </div>
		  <div class="panel-body">
		    <div class="list_kenh kenh_label">
		<form method="get" action="" style="max-width: 200px; margin-lefft: 10px">
		 <select class="form-control" name="select_catid" onchange='this.form.submit()'>
			<?php show_option_cat();  // chon danh muc
				?> 		
		</select>
		 
		</form>
			</div> <!-- end list_kenh kenh_label -->
			</div> <!-- end panel body -->
		</div>
		<?php
			}
			else{
		?>
		
<div class="panel panel-default margin-10"> <!-- thêm kenh trong danh mục -->
	<div class="panel-heading">
    	<h4 class="panel-title">Chọn danh mục để quản lý</h4>
	</div>
	 <div class="panel-body">
	    <div class="list_kenh kenh_label">
		<form method="get" action="" style="max-width: 200px; margin-lefft: 10px">
		 <select class="form-control" name="select_catid" onchange='this.form.submit()'>
			<?php show_option_cat();  // chon danh muc
				?> 		
		</select>
		 
		</form>

		<div class="panel panel-default them_kenh" style="margin: 0">
		  <div class="panel-heading">
		    <h2 class="panel-title">Thêm kênh</h2>
		  </div>
		  <div class="panel-body">
		    <div class="kenh_label" style="width: 30%;height: inherit;float: left; padding: 10px 0;" >
				<span>Tên kênh: </span>
				<span>Mô tả: </span>
				<span>Nhà cung cấp: </span>
				<span>Link phát: </span>
				<span>Link logo: </span>
				<span>Sắp xếp: </span>
			</div>
			
			<div class="input"style="width: 69%;height: inherit;float: left;">	
			<form method="post" action="./updatechanel.php"  enctype="multipart/form-data">
				<input class="form-control" type="textbox" name="kenh_name" placeholder="Nhập tên kênh *" required />
				<input class="form-control" type="textbox" name="kenh_des" placeholder="Nhập mô tả ngắn, hoặc tên đầy đủ của kênh *" required />
				<input class="form-control" type="textbox" name="kenh_cungcap" placeholder="Nhà cung cấp" />
				<input class="form-control" type="textbox" name="kenh_url" placeholder="URL *" required />
				<input class="form-control" type="file" name="logo">
				<input type="hidden" name="catid" value="<?php echo $_REQUEST['select_catid']; ?>" />
				<input class="form-control" type="textbox" name="kenh_stt" placeholder="Vị trí (Mặc định: 1) " />
				<input class="btn btn-default" type="button" name="check" value="Kiểm tra link" onclick="checkChanel()" style="padding: 5px; margin: 10px; float: left;"/>
				<input class="btn btn-default" type="submit" name="add" value="Thêm" style="padding: 5px; margin-top: 10px; float: right; "/>
				
			</form>
			</div>
		  </div>
		</div>
		 
		  
			<?php
			if(isset($_REQUEST['select_catid'])){
			$catid = $_REQUEST['select_catid'];
			$catid = mysql_real_escape_string($catid);
			$sql_k = sprintf('select kenh_id,kenh_name,kenh_des, kenh_cungcap,kenh_logo,kenh_stt from kenh where danhmuc_id like "%d"',$catid);
			$query_k = mysql_query($sql_k) or die('Không kết nối được CSDL');
			if(mysql_num_rows($query_k)){
				echo '<table scpacing="0"><tr><thead><th>STT</th><th>Tên Kênh</th><th>Mô Tả</th><th>Nhà cung cấp</th><th>Sắp xếp</th><th colspan="2">Thao Tác</th></thead></tr>';
							$stt=1;
								while($rows=mysql_fetch_assoc($query_k)){
								echo '<tr>';
								  echo '<td align=center>'.$stt.'</td>';
								  echo '<td><img src="./../'.$rows['kenh_logo'].'" width="98px" height="32px" title="'.$rows['kenh_name'].'" alt="'.$rows['kenh_name'].'"/></td>';
								  echo '<td>'.$rows['kenh_des'].'</td>';
								  echo '<td>'.$rows['kenh_cungcap'].'</td>';
								//  echo '<td>'.$rows['kenh_url'].'</td>';
								  echo '<td align=center>'.$rows['kenh_stt'].'</td>';
								  echo '<td align=center><a href="?select_catid='.$catid.'&editid='.$rows['kenh_id'].'#edit" >Sửa</a></td>';
								  echo "<td align=center><a href=./updatechanel.php?xoa=".$rows['kenh_id']." onclick=\"return delconfirm()\">Xóa</a></td>";
								echo "</tr>";
								$stt++;
								}						
				echo '</table>';

			}else echo '<div class="alert alert-info margin-10">Chưa có kênh nào trong danh muc này</div>';
		} //End isset REQUEST catid
		?>  <!-- end list_kenh -->

		</div>
		 </div>
</div> <!-- End thêm kenh trong danh mục -->
		<?php
			} //end ELSE

			if(isset($_REQUEST['editid'])){
				$editid = $_GET['editid'];
				$editid = mysql_real_escape_string($editid);
				$sql_edit_kenh = sprintf('SELECT kenh_id, kenh_name, kenh_des, kenh_cungcap, kenh_url, kenh_logo, kenh_stt FROM kenh WHERE kenh_id="%d"',$editid);
				$query_edit = mysql_query($sql_edit_kenh) or die('Không kết nối được CSDL');
				while($rows=mysql_fetch_assoc($query_edit)){
		?>
		
<!-- popup form #2 --> <!-- Sua kenh -->
        <a href="#x" class="overlay" id="edit"></a>
        <div class="popup update-kenh">
            <div class="panel panel-default edit-chanel">
          <div class="panel-heading">
            <h2 class="panel-title">Sửa thông tin kênh</h2>
          </div>
          <div class="panel-body">
            
            <div class="input" style="width: 99%;height: inherit;float: left;">  
            <form method="post" action="./updatechanel.php"  enctype="multipart/form-data">
                <label>Tên kênh: </label> <input class="form-control" type="textbox" name="kenh_name" value="<?php echo $rows['kenh_name']; ?>" required /><br />
                <label>Mô tả ngắn: </label> <input class="form-control" type="textbox" name="kenh_des" value="<?php echo $rows['kenh_des']; ?>" required /><br />
                <label>Nhà cung cấp: </label><input class="form-control" type="textbox" name="kenh_cungcap" value='<?php echo $rows["kenh_cungcap"]; ?>' /><br />
                <label>URL kênh: </label> <input class="form-control" type="textbox" name="kenh_url" value="<?php echo $rows['kenh_url']; ?>" required /><br />
                
                <div id="edit-kenh" ><label>Logo: </label>
        <?php
                if($rows['kenh_logo'] == ''){
                	echo '<input class="form-control" type="file" name="logo">';
                }else{
                	?>
       		<script type="text/javascript">
			var jQuery = jQuery.noConflict();
			jQuery(document).ready( function () {
			//trigger
			jQuery('#del_img').click( function(){ 
			//get all the values and put each inside a variable.
			var del_img = '<?php echo "./.".$rows["kenh_logo"]; ?>';
			var kenh_id = jQuery("#edit_id").val(); /* you can also hook the value of the field using the ID of the field.*/
				//ajax process
				 jQuery.ajax({
				 type: "POST", //you can also you GET
				 data: ({del_img:del_img,kenh_id:kenh_id}), //the data will be throwed here
				 url:"./updatechanel.php", //in what file do you want to pass the values
				 success: function(msg) {alert('Đã xóa logo!'); reloaddiv(); } // what do you want to happen when the process is done? In my case I used an alert for the notification.
			
			}); // End jQ add_cat
			});
			});
                	</script>
                	<span style="display: inline-block; width: 60%"><img style="display: inline-block;margin-bottom: 0;"class="thumbnail" src="<?php echo '../'.$rows["kenh_logo"]; ?> " width="98px" height="32px"></img>
                	<a style="display: inline-block; padding: 2px 5px;cursor:pointer;" id="del_img">Xóa?</a></span>
        <?php   
            }  // end ELSSE ÌF
        ?>		
        		</div>
                <label>Danh mục: </label>
                <select class="dropdown input-group" name="update_catid">
                    <?php show_option_cat();  // chon danh muc
                    ?>  
                </select><br />
                <label>Sắp xếp: </label><input class="form-control" type="textbox" name="kenh_stt" value="<?php echo $rows['kenh_stt']; ?>" /><br />
                <input class="form-control" type="hidden" id="edit_id" name="kenh_id" class="kenh_id" value="<?php echo $editid; ?>" />
                
                <input class="btn btn-default" type="submit" name="update" value="Lưu" style="padding: 5px; margin-top: 10px; float: left; "/>

            </form>

            </div>
          </div>
        </div>
            <a class="close" href="#close"></a>
        </div> <!-- end popup edit kenh -->
       <?php
       		} // end WHILE
   		} // end If isset Del
       ?>
</div> <!-- end quan ly kenh. -->
</div>   <!-- ket thuc Thân trang web -->
        <!-- bat dau Footer trang web -->

<?php
include ('./template/footer.php');	
} // End login
?>