<?php
			// Connect to the db
			require_once('config.php');
			$keyword = $_GET['tukhoa'];
			$sql = "SELECT * FROM tbl_key WHERE tukhoa LIKE '%$keyword%'";
			$query = mysql_query($sql);
			$i = 1;
			$count = mysql_num_rows($query);
			if ($count < 1)
			{
				echo '<p class="notice2">Chưa có ai tìm từ khóa giống bạn.</p>';
			}
			else
			{
				echo '<p align="left"><b>' .$count .'</b> từ khóa tương tự đã dc người dùng tìm:</p>';
				while ($rows = mysql_fetch_assoc($query)) 
					{
								$tukhoa  = $rows['tukhoa'];
								$luottim = $rows['lantim'];
								echo "$tukhoa [ $luottim lượt tìm ]<br />";
					}
			}		

	?>
