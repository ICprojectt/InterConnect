window.onload = function(){
	sendAjaxRequest("http://115.28.73.231/",function() {  
    if (XMLHttpReq.readyState == 4) {  
        if (XMLHttpReq.status == 200) {  
            var text = XMLHttpReq.responseText;   
            text = window.decodeURI(text);  
            alert("1");
        }  
      	else{
      		alert("2");
      	}
    }  
});
}
var XMLHttpReq;  
function createXMLHttpRequest() {  
    try {  
        XMLHttpReq = new ActiveXObject("Msxml2.XMLHTTP");//IE高版本创建XMLHTTP  
    }  
    catch(E) {  
        try {  
            XMLHttpReq = new ActiveXObject("Microsoft.XMLHTTP");//IE低版本创建XMLHTTP  
        }  
        catch(E) {  
            XMLHttpReq = new XMLHttpRequest();//兼容非IE浏览器，直接创建XMLHTTP对象  
        }  
    }  
  
}  
function sendAjaxRequest(url,processResponse) {  
    createXMLHttpRequest();   
    XMLHttpReq.open("post", url, true);  
    XMLHttpReq.onreadystatechange = processResponse; 
    XMLHttpReq.send(null);  
}   
  
function select(img){
	alert(img.getElementsByTagName("span")[0].getAttribute("class"));
}
