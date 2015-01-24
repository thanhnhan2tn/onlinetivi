function playandroid(url){
		document.getElementById("player").src=url;
	}
	function detectAndroid()
	{
		var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad)/);
		var isMobile2 = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
		if(isMobile2 && !isMobile)
			return true;
		else
			return false;
	}
	var isRTMP=1;
	if (detectAndroid() && isRTMP==1){
		document.getElementById('mobile').innerHTML='
		<div class="mobile_player alert alert-info margin-10">
			<ul style="list-style: disc">
			<li>Android: Yêu cầu cài đặt <a href="./file/Firefox_28.0.1.apk">Firefox For Android</a> *(<a href="https://play.google.com/store/apps/details?id=org.mozilla.firefox">Link CH Play</a>) và Adobe Flash Player (
			<a href="./file/AdobeFlashPlayer11.1_2.x.apk">Android 2.x, 3.x</a> - <a href="./file/AdobeFlashPlayer11.1_11.1.115.81.apk">Android 4.X trở lên</a>)</li>
			<li>Chưa hỗ trợ cho iOS và Windows Phone</li>
			<li>IP5 chỉ hổ trợ một số kênh HTML5</li>
		</ul><br />
		
		';
	}else{
		document.getElementById('mobile').innerHTML="<span>Xoay ngang màn hình để hiển thị tùy chọn dành cho mobile </span>
	}