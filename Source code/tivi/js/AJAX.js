	$(document).ready(function() { //Script xử lý nút reload captcha
	$("#Send").click(function() {
		var name = $("#name").val();
		var email = $("#email").val();
		var subject = $("#subject").val();
		var content = $("#content").val(); 
		var captcha = $("#captcha").val();
		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		var data_string = 'name=' + name + '&email=' + email + '&content=' + content + '&captcha=' + captcha; 
		
		if(name == "") {
           $("#nameError").slideDown('slow').delay(1000).slideUp('slow');
           $("#name").focus();
           return false;
        }

        if(!email_regex.test(email) || email == "") {
           $("#emailError").slideDown('slow').delay(1000).slideUp('slow');
           $("#email").focus()
           return false;
        }
        if(subject == "") {
               $("#subjectError").slideDown('slow').delay(1000).slideUp('slow');
               $("#subject").focus();
               return false;
        }
        if(content == "") {
           $("#contentError").slideDown('slow').delay(1000).slideUp('slow');
           $("#content").focus()
           return false;
        }

        if(captcha == "") {
           $("#captchaError").slideDown('slow').delay(1000).slideUp('slow');
           $("#captcha").focus()
           return false;
        }
	});
	$("#load_captcha").click(function() {
        change_captcha();
    });  // end click(function()
    function change_captcha() {
        document.getElementById('img_captcha').src="./include/captcha.php?rnd=" + Math.random();
    } //end change_captcha()
}); // end ready(function()
