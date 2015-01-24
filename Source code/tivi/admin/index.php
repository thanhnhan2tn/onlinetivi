<?php
/* -------------------------
File trang chu, dang nhap quan tri vien

Người viết: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com

----------------------------*/
session_start();
include_once('../include/config.php');
include_once('../include/function.php');
include_once('../include/db.php');
$_SESSION['admin_login']='';

?>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<title>.: <?=$sitename?>  Control Panel :.</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="./template/admin.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="./../template/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./../template/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="./../template/style.css">


</head>
<body style="background: #2C2C2C">
	<script type="text/javascript" src="../template/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
	
	


<?php
if (!$_SESSION['admin_login']=='login_ed'){
		if(isset($_POST['submit'])){
		$ip=0;
		$err = array();
		$required = array('username','Password');
			foreach($required as $fieldname){
				if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname]))
				$err[] = "Bạn chưa điền vào {$fieldname}";
			} //end foreach
		if(empty($err))	{
			$uname = mysql_real_escape_string($_POST['username']);
			$passwd = mysql_real_escape_string($_POST['Password']);
			$hash_pw = sha1($passwd);
			
			$query_login = sprintf("SELECT CONCAT_WS(users_name,users_pass)
				FROM users
				WHERE users_name = '%s'
				AND users_pass= '%s'
				LIMIT 1
			",$uname,$hash_pw);
			$result = mysql_query($query_login) or die(mysql_error($conn));
			if (mysql_num_rows($result)==1){
				while ($row = mysql_fetch_assoc($result)){
					$_SESSION['admin_login']='login_ed';
					$_SESSION['uname'] = $uname;
					header('location: admin.php');
				}//END WHILE
			}
			else { $err[] = "Username và Password không trùng khớp!";
					
					}
		} //end empty($err)
	} //end isset($_POST['submit'])
?>

<div class="login_form">
	<?php if(!empty($err)){
		echo "<ul>";
		foreach($err as $errs){
			echo "<script>alert('".$errs."')</script>";
		}
		echo "</ul>";
		
	}
	
	?>
	<p>Thông tin đăng nhập</p>    
	<form method="post" action="#">
		
            <span>Tên người dùng: </span>
            <input type="textbox" class="form-control" name="username" required/><br />
            <span>Mật khẩu: </span>
            <input type="password" class="form-control" name="Password" required/> <br />
            <input type="submit" class="btn btn-default" name="submit" value="Đăng nhập" style="float: right;width: inherit" />
	</form>
</div>
</body>
</html>	
	<?php
	exit();
	} //end if ($_SESSION['admin_login']=='')
else{ // neu da login 
// Bat dau trang chu admin
	header('location: admin.php');
}
	?>