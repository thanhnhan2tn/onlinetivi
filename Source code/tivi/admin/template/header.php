<?php
if(!isset($_SESSION)){
	session_start();
	}
if(isset($_REQUEST['logout'])){
	session_destroy();
	header('location: #');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>.: <?php if(isset($filename)) echo $filename.' - ';  if(isset($sitename)){ echo $sitename.' - '; } ?> Control Panel :.</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<link rel="stylesheet" type="text/css" href="./../template/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="./../template/bootstrap/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<link rel="stylesheet" type="text/css" href="./../template/style.css" />
</head>
<body>
	<script type="text/javascript" src="./../js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="./../template/bootstrap/js/bootstrap.min.js"></script>
	

<div id="top" class="header">
     <!-- bat dau top Navination -->	
<div class="top_nav navbar navbar-inverse navbar-fixed-top container-fluid">
<div class="container">
 <h2 class="title text_title "><a href="./../"><span class="glyphicon glyphicon-home" style="margin-right: 5px;"></span></a>> Khu vực quản lý</h2>
 <span class="title user_title "><span class="glyphicon glyphicon-user" style="margin-right: 5px;"></span>Xin chào <?php echo $_SESSION['uname']; ?> | <a href="?logout" name="logout"><span class="glyphicon glyphicon-log-out"></span>Thoát</a></span>
	</div>
</div>
        <!-- ket thuc top Navination -->

</div>
 