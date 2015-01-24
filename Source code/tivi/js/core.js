var jQuery = jQuery.noConflict();
jQuery(document).ready( function () {
 
//trigger
jQuery('#add_cat').click( function(){
 
//get all the values and put each inside a variable.
var add = jQuery("#add_cat").val();
var danhmuc_name = jQuery(".danhmuc_name").val(); /* you can also hook the value of the field using the ID of the field.*/
var danhmuc_des = jQuery(".danhmuc_des").val(); // 
var danhmuc_stt = jQuery(".danhmuc_stt").val(); // 
if ((danhmuc_name!='') && (danhmuc_des!='') && (!isNaN(danhmuc_stt))) {
	//ajax process
	 jQuery.ajax({
	 type: "POST", //you can also you GET
	 data: ({add:add,danhmuc_name:danhmuc_name,danhmuc_des:danhmuc_des,danhmuc_stt:danhmuc_stt }), //the data will be throwed here
	 url:"./updatedanhmuc.php", //in what file do you want to pass the values
	 success: function(msg) {alert('Thành Công');location.reload();} // what do you want to happen when the process is done? In my case I used an alert for the notification.
	});
}else{
	if((danhmuc_name=='') || (danhmuc_des=='')) {
		alert('Bạn phải nhập đầy đủ thông tin');
	}else{
		alert('STT phải là số nguyên');
	};
};

}); // End jQ add_cat

});