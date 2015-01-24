<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include_once ('./../include/config.php');
include ('./../include/db.php');
//include ('./../include/function.php');
session_start();
if (!$_SESSION['admin_login']=='login_ed'){
		header('location: index.php');
}
else
{

// Ấn định  dung lượng file ảnh upload
define ("MAX_SIZE","300");
if(isset($_SERVER['CONTENT_LENGTH'])){
	if((int)$_SERVER["CONTENT_LENGTH"]> ((int)ini_get('post_max_size')*1024*1024)){
	echo("<script>alert(\"File upload lớn hơn ". ((int)ini_get('post_max_size')*1024*1024) ."KB \");</script>");
		echo "<script>window.history.back();</script>" ;
}
}// end isset 
// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
// file này có phải là file hình hay không .
function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}
//This variable is used as a flag. The value is initialized with 0 (meaning no
// error  found)
//and it will be changed to 1 if an errro occures.
//If the error occures the file will not be uploaded.
$errors=0;
//checks if the form has been submitted
if((isset($_POST['add'])) || (isset($_POST['update']))){// lấy tên file upload
	
	// Nếu nó không rỗng
if (isset($_FILES['logo']['name'])){
	$image=$_FILES['logo']['name'];
	// Lấy tên gốc của file
	$filename = stripslashes($_FILES['logo']['name']);
	//Lấy phần mở rộng của file
	
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	// Nếu nó không phải là file hình thì sẽ thông báo lỗi
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension !=
	"png") && ($extension != "gif")){
	// xuất lỗi ra màn hình
		echo '<script>alert("Đây không phải là file hình ảnh");</script>';
				echo '<script>window.history.back();</script>' ;
	$errors=1;
	}
	else{
	//Lấy dung lượng của file upload
	$size=filesize($_FILES['logo']['tmp_name']);
	if ($size > MAX_SIZE*1024)
	{
		
		echo '<script>alert("Vượt quá dung lượng cho phép! 300KB");</script>';
				echo '<script>window.history.back();</script>' ;
	$errors=1;
	}
	// đặt tên mới cho file hình up lên
	//$image_name=time().'.'.$extension;
	// gán thêm cho file này đường dẫn
	$newname='./../template/img/logo/'.$filename;

	// kiểm tra xem file hình này đã upload lên trước đó chưa
	$copied = copy($_FILES['logo']['tmp_name'], $newname);
		
	if (!$copied)
	{
		echo '<script>alert("File hình này đã tồn tại, hoặc không thể upload lên server!.");</script>';
				echo '<script>window.history.back();</script>' ;
	
	$errors=1;
	}}
	}
if ((isset($_POST['add'])) && ($errors!=1)){// kiêm tra giá trị cac truong nhap vao
		if($_POST['kenh_name']==null || $_POST['kenh_des']==null || $_POST['kenh_url']==null){  
		echo("<script>alert(\"Bạn phải nhập đầy đủ thông tin có dấu *!\");</script>");							// Câu thông báo nên dùng BOXDialog
		echo "<script>window.history.back();</script>" ;
		}elseif (strlen($_POST['kenh_stt'])>0 && preg_match("/(.*)[^0-9\s.](.*)/",$_POST['kenh_stt'])){		
		// kiêm tra STT nhập vào là số hay không.
				echo("<script>alert(\"Số thứ tự chỉ điền số!\");</script>");
				echo "<script>window.history.back();</script>" ;
		}
		else{
		$name=$_POST["kenh_name"];	//danhmuc_id là tự động nên không cần thêm
		$des=$_POST["kenh_des"];
		$cungcap=$_POST["kenh_cungcap"];
		$url=$_POST["kenh_url"];
		$logo='./template/img/logo/'.$image;
		$cat=$_POST['catid'];
		$_POST["kenh_stt"]!='' ? $stt=$_POST["kenh_stt"] : $stt=1;		//Nếu STT không xác định thì mặc định sẽ là 1
		$sql = "insert into kenh(kenh_id,danhmuc_id,kenh_name,kenh_des,kenh_cungcap,kenh_url, kenh_logo,kenh_stt) values(NULL, '".$cat."','".$name."', '".$des."','".$cungcap."','".$url."','".$logo."', '".$stt."')";
		$query = mysql_query($sql) or die("Không thể kết nối CSDL ".mysql_error()); 
			if($query) echo("<script>alert(\"Thành công!\");</script>");	
				echo "<script>window.history.back();</script>" ;										//tải lại trang sau khi cập nhật
		} // end ELSE
}elseif((isset($_POST['update'])) && ($errors!=1)){
	if($_POST['kenh_name']==null || $_POST['kenh_des']==null || $_POST['kenh_url']==null){  
		echo("<script>alert(\"Bạn phải nhập đầy đủ thông tin có dấu *!\");</script>");							// Câu thông báo nên dùng BOXDialog
		echo "<script>window.history.back();</script>" ;
		}elseif (strlen($_POST['kenh_stt'])>0 && preg_match("/(.*)[^0-9\s.](.*)/",$_POST['kenh_stt'])){		
		// kiêm tra STT nhập vào là số hay không.
				echo("<script>alert(\"Số thứ tự chỉ điền số!\");</script>");
				echo "<script>window.history.back();</script>" ;
		}
		else{
		$name=$_POST["kenh_name"];	//danhmuc_id là tự động nên không cần thêm
		$des=$_POST["kenh_des"];
		$cungcap=$_POST["kenh_cungcap"];
		$url=$_POST["kenh_url"];
		if (isset($_FILES['logo']['name'])) { $logo="',kenh_logo='./template/img/logo/".$image; 

			}else $logo='';
		
		$cat=$_POST['update_catid'];
		$update_kenh_id = $_POST['kenh_id'];
		$stt=$_POST["kenh_stt"];	
		
		$sql = "UPDATE kenh SET danhmuc_id='".$cat."',kenh_name='".$name."',kenh_des='".$des."',kenh_cungcap='".$cungcap."',kenh_url='".$url.$logo
		."',kenh_stt='".$stt."' WHERE kenh_id = '".$update_kenh_id."'";
		$query = mysql_query($sql) or die("Không thể kết nối CSDL ".mysql_error()); 
			if($query) echo("<script>alert(\"Cập nhật thành công! F5 lại trang để xem sự thay đổi\");</script>");	
				echo "<script>window.history.go(-2);</script>" ;										//tải lại trang sau khi cập nhật
		} // end ELSE
} // end UPDATE
} // end isset POST
elseif(isset($_REQUEST['xoa'])){
	$getxoa=$_REQUEST['xoa'];
	$getxoa = mysql_real_escape_string($getxoa);
	$sql1 = "delete from kenh where kenh_id='".$getxoa."'";
			$query1 = mysql_query($sql1) or die('Không thể kết nối CSDL!');
			echo("<script>alert(\"Kênh đã xóa thành công!\");</script>");
			echo "<script>window.history.back();</script>" ;
} //End isset DELETE
elseif(isset($_REQUEST['del_img'])){
	$del_img = $_REQUEST['del_img'];
	unlink($del_img);
	$img_id=$_REQUEST['kenh_id'];
	$img_id= mysql_real_escape_string($img_id);
	$sqldel_img='UPDATE kenh SET kenh_logo=NULL WHERE kenh_id='.$img_id.';';
	$sqldel_img_query=mysql_query($sqldel_img) or die("Không thể kết nối CSDL");
	}
	 // end edit
}
?>