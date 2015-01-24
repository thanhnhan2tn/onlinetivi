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
<!--Lai thêm vào-->
<script type="text/javascript" src="vuthanhlai_ajax.js"></script>
<!--Lai thêm vào end-->
</head>

<body>
	<div class="top" align="center">
    	<div class="banner">
        	
			 <div class="menu">
					<a href="#">Search</a>
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
						<input name="keyword" size="20" type="text" value="" class="input_text" onkeyup="showHint(this.value)" />
						<input name="search" type="submit" class="search_button" value="" >	
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
	<?php
						// Connect to the db
						require_once('config.php');
						
						// Get the ID from URL
						$ID = $_GET['ID']; 
						
	///Start dividing pages
			$page = isset ( $_GET["page"] ) ? intval ( $_GET["page"] ) : 1;  // Hic, cai nay de lay so trang hien tai

			$rows_per_page = 5;    // sum of pages
			
			$page_start = ( $page - 1 ) * $rows_per_page;  // finding the starting page
			$page_end = $page * $rows_per_page;   // finding the finishing page
			// SELECT FROM DATABASE
			$sql_query = mysql_query("SELECT * FROM tbl_term ORDER BY term ASC") or die ("Oops!"); 
			
			$number_of_page = ceil ( mysql_num_rows( $sql_query ) / $rows_per_page ); 
			
			if ( $number_of_page > 1 ) 
			{ 
			
			$list_page = " Page: "; 
			
			for ( $i = 1; $i <= $number_of_page; $i++ ) 
			{ 
			if ( $i == $page ) 
			{ 
			$list_page .= "<b>{$i}</b>"; 
			} 
			else 
			{ 
			$list_page .= "<i><a href='index.php?page={$i}'> {$i} </a></i>"; 
			} 
			} 
			} 
			
			$i = 0; 

	// finish dividing pages
						
						while ($rows = mysql_fetch_assoc($sql_query)) 
					 {
						if ( $i >= $page_start ) 
							{ 
								$id  = $rows['id'];
								$term = $rows['term'];
								$pro = $rows['pro'];
								$meaning = $rows['meaning'];
						// PHP Comment
	?>
						<p><b class="font"><?php echo $term; ?></b> 
						 <i class="text">[<?php echo $pro; ?>]</i><br />
						   <?php echo $meaning;?></p>
						 
							 
				
	<?php
		} // end if
			$i++; 

			if ($i >= $page_end) 
			{ 
			   break; 
			} 
		} // End loop
		
		
	?>
					
							</td>
					   </tr>
					   <tr><td  align="center"><?php echo $list_page;  ?></td></tr>
					</table>
				</div>
        </div>
            <div class="bottom" align="center">
    	<div class="copyright">
        	© 2009 by <strong>sieunhan2c.com</strong><br />
            Advanced Internet and Web Services
        </div>
    </div>
</body>
</html>
