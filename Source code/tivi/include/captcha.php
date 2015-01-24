<?php 
    session_start();
    $captcha = imagecreate(125, 32);
    $bg = imagecolorallocate($captcha, 255, 255, 255);
    $font_color = imagecolorallocate($captcha, 106, 189, 197);
    $font = "../font/UTM-Avo.ttf";
 
    $string = md5(microtime() * mktime());
    $text = substr($string,0,7);
    $_SESSION['security_code'] = $text;
 
    imagettftext($captcha, 20, 0, 5, 25, $font_color, $font, $text);
    header("Content-type: image/png"); 
    imagepng($captcha);
    imagedestroy($captcha);
?>