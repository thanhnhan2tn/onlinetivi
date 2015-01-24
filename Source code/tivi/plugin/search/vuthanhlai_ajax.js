/***********************************************
* Drop Down/ Overlapping Content- © Dynamic Drive (Dynamic Drive DHTML(dynamic html) & JavaScript code library)
* This notice must stay intact for legal use.
* Visit Dynamic Drive DHTML(dynamic html) & JavaScript code library for full source code
***********************************************/
function getposOffset(overlay, offsettype){
var totaloffset=(offsettype=="left")? overlay.offsetLeft : overlay.offsetTop;
var parentEl=overlay.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}
function overlay(curobj, subobjstr, opt_position){
if (document.getElementById){
var subobj=document.getElementById(subobjstr)
subobj.style.display="block"
var xpos=getposOffset(curobj, "left")+((typeof opt_position!="undefined" && opt_position.indexOf("right")!=-1)? -(subobj.offsetWidth-curobj.offsetWidth) : 0) 
var ypos=getposOffset(curobj, "top")+((typeof opt_position!="undefined" && opt_position.indexOf("bottom")!=-1)? curobj.offsetHeight : 0)
subobj.style.left=xpos+"px"
subobj.style.top=ypos+"px"
return false
}
else
return true
}

function overlayclose(subobj){
document.getElementById(subobj).style.display="none"
}
var xmlHttp3 
function showHint(word) 
{ 
document.getElementById('search_results').innerHTML = '<p></p><p></p><p align="center" class="smallfont"><img src="http://sinhvienit.net/@forum/images/progress.gif" />Đang Tìm Kiếm..</p>';
    xmlHttp3=GetXmlHttpObject3() 
    if (xmlHttp3==null) 
    { 
        alert ("Browser does not support HTTP Request") 
        return 
    } 
    var url="ajax_search.php" 
    url=url+"?tukhoa="+word 
    xmlHttp3.onreadystatechange=stateChanged3 
    xmlHttp3.open("GET",url,true) 
    xmlHttp3.send(null) 
} 

function stateChanged3() 
{ 
    if (xmlHttp3.readyState==4 || xmlHttp3.readyState=="complete") 
    { 
document.getElementById("search_results"). innerHTML='<div align="left"><a href="#" onClick="overlayclose(\'search_results\'); return false">Đóng</a></div>'+xmlHttp3.responseText; 
return overlay(this, 'search_results')
    } 
} 

function GetXmlHttpObject3() 
{ 
    var objXMLHttp3=null 
    if (window.XMLHttpRequest) 
    { 
        objXMLHttp3=new XMLHttpRequest() 
    } 
    else if (window.ActiveXObject) 
    { 
        objXMLHttp3=new ActiveXObject("Microsoft.XMLHTTP") 
    } 
    return objXMLHttp3 
}