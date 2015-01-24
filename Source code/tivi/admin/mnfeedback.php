<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include_once ('./../include/config.php');
include ('./../include/db.php');
//include ('./../include/function.php');
if(!isset($_SESSION)) session_start();
if (!$_SESSION['admin_login']=='login_ed'){
		header('location: index.php');
} // End admin_login
else{
	
	$result = mysql_query('SELECT * FROM gopy ORDER BY gopy_date DESC') or die ('Không thể kết nối CSDL');

	// xu ly xoa
	if (isset($_REQUEST['action'])){
		if($_REQUEST['action']=='delete'){
			$gopyid=mysql_real_escape_string($_REQUEST['gopy']);
			$sql = "DELETE FROM gopy WHERE gopy_id='".$gopyid."'";
			$query = mysql_query($sql);
			if($query) echo "<script>alert('Đã xóa thành công!'); window.history.back(); </script>";
		} 
	} // End $_REQUEST['action']
	else{
?>

<script type="text/javascript">
	function delconfirm(){
    var del = confirm("Bạn có muốn xóa danh mục này không?");
    return del;
}



</script>
<div class="gopy">
		<?php if(mysql_num_rows($result)){ 
			?>
	<table class="table table-hover margin-10">
		<thead>
			<tr>
				<th class="width-20">Người gửi</th>
				<th>Nội dung</th>
				<th>Xóa</th>
			</tr>

		</thead>
		<tbody>
			<?php
			while ($row=mysql_fetch_array($result)) {
			
			?>
			<tr>
				<td class="width-20" >
					<div class="padding-5" style="font-weight: bold;"><?php echo $row['gopy_name']; ?></div>
					<div class="padding-5" style="font-size: smaller;font-style: italic;">- Email: <?php echo $row['gopy_email']; ?></div>
					<div class="padding-5" style="font-size: smaller;font-style: italic;">- Gửi lúc: <?php echo $row['gopy_date']; ?></div>
				</td>
				<td>
					
					<div class="padding-5" style="font-weight: bold;">Tiêu đề: <?php echo $row['gopy_subject']; ?>
					</div>
					<div><?php echo nl2br($row['gopy_noidung']);?></div>

				</td>
				<td style="width:10px"><a class="glyphicon glyphicon-remove" href="mnfeedback.php?action=delete&gopy=<?php echo $row['gopy_id'] ?>" onclick="return delconfirm()"></a></td>
			</tr>
			<?php
				} // End WHILE
			?>
		</tbody>
	</table>
	<?php
		} else echo '<div class="alert alert-info margin-10">Chưa có góp ý nào hiện tại.</div>';//End IF
		?>
</div>
<?php
	} // end else $_REQUEST['action'])
} // end else admin_login
?>