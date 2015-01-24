<?php
	include_once 'conf.php';
	include 'db.php';
	//$conn =  mysql_connect($hostname, $dbUser ,$dbPass) or die(mysql_error());
	//mysql_set_charset('utf8',$conn);
	//mysql_select_db( $dbName, $conn);
function anti_sql($sql) {
    $sql = str_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|*|--|\)/"),"",$sql);
    return trim(strip_tags(addslashes($sql))); #strtolower()
}	

function removesign($str){	
		$coDau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ"
,"ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ","ì","í","ị","ỉ","ĩ",
"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
,"ờ","ớ","ợ","ở","ỡ",
"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
"ỳ","ý","ỵ","ỷ","ỹ",
"đ",
"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
"Ì","Í","Ị","Ỉ","Ĩ",
"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
,"Ờ","Ớ","Ợ","Ở","Ỡ",
"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
"Đ","ê","ù","à"," ");
$khongDau=array("a","a","a","a","a","a","a","a","a","a","a"
,"a","a","a","a","a","a",
"e","e","e","e","e","e","e","e","e","e","e",
"i","i","i","i","i",
"o","o","o","o","o","o","o","o","o","o","o","o"
,"o","o","o","o","o",
"u","u","u","u","u","u","u","u","u","u","u",
"y","y","y","y","y",
"d",
"A","A","A","A","A","A","A","A","A","A","A","A"
,"A","A","A","A","A",
"E","E","E","E","E","E","E","E","E","E","E",
"I","I","I","I","I",
"O","O","O","O","O","O","O","O","O","O","O","O"
,"O","O","O","O","O",
"U","U","U","U","U","U","U","U","U","U","U",
"Y","Y","Y","Y","Y",
"D","e","u","a","-");
return str_replace($coDau,$khongDau,$str);
    }  //end removesign

