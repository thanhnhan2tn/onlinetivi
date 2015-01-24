
<html>
<meta charset="UTF-8">
<script src="http://jwpsrv.com/library/mzG2mv2bEeKPZxIxOUCPzg.js"></script>  
<div class="kiemtra" style="width: 800px; margin: auto; border: 1px solid;">
<p>//kiem tra kenh by Thanh Nhan
<br>
Dán link tivi vào ô bên dưới bấm gửi. nếu link hỗ trợ thì sẽ được chạy trên player;
<p>
	<form class="input" method="post">
	<input type="text" name="url" value="<?php if(isset($_REQUEST['url'])) echo $_REQUEST['url']; ?>"/>
	<input type="submit" name="check" />
	</form>
<?php
	include './include/config.php';
	include './include/function.php';
	
	if(isset($_REQUEST['check'])){
			$linkxem=$_REQUEST['url']; // su dung function lay link tivi tu ID
			}
	if(isset($linkxem))	watch_link($linkxem,1,"Check");
	?>
</div>
</div>
</html>