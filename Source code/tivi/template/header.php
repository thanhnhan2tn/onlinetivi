<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<title><?php if(isset($chn)) { echo $chn; }else echo 'Trang Chủ'; echo ' - '.$sitename; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="./template/img/favicon.ico" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" type="text/css" href="./template/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./template/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="./template/style.css">

<link rel="stylesheet" href="./plugin/sear/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript" src="./plugin/sear/js/bsn.AutoSuggest_c_2.0.js"></script>
	<script type="text/javascript" src="./js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="./template/bootstrap/js/bootstrap.min.js"></script>
	<!-- script src="//code.jquery.com/jquery-1.10.2.js"></script -->	

</head>
<body>

	
	<div id="top" class="header">
		<!-- bat dau top Navination -->
		<div class="top_nav navbar navbar-inverse navbar-fixed-top container-fluid" role="navigation">
		
		  <div class="container" style="margin: 8px auto">
			 <a href="./#menu_cat" class="glyphicon glyphicon-list menu-mobile" style="float: right;margin: 7px 0 10px 0;"> MENU</a>
			 <?php echo '<a  class="title text_title" href="'.$mainurl.'">'.$sitename.'</a>'; ?>
			<span class="search-mobile">
				<?php include ('./plugin/sear/bsn.php');
				?>
			</span>
		  </div>
		
		  </div><!-- ket thuc top Navination -->
		</div><!-- ket thuc top Header -->