function m_htmlchars($str) {
	return str_replace(
		array('&', '<', '>', '"', chr(92), chr(39)),
		array('&amp;', '&lt;', '&gt;', '&quot;', '&#92;', '&#39'),
		$str
	);
}		
function view_chanel($id){
	require('./include/db.php');
	$sql=sprintf("UPDATE kenh SET kenh_view = kenh_view+1 WHERE kenh_id = %d;",$id);
	mysql_query($sql) or die ('Không thể kết nối cơ sở dữ liệu.');  
	mysql_close();
}
function get_view($id=null,$cat=null){
	require('./include/db.php');
	if(($id==null)&&($cat==null)){
		$sql=sprintf("SELECT kenh_view FROM kenh WHERE 1 ORDER BY kenh_view DESC LIMIT 0,1");
		return  mysql_result(mysql_query($sql),0);
	}elseif($cat!=null){
		$sql=sprintf("SELECT kenh_view FROM kenh WHERE danhmuc_id = %d ORDER BY kenh_view DESC LIMIT 0,1",$cat);
		return  mysql_result(mysql_query($sql),0);
	}
	else{
	$id = mysql_real_escape_string($id);
	$sql=sprintf("SELECT kenh_view FROM kenh WHERE kenh_id = '%d';",$id);
		return  mysql_result(mysql_query($sql),0);
	}
	mysql_close();
}
function watch_link($link,$chn){ //Func phat tivi chanel link, chieu rong, chieu cao, loai, tên kenh
	$w='100%';$h='480px';
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	//include $mainurl.'./include/config.php';
	$link_mobile='
	
	';
	if (preg_match("#^http://(.*?)#s", $link))
	// Dinh dang giao thuc HTTP
		{
		if (preg_match("#^http://megafun.vn/common/v2/player/player.swf(.*?)#s", $link)){
		//neu la link thuoc megafun thi dung player cua megafun de chay
			$player= '<embed type=\'application/x-shockwave-flash\' src=\''.$link.'\' quality=\'high\' allowfullscreen=\'true\' allowscriptaccess=\'always\' wmode=\'opaque\' style=\'width:'.$w.' ; height:'.$h.' \'/>';
		}else if (preg_match("#^http://www.youtube.com(.*?)#s", $link)){
			$link = explode("?v=",$link);
		$player='<iframe width="'.$w.'" height="'.$h.'" src="//www.youtube.com/embed/'.$link[1].'?rel=0" frameborder="0" allowfullscreen></iframe>';	
		}else if ((preg_match("#^http://farm.vtc.vn(.*?)#s", $link))||(preg_match("#^http://www.vpoptv.com(.*?)#s", $link)) || (preg_match("#^http://tv24.vn.tivi365.net(.*?)#s", $link))||(preg_match("#^http://tv-msn.com/(.*?)#s", $link)) || (preg_match("#^http://tvod.vn/(.*?)#s", $link))){
		// neu link http la cac link khac thi chen iframe
			$player= '<iframe src="'.$link.'" marginheight="0" scrolling="no" frameborder="0" style="width:'.$w.' ; height:'.$h.' "></iframe>';
			
        }else if (preg_match("#^http://www.vpoptv.com/#s", $link)){
		//link tu vpoptv
			$player= '<embed allowFullScreen=\'true\' src=\''.$link.'&advertisment=0&showChat=0&pwidth='.$w.'&pheight='.$h.'\' type=\'application/x-shockwave-flash\' width=\''.$w.'\' height=\''.$h.'\' allowScriptAccess=\'always\' ></embed>';
				    
		}else if (preg_match("#^(.*?).mp4(.*?)#s", $link) || preg_match("#^(.*?).webm(.*?)#s", $link) || preg_match("#^(.*?).ogg(.*?)#s", $link))
		// link http la cac file video
		{
			$player= '
			<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="'.$w.'" height="'.$h.'"
			  poster="http://video-js.zencoder.com/oceans-clip.png"
			  data-setup="{}">
			<link href="./plugin/video-js/video-js.css" rel="stylesheet" type="text/css">
			<script src="./plugin/video-js/video.js"></script>
			if (preg_match("#^(.*?).mp4(.*?)#s", $link)){
			<source src="'.$link.'" type="video/mp4" />
			}elseif (preg_match("#^(.*?).webm(.*?)#s", $link)){
			<source src="'.$link.'" type="video/webm" />
			{elseif (preg_match("#^(.*?).ogv(.*?)#s", $link)){
			<source src="'.$link.'" type="video/ogg" />
			}
			<track kind="captions" src="./../plugin/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
			<track kind="subtitles" src="./../plugin/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
		  </video>
			';
			$link_mobile=$link;
	
	}else if (preg_match("#^(.*?).m3u8(.*?)#s", $link))
		// link http la cac file playlis
		{
			$player= '
			<script type="text/javascript" src="http://www.vtvplus.vn/jwplayer/jwplayer.js"></script>
			<script type="text/javascript">jwplayer.key="6RfMdMqZkkH88h026pcTaaEtxNCWrhiF6ACoxKXjjiI=";</script>
			<div id="mediaplayer_wrapper" style="position: relative; display: block; width: 100%; height: 435px;"><object type="application/x-shockwave-flash" data="http://www.vtvplus.vn/jwplayer/jwplayer.flash.swf" width="100%" height="100%" bgcolor="#000000" id="mediaplayer" name="mediaplayer" tabindex="0" __idm_id__="42248193"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="seamlesstabbing" value="true"><param name="wmode" value="opaque"></object><div id="mediaplayer_aspect" style="display: none;"></div><div id="mediaplayer_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div></div>
			<script type="text/javascript">            
              jwplayer("mediaplayer").setup({    
                width: \'100%\',
                height: \'435\',
                stretching: \'exactfit\',
                file: "'.$link.'",
                autostart: \'true\'
              });
            </script>
			';
			
	
	}
		else{
			// cac link stream http khac
			$player= '<iframe src="'.$link.'" scrolling="no" frameborder="0" style="width:'.$w.' ; height:'.$h.' "></iframe>';
	}
	} // end HTTP
	else if (preg_match("#^file=(.*?)#s", $link)){
			$player= '<iframe src="http://www.htvc.vn/swfs/StrobeMediaPlayback.swf?'.$link.'&autostart=true&fullscreen=true&controlbar=bottom" scrolling="no" frameborder="0" style="width:'.$w.' ; height:'.$h.' "></iframe>';
		 	$link_mobile=$link;
    }
    else if (preg_match("#^file=(.*?)#s", $link)){
			$player= '<iframe src="http://tvod.vn/sites/all/themes/pcportal_ver2/js/swplayer/StrobeMediaPlaybackDis.swf?'.$link.'&autostart=true&fullscreen=true&controlbar=bottom" scrolling="no" frameborder="0" style="width:'.$w.' ; height:'.$h.' "></iframe>';
			$link_mobile=$link;
	}else if (preg_match("#^rtmp://(.*?)#s", $link) && preg_match("#^(.*?)&file=(.*?)#s", $link)){
	//link kenh thuoc giao thuc rtmp va co duoi &file=
			require ('conf.php');
			$player= '
			<embed allowfullscreen="true" allowscriptaccess="always" flashvars="streamer='.$link.'&amp;type=rtmp&amp;autoplay=true&amp;fullscreen=true&amp;autostart=true&amp;controlbar=bottom" quality="high" src="./plugin/player2.swf" style="height:'.$h.'; width: '.$w.';" type="application/x-shockwave-flash" wmode="opaque" __idm_id__="4290561">';
			$link_mobile=$link;
	}else if (preg_match("#^rtmp://(.*?)#s", $link)){
			$player= '
			<script type="text/javascript" src="http://www.vtvplus.vn/jwplayer/jwplayer.js"></script>
			<script type="text/javascript">jwplayer.key="6RfMdMqZkkH88h026pcTaaEtxNCWrhiF6ACoxKXjjiI=";</script>
			<div id="mediaplayer_wrapper" style="position: relative; display: block; width: 100%; height: 435px;"><object type="application/x-shockwave-flash" data="http://www.vtvplus.vn/jwplayer/jwplayer.flash.swf" width="100%" height="100%" bgcolor="#000000" id="mediaplayer" name="mediaplayer" tabindex="0" __idm_id__="42248193"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="seamlesstabbing" value="true"><param name="wmode" value="opaque"></object><div id="mediaplayer_aspect" style="display: none;"></div><div id="mediaplayer_jwpsrv" style="position: absolute; top: 0px; z-index: 10;"></div></div>
			<script type="text/javascript">            
              jwplayer("mediaplayer").setup({    
                width: \'100%\',
                height: \'435\',
                stretching: \'exactfit\',
                file: "'.$link.'",
                autostart: \'true\'
              });
            </script>';
			$link_mobile=$link;
	}else if ((preg_match("#^mms://(.*?)#s", $link)) || (preg_match("#^rtsp://(.*?)#s", $link))){
			//dinh dang MMS
			$player = '<EMBED EnableContextMenu="0" type="application/x-mplayer2" SRC="'.$link.'"  pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" showstatusbar="1" style="width:'.$w.' ; height:'.$h.' ">
			<div class="alert alert-warning margin-3">Cài đặt Windows MediaPlayer plugin để xem kênh này</div>
			';
			$link_mobile='<a href="'.$link.'" class="alert-link">Bấm để mở, hoặc copy link vào Player của điện thoại</a>';
	}
	else{
		$player= '<div align="center"><strong>Not supported! -- Hiện chưa hỗ trợ link này</strong></div>';
	}
	
	echo '<div id="MPlayer">';
	echo $player.'</div>';
	
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	{ // kiem tra trinh duyet mobile
		echo '
		<div id="mobile" class="alert alert-info margin-10 "><span class="glyphicon glyphicon-hand-right"></span>Xem hướng dẫn xem Tivi điện thoại</div>';
		if (preg_match("#^(.*?)://(.*?)#s", $link_mobile)){
			echo '<div id="mobile2" class="hidden" ><div class="alert alert-info margin-10"><div class="alert alert-warning margin-3"><a href="'.$link_mobile.'" class=" alert-link">';
			echo 'Bấm vào đây để mở bằng ứng dụng xem video trên điện thoại của bạn.</a></div><br />
				<b>* Yêu cầu:</b><br />
				- iOS: Cài đặt <a href="https://itunes.apple.com/us/app/fresh-video-player-movie-player/id593975389?mt=8">Fresh Video Player</a><br />
				- Android: Cài đặt <a href="https://play.google.com/store/apps/details?id=com.mxtech.videoplayer.ad&hl=vi">MX Player trên CH Play</a>
			</div>
			<a class="hid" href="#">Ẩn</a>
			</div>';
			
		}else
			echo '<div class="alert alert-warning">Chưa hỗ trợ cho iOS</div>';

	}
	

			
	
}	
function show_list($cat_id="1"){
	//include './include/config.php';
	include './include/db.php';
	$cat_id = mysql_real_escape_string($cat_id);
	$sql = sprintf('SELECT * FROM kenh WHERE danhmuc_id="%d"',$cat_id);
	$query = mysql_query($sql) or die("Khong the ket noi CSDL"); 
	echo ' <div class="panel-heading"><b>'.get_cat_title($cat_id).'</b></div>';
	echo '<div class="panel-body"><form action="#" method="post">';
	echo '<ul>';
		if(mysql_num_rows($query)){
				while($rows=mysql_fetch_assoc($query)){					
				echo '<li>';				
				  //echo '<a name="kenh" href="./index.php?cat='.$cat_id.'&id='.$rows['kenh_id'].'&chn='.removesign($rows['kenh_des']).'">';
				  // Rewrite
				  echo '<a name="kenh" href="./'.$cat_id.'_'.$rows['kenh_id'].'_'.removesign($rows['kenh_des']).'.html">';
					if($rows['kenh_logo']==''){
						echo '<span>'.$rows['kenh_name'].'</span>';
					}
					else  echo '<img src='.$rows['kenh_logo'].' title="'.$rows['kenh_des'].'" width="130px" height="43px"></a>';
				echo '</li>';				
				}											
			}
	
		else echo 'Chưa có kênh nào.';
	echo '<ul></form></div>';
	mysql_close();
	}
function show_cat(){
	require './include/db.php';
	$sql = sprintf('SELECT danhmuc_name, danhmuc_id, danhmuc_des FROM danhmuc ORDER BY danhmuc_stt ASC');
	$query = mysql_query($sql) or die("Khong the ket noi CSDL"); 
		echo '<ul>';
			while($rows=mysql_fetch_assoc($query)){					
				// echo '<li><a href="./index.php?cat='.$rows['danhmuc_id'].'&n='.removesign($rows['danhmuc_name']).'" title="'.$rows['danhmuc_des'].'"><span class="glyphicon glyphicon-stats"></span>'.$rows['danhmuc_name'].'</a></li>';
				echo '<li><a href="./'.$rows['danhmuc_id'].'_'.removesign($rows['danhmuc_name']).'.html" title="'.$rows['danhmuc_des'].'"><span class="glyphicon glyphicon-stats"></span>'.$rows['danhmuc_name'].'</a></li>'; // Rewwrite
			}
		echo '</ul>';
	mysql_close();
	}
function show_option_cat(){  // hien thi lua chon danh muc trong admin
	//include './include/config.php';
	
	$sql_o = sprintf('SELECT danhmuc_name, danhmuc_id FROM danhmuc');
	$query_o = mysql_query($sql_o) or die("Khong the ket noi CSDL"); 
		echo '<option value="NULL">Chọn danh mục</option>';
		while($rows=mysql_fetch_assoc($query_o)){
				($_REQUEST['select_catid']==$rows['danhmuc_id']) ? $selected = 'selected': $selected = '';
				echo '<option '.$selected.' value="'.$rows['danhmuc_id'].'">'.$rows['danhmuc_name'].'</option>';
		}
	}
function get_cat_title($id){			//function cho ra Tên kênh tivi tu ID

	$id = mysql_real_escape_string($id);
	$sql = sprintf('SELECT danhmuc_des FROM danhmuc WHERE danhmuc_id="%d"',$id);
	$result = mysql_query($sql) or die (mysql_error());
	if ($row = mysql_fetch_array($result)) {
		return $row['0'];
		}
	else return 0;

	}
function get_chanel_byid($id=null,$cat=null){			//function cho ra link tivi tu ID
	require_once('./include/db.php');
	$id = mysql_real_escape_string($id);
	if(($id == null ) && ($cat == null)){
	$sql = sprintf('SELECT kenh_url FROM ( SELECT * FROM kenh WHERE 1 ORDER BY kenh_view DESC ) foo WHERE 1 LIMIT 0,1');
	}elseif (($id == null ) && ($cat != null)) {
		$sql = sprintf('SELECT kenh_url FROM ( SELECT * FROM kenh WHERE 1 ORDER BY kenh_view DESC ) foo WHERE danhmuc_id = %d LIMIT 0,1',$cat);
	}
	else{
	$sql = sprintf('SELECT kenh_url FROM kenh WHERE kenh_id="%d"',$id);
	}
	$result = mysql_query($sql);
	
	if ($row = mysql_fetch_array($result)) {
		return $row['0'];
		}
	else echo '<script>alert("Kênh này hiện không thể phát được vui lòng trở lại và chọn lại kênh khác!");history.go(-1);</script>'; return 0;
	mysql_close();
	}
function get_chaneltitle($id,$cat=null){			//function cho ra Tên kênh tivi tu ID
	require_once('./include/db.php');
	if(($id == null)&&($cat == null)){
		$sql = sprintf('SELECT kenh_name FROM ( SELECT * FROM kenh WHERE 1 ORDER BY kenh_view DESC ) foo WHERE 1 LIMIT 0,1');
	}elseif (($cat != null)) {
		$cat = mysql_real_escape_string($cat);	
		$sql = sprintf('SELECT kenh_name FROM kenh WHERE danhmuc_id = "%d" ORDER BY kenh_view DESC LIMIT 0,1',$cat);
	}
	else{
	$id = mysql_real_escape_string($id);
	$sql = sprintf('SELECT kenh_name FROM kenh WHERE kenh_id="%d"',$id);
	}
	$result = mysql_query($sql);
	
	if ($row = mysql_fetch_array($result)) {
		return $row['0'];
		}
	else return 0;
	mysql_close();
	}
function delete_danhmuc($id){
	$id = mysql_real_escape_string($id);
	$sql = sprintf('DELETE FROM `danhmuc` WHERE `danhmuc_id` ="%d"',$id);
	$result = mysql_query($sql);
		//$query = mysql_query($sql) or die(mysql_error()); 
		return $result;
	}
	




function search($q){ // hàm tìm kiếm
	//$q=removesign($q);
	require('./include/db.php');
	$q=mysql_real_escape_string($q);
	$q=anti_sql($q);
	$q=strtolower($q);
	$q=str_replace(" ","%",$q);
	$sql = sprintf("SELECT * FROM kenh WHERE kenh_name LIKE '%s%s%s' ORDER BY kenh_view DESC",'%',$q,'%');
	$query = mysql_query($sql) or die(mysql_error()); 
	
		echo '<div class="list-group list-group-static-top">';
		if(mysql_num_rows($query)){
			while($rows=mysql_fetch_assoc($query)){		
				echo '<a class="list-group-item" href="./?id='.$rows['kenh_id'].'&chn='.removesign($rows['kenh_name']).'">';
				echo '<img class="media-object pull-left" style="margin:5px 2px 5px 0px;" src="'.$rows['kenh_logo'].'" alt="'.$rows['kenh_name'].'" width="120px" height="50px">';	
				
				echo '<p style="margin-left: 10px"><h4 class="list-group-item-heading">'.$rows['kenh_name'].'</h4>';
				echo '<p class="list-group-item-text">'.$rows['kenh_des'].'</p></p>';
				echo '</a>';
			}
		} //End if mysql_num_rows($query)
		else echo '<h4>Không có kết quả nào trùng khớp với từ khóa.</h4>';
		echo '</div>';
	mysql_close();
	}

function count_sql($in='kenh',$id=null){
	$id = mysql_real_escape_string($id);
	$in = mysql_real_escape_string($in);
	if($id!=null){
		$sql = sprintf('SELECT COUNT(%s_id) FROM %s WHERE danhmuc_id=%d;',$in,$in,$id);
		$query = mysql_query($sql) or die(mysql_error()); 
		return mysql_result($query,0);
	}else{
		$sql = sprintf('SELECT COUNT(%s_id) FROM %s;',$in,$in);
		$query = mysql_query($sql) or die(mysql_error()); 
		echo mysql_result($query,0);
	}
	
}


?>
