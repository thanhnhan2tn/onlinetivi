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
<script type="text/javascript" src="vuthanhlai_ajax.js"></script>
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
              	<div class="search_box">
				<form action="search.php" name="search" method="post">
						<input name="keyword" size="20" type="text" value="<?echo $_POST['keyword'];?>" class="input_text" onkeyup="showHint(this.value)"/>
						<input name="search" type="submit" class="search_button" value=""  />
						<!--Lai thêm vào-->
						<input type="hidden" name="do" value="process" />
						<input type="hidden" name="quicksearch" value="1" />
						<input type="hidden" name="childforums" value="1" />
						<input type="hidden" name="exactname" value="1" />
						<input type="hidden" name="s" value="$session[sessionhash]" />
						<div id="search_results" class="smallfont" style="position:absolute; border: 2px solid orange; color:blue; background-color: white; width: 400px; padding: 8px; display:none;overflow:auto; height:200px">
						<div align="left"><a href="#" onClick="overlayclose('search_results'); return false">x</a></div>
						</div>
						<!--Lai thêm vào-->						
				</form>
				</div>
				<div class="search_result">
					
					 <table class="content">
						
						<tr>
							<td>
								<img src="img/search_pic1.png" class="search_pic" />
<?php
						// Connect to the db
						require_once('config.php');
						
						// Get the ID from URL
						$ID = $_GET['ID']; 
						
		if (isset($_POST['search']))
		{
			$keyword = $_POST['keyword'];
			
			$sql = "SELECT * FROM tbl_term WHERE term LIKE '%$keyword%'";
			$query = mysql_query($sql);
			
			$i = 1;
			$count = mysql_num_rows($query);
			
			if ($count < 1)
			{
				echo '<p class="notice2">Sorry, no term found in our database... Please search again.</p>';
			}
			else
			{
				echo '<p class="notice2"><b>' .$count .'</b> term(s) found:</p>';
				
				
				while ($rows = mysql_fetch_assoc($query)) 
					 {
						
								$id  = $rows['id'];
								$term = $rows['term'];
								$pro = $rows['pro'];
								$meaning = $rows['meaning'];
						// PHP Comment
	?>
						<h2><?php echo $term; ?></h2> 
						 <i class="text">[<?php echo $pro; ?>]</i><br />
						   <?php echo $meaning;?>
						 
						 
							 
				
	<?php
				}
			}		
		}
		include "xulytukhoa.php";
	?>
					
				
				
		 	
				</td>
					   </tr>
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
