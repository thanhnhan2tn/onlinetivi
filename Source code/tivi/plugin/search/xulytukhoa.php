<?php
			$sql = "SELECT * FROM tbl_key WHERE tukhoa = '$keyword'";
			$query = mysql_query($sql);
			
			$i = 1;
			$count = mysql_num_rows($query);
			
			if ($count < 1)
			{
				mysql_query("INSERT INTO `search`.`tbl_key` (`tukhoa` ,`lantim`)VALUES ('$keyword' , '1');");
			}
			else
			{
				echo '<p align="left"><b>' .$count .'</b> từ khóa tương tự đã dc người dùng tìm:</p>';
				
				
				while ($rows = mysql_fetch_assoc($query)) 
					{
						
								$tukhoacansua  = $rows['tukhoa'];
								$tangluotim = $rows['lantim']+1;						
					}
				mysql_query("UPDATE `tbl_key` SET `lantim` = '$tangluotim' WHERE `tukhoa` = '$tukhoacansua'");
			}		

	?>
