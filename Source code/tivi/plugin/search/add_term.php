<?php
/*//////////////////////////////////
/// By: Ducdt             		///
/// Contact: ducdtdy@gmail.com  ///
//////////////////////////////////*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="sieunhan.css" media="all" />
<link rel="stylesheet" type="text/css" href="sieunhanmb.css" media="handheld" />
<title>index</title>
</head>

<body>
	<div class="top" align="center">
    	<div class="banner">
        	
			 <div class="menu">
					<a href="index.php">Search</a>
					<a href="#">Advanced Search</a>
					<a href="#">Plugin</a>
					<a href="add_term.php">Add new term</a>
					<a href="about_us.php">About Us</a>
			  </div>
		</div>
    </div>
    <center>
        <div class="main">
        
            <div class="content">
            
			 	<div class="search_result">
					
					 <table class="content">
						
								 
<?php
					// Connect to the db
					require_once('config.php');
					
					// Get the ID from URL
					$id = $_GET['id']; 
					$sql = "SELECT id, term FROM tbl_term ORDER BY term";
					
					$query = mysql_query($sql);
					$i = 1;
					
	
		if (isset($_POST['addterm']))
		{
			
			$term = $_POST['term'];
			$pro = $_POST['pro'];
			$meaning = $_POST['meaning'];

		
			
			$sql = "SELECT term FROM tbl_term WHERE term = '$term'";
			
			
			$query = mysql_query($sql);
			
			if(!mysql_num_rows($query))
			{
				$sql = "INSERT INTO tbl_term (term, pro, meaning)
					  	       VALUES ('$term', '$pro', '$meaning')";
				$query = mysql_query($sql);
				echo '<p class="notice">You added a new term :<b>"' .$term . '"</b> successfully ! </p>';
				echo '<a class="add_link" href="index.php" <p>>>View all term in the glossary</a></p>';
			}
			else
			
			{
			
				echo '<p class="notice"> Term : <b>' .$term .'</b> has already added. You can not add more. Try again!</p>';
				include('add_term_form.php');
				echo '<a class="add_link" href="index.php"<p>>>View all term in the glossary</a>';
			
			}
		}
		else
		{
			include('add_term_form.php');
			echo '<a class="add_link" href="index.php"<p>>>View all term in the glossary</a>';
		}
		
		
		
		?>
					</table>
				</div>
        </div>
    </center>
    <div class="bottom" align="center">
    	<div class="copyright">
        	© 2009 by <strong>sieunhan2c.com</strong><br />
            Advanced Internet and Web Services
        </div>
    </div>
</body>
</html>
