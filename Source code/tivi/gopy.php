<meta charset="utf-8">
<?php 
session_start();
include ('./include/db.php');
// Khai báo hàm xử lý cho chức năng gửi phản hồi
if(isset($_REQUEST['submit'])){
	echo '<div class="bs-callout bs-callout-info">';
	if($_SESSION['security_code'] == $_POST['captcha']) {
		
        $name = mysql_escape_string($_POST['name']);
        $email = mysql_escape_string($_POST['email']);
        $subject = mysql_escape_string($_POST['subject']);
        $content = $_POST['content'];
 		$date = mysql_escape_string(date('d/m/Y'));
        $body = nl2br($content);
        
        

        $sql="INSERT INTO gopy(gopy_id, gopy_name,gopy_email, gopy_subject, gopy_noidung, gopy_date) 
        VALUES (NULL,'".$name."',"
        	."'" . $email . "',"
        	."'" . $subject . "'," 
        	."'" . $content . "'," 
        	."'" . $date . "')";          // date("Y") . "/" . date("m") . "/" . date("d") . "')";
		$result = mysql_query($sql,$conn)or die(mysql_error()."Không kết nối được cơ sở dữ liệu, vui lòng gửi lại sau.");
 
       
        //echo $name . $email . $subject . $body . $date;
        echo '<div class="alert alert-success"><strong>Đã gửi thành công</strong></div>';
 
    } else {
        echo '<div class="alert alert-danger"><strong>Lỗi! </strong>Nhập mã bảo mật chưa đúng.</div>';
    }
    echo '</div>';
 }
 else{
?>

<script type="text/javascript" src="./js/AJAX.js"> // Khai báo sử dụng js 
</script>
<div id="container">
			<form method="POST" action="" >
<h3>Gửi góp ý, phản hồi</h3> 
				<p>
				<input type="text" id="name" name="name" placeholder="Nhập Họ và Tên" required>
				</p><div class="warning" id="nameError">Vui lòng nhập tên của bạn</div>
				<p><!-- Email -->
				<input type="email" id="email" name="email" placeholder="Nhập Email" required> <!-- Type = "Email" nếu người dùng nhập vào không đúng định dạng sẽ báo warning -->
				</p><div class="warning" id="emailError">Email không hợp lệ</div>
					<!-- End Email // warning khi khai báo không hợp lệ-->
				
				<input type="text" id="subject" name="subject" placeholder="Nhập tiêu đề" required>
				</p><div class="warning" id="subjectError">Vui lòng nhập tiêu đề</div>
					<!-- End Subkect
						
				<p> <!-- Noi dung -->
				<textarea id="content" name="content" placeholder="Nội dung..." required style="margin: 0px; width: 616px; height: 222px;"></textarea>
				</p><div class="warning" id="contentError">Vui lòng nhập nội dung</div>
					<!-- end Noi dung -->
				
				<p><!-- Start khung captcha -->
                <input type="text" id="captcha" name="captcha" placeholder="Nhập vào mã bảo vệ" required alt="Security Code"><img src="./include/captcha.php" id="img_captcha"><img src="./template/img/load.png" id="load_captcha" title="Tải captcha khác"><div class="warning" id="captchaError">Vui lòng nhập Captcha</div>
                </p> <!-- end khung captcha -->
				<p>
				<input type="submit" name="submit" id="Send" value="Gửi">
				</p>

			</form>
		</div> <!-- End container -->
</body>

<?php
	}
?>