var
gra;
function init()
{
	
	}

function dowork(pCtrl,var2,var3)//s[1],1,serviciox
{ var url;
	httpObject = getHTTPObject();
if (httpObject != null) {
	url="quote.php?action="+var3+'&field='+var2+'&service='+document.getElementById(pCtrl).value;
//alert(url);
httpObject.open("GET",url , true);//era get
gra=var2;
httpObject.onreadystatechange = setOutput;
httpObject.send(null);}}

function getHTTPObject(){
if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
else if (window.XMLHttpRequest) return new XMLHttpRequest();
else {alert("Your browser does not support AJAX.");return null;}}

function setOutput(){
	//alert(gra);
pCtrl=gra;
if(httpObject.readyState == 4){
var combo = document.getElementById(pCtrl);
combo.options.length = 0;
var response = httpObject.responseText;
var items = response.split(";");
var count = items.length;
for (var i=0;i<count;i++){
var options = items[i].split("-");
combo.options[i] =new Option(options[0],options[1]);
}}}
var httpObject = null;
	
function nuevoAjax(){
	var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	} catch (E) {
 			xmlhttp = false;
 		}
  	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function ajaxFunction(pCtrl){
	var t1, t2, t3,t8,contenedor;
	//contenedor = document.getElementById('contenedor');	
	
	t3 = document.getElementById(pCtrl).name;//example dat[3]
	
	t1 = document.getElementById(pCtrl).value;	
	t8=(t3.substring(0,6)); //send true or false for a checkbox not the value
	if (t8=='action')	{ t1 = document.getElementById(pCtrl).checked;	}
	if (t8=='taxigv')	{ t1 = document.getElementById(pCtrl).checked;	}
	//alert(t8);
	
	//if t3=='action'
	ajax=nuevoAjax();
	t2="quote.php?aj="+t1+"&ajj="+t3 ;	
	ajax.open("GET",t2 ,true);
	//alert(t2);
	
	
	ajax.onreadystatechange=function()
	 {
		if (ajax.readyState==4) {
		//contenedor.innerHTML = ajax.responseText
	 	}
	}
	
	ajax.send(null)
	
}

function update_debt(){
	var ajaxRequest;  // The variable that makes Ajax possible!

	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var add_amount = document.getElementById('add_amount').value;
	var add_comments = document.getElementById('xadd_comments').value;
	var add_type = document.getElementById('add_type').value;
	var add_id = document.getElementById('add_id').value;
	var queryString ="?add_amount=" + add_amount + "&add_comments=" + add_comments + "&add_type=" + add_type+'&action=update_amount&id='+add_id;	
	//alert(queryString);
	ajaxRequest.open("GET", "quote.php" + queryString, true);
	ajaxRequest.send(null); 
}

//-->
function sel_lang(a)
{
	var ajaxRequest;  // The variable that makes Ajax possible!
//alert(a);
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}

	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv4');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	
	var queryString ="?action=get_lang&id="+a;
	//alert(queryString);
	ajaxRequest.open("GET", "quote.php" + queryString, true);
	ajaxRequest.send(null); 
}



function show_his(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}

	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv3');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var add_id = document.getElementById('add_id').value;
	var queryString ="?action=show_his&id="+add_id;
	ajaxRequest.open("GET", "quote.php" + queryString, true);	ajaxRequest.send(null); 
}



function show_paxes(){
	var ajaxRequest;	
	try{
		ajaxRequest = new XMLHttpRequest();
	} catch (e){		
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){alert("Your browser broke!");
				return false;
			}}}
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv3');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var add_id = document.getElementById('add_id').value;
	var queryString ="?action=show_paxes&id="+add_id;
	ajaxRequest.open("GET", "quote.php" + queryString, true);	ajaxRequest.send(null); 
}




function show_pays(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}

	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv2');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}
	var add_id = document.getElementById('add_id').value;
	var queryString ="?action=show_pays&id="+add_id;
	//alert(queryString);
	ajaxRequest.open("GET", "quote.php" + queryString, true);
	ajaxRequest.send(null); 
}



function add_service(){
	var ajaxRequest;	
	try{		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				alert("Your browser broke!");
				return false;
			}}}	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv2');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;}
	}
	var add_id = 1; //document.getElementById('add_id').value;
	var queryString ="?action=add_service&id="+add_id;
	//alert(queryString);
	ajaxRequest.open("GET", "quote.php" + queryString, true);
	ajaxRequest.send(null); 
}

function hideshow(which,elid){
var a,b;
if (!document.getElementById)
return
if (which.style.display=="block")
	{
	pCtrl="com["+elid+"]";
	which.style.display="none";
	 t1 = document.getElementById(pCtrl).size=3;
	}
else
	{	
	pCtrl="com["+elid+"]";
	 t1 = document.getElementById(pCtrl).size=30;
	which.style.display="block";
	
	}
}


function hideshow2(which,elid){
	pCtrl="serv["+elid+"]";
	//alert(document.getElementById(pCtrl).style.display);
if (!document.getElementById)
return

if (which)
{
		
if (which.style.display=="none")
	{	//alert(1);
		
		which.style.display="block";
		which.style.visibility="visible";
		document.getElementById(pCtrl).style.display="none";
	}
else
	{//alert(2);
	which.style.display="none";
	which.style.visibility="hidden";
	document.getElementById(pCtrl).style.display="block";
	}
}//end of if witch
return
}

