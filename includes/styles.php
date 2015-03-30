<?php 
include('../configuration.php');
//echo 'hola';
header("Content-type: text/css");
 ?>
BODY {
	FONT-SIZE: smaller; COLOR: <?php echo $fontc; ?>; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
	 top:0px;margin-top:0px;margin-left:3px;margin-right:3px 
}

a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}

.comment{
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: smaller; color: #D5D5FF;
}
.commentw{
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: smaller; color: #FFFFFF;
}


.comment2{
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: smaller; color: #FF0000;
}

.comment3{
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 9px; color: #0000CC;
}
.comment4{
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 9px; color: #333399;
}

.man {
font-family:Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF;font-weight:bold;padding-top:8px;
}
.man a{

}

.man a:hover{

}

.boxbordertop	{
background-color:<?php
if ($bgcolor<>'')
echo $bgcolor;
else
echo '#DAEAFD';
  ?>;

	}
.textf
{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size: smaller; color:#999999;
 
}
.text
{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size: smaller;padding-left:2px;  color: <?php echo $fontc; ?>;
 
}

.red
{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size: smaller; color: #666666; background-color: #FFD6CE;
 
}

.red2 {color: #FF0000}

.menu5 a
	{
	display			: block;
	border			: 0px solid #C0D0E0;
	background		: #E0EBF5;
	width			: 98%;
	text-align		: center;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:smaller; color:#333333;
	}

.menu5 a:hover
	{
	background		: #B6E2FA;
	width			: 98%;
	color			: #BEBEBE;
	}
	


.menu56 a
	{
	display			: block;
	border			: <?php echo $border; ?>px solid #C0D0E0;
	background-color:#ACC8EF; 
	background-image: url(../images/bg_blu.png);	
	width			: 100%;
	text-align		: center;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:smaller; color:#333333; height:23px; text-decoration:none;
	}

.menu56 a:hover
	{	
	width			: 100%;
	color			: #6D6363;
	background-color:#ACC8EF; 
	background-image: url(../images/bg_blu2.png);
	}


.menu56_ a
	{
	display			: block;
	border			: <?php echo $border; ?>px solid #C0D0E0;
	background-color:#ACC8EF; 
	background-image: url(../images/bg_blu2.png);	
	width			: 100%;
	text-align		: center;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:smaller; color:#333333; height:23px; text-decoration:none;
	
	}

.menu56_ a:hover
	{	
	width			: 100%;
	color			: #6D6363;
	background-color:#ACC8EF; 
	background-image: url(../images/bg_blu2.png);
	}


.menu57 
	{
	display			: block;
	border			: 0px solid #C0D0E0;
	background-color:ACC8EF; 
	background-image: url(../images/bg_blu.png);	
	text-align		: center;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:smaller; color:#333333; height:23px; text-decoration:none;
	}

.ListView, .ListViewL, .ListViewR{ font-family:Verdana, Arial, Helvetica, sans-serif;
 font-size: x-small; color:#333333; background-color:#DAF1FE;border-color:#8DB2E5;  									
}

.ListViewL{  border-top-style: solid;  border-top-width:1px; border-left-style: solid; border-left-width:1px ;
}
.ListViewR{  border-top-style: solid;  border-top-width:1px; border-right-style: solid; border-right-width:1px ;
}

	
.ListView{ 
  border-top-style: solid; border-top-width:1px;  
}

.ListView a {
text-decoration:none;
}
.ListView a:hover {
text-decoration: underline;
}

.Listx { font-family:Verdana, Arial, Helvetica, sans-serif;
 font-size: x-small; color:#333333;
}

.Listx a {
text-decoration:none;
}
.Listx a:hover {
text-decoration: underline;
}

.urglev{
border-spacing:10px; font-size:x-small;border-spacing:0px; border-width:4px;
}


.ListView2 { 
border-bottom-width:1;
 border-bottom-color: #000000;
  background-color: #E5E5E5;
 
}	

.bottom{ font-family:Verdana, Arial, Helvetica, sans-serif;
 font-size: x-small; color:#333333;background-color: <?php echo $bgcolor; ?>; padding:1px;
}

fieldset label, fieldset input, fieldset select {
  display: block;
  float: left;
  margin-bottom: 3ex; 
}

label {
  text-align: right;
  margin-right: 1em;
  margin-bottom: 0em;
  padding: 2px;
  width: 25em; font-family: Verdana, Arial, Helvetica, sans-serif; font-size:smaller;
  }

label.selector {
    font-family:Verdana, Arial, Helvetica, sans-serif;font-size: smaller;
}
input{ border: 1px solid #ccc; }
input:focus { border: 1px solid #000; }
select{ color:#666666; }

input2 { border: 0px; }
.content{
font-family:Verdana, Arial, Helvetica, sans-serif;
 font-size:smaller; font-weight: bold;
}

.minititle {
	FONT-SIZE: smaller;COLOR: #0000CC
	}

.menu6
{
font:Verdana, Arial, Helvetica, sans-serif; font-size:xx-small;
}
.rrr
{ background-color: #FFFFFF;
}


.mio label, fieldset input, fieldset select {
  display: block;
  float: left;
  margin-bottom: 2ex; 
}

.mio label {
  text-align: right;
  margin-right: 3em;
  margin-bottom: 1em;
  padding: 2px;
  width: 20em; font-family: Verdana, Arial, Helvetica, sans-serif; font-size:smaller;
  }

.mio label.selector {
    font-family:Verdana, Arial, Helvetica, sans-serif;font-size: smaller;
}
.mio input{ border: 1px solid #ccc; }
.mio input:focus { border: 1px solid #000; }
.mio select{ color:#666666; font-size:9px; }

.borderL, .borderR,borderT 
{
border-color:#8DB2E5; border-top-style:solid; border-top-width:1px;
 padding-top:4; padding-left:4px; border-left-width:1px; padding-bottom:6px; padding-right:4;
}
.borderL{ 

border-left-style:solid; border-left-width:1px;
border-bottom-width:1px; border-bottom-style:solid;

}

.borderR{

border-right-style:solid; border-right-width:1px;
border-bottom-width:1px; border-bottom-style:solid;
}


.borderLL{ 
border-color:#8DB2E5;
border-left-style: solid; border-left-width:1px; padding-bottom:1px;font-size:x-small;
}

.borderT{ 
border-color:#8DB2E5;
border-top-style: solid; border-left-width:1px; padding-bottom:1px;font-size:x-small;
}


.checa{ 
border: 1px solid #FFFFFF;margin-left:8px;
}

.borderRR{ 
border-color:#8DB2E5;
border-right-style: solid; border-right-width:1px; padding-bottom:1px;
font-family:Verdana, Arial, Helvetica, sans-serif; font-size: x-small; color:#333333;
}

.ningun{
}

.encuadro{ border-color:#D2D2FF; border-style:solid; border-width:1; 
}

.encuadro2{ border-color:#DBDCE2; border-style:solid; border-width:1; 
}
.report{ border-color:#0099FF; border-style:solid; border-width:1;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size: x-small; color:#333333; background-color:#EDF7FE;
 
}

.report1{ border-color:#0099FF; border-bottom-style:solid; border-bottom-width:1;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size: x-small; color:#333333; background-color:#EDF7FE;
 
}


.report2{ border-color:#0099FF; border-bottom-style:solid; border-bottom-width:1; border-left-style:solid; border-left-width:1px;
  
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size: x-small; color:#333333; background-color:#EDF7FE;
 
}

.titulo{
font-family:Verdana, Arial, Helvetica, sans-serif;
color: #003399;
}

.radios input{	
	font-family:Verdana, Arial, Helvetica, sans-serif; margin:0px;
	  display: block;
  float: none; border-width:0;
  margin-bottom:0ex; 
	}
.textoconf{
padding:20px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size: smaller;
 color: #666666;}
 .headertable{
 background-color: #0099FF;
  padding:1px; border-width:1px;
   border-color: #FF0000;
    border-style:solid; color:#FFFFFF; 
 }
 .cellstable{
  padding:1px; border-width:1px;
   border-color: #FF0000;
    border-style:solid; 
 }
 .tables{ border-color:#E1EBFD; border-width:1px; border-style:solid;
 font-family:Verdana, Arial, Helvetica, sans-serif; font-size: x-small; color: #666666; padding:1px;
 }
 
 
 .odd {
	BACKGROUND: #E0E0E0;
}
.even {
	BACKGROUND: #FFFFFC
}

.selodd {
	BACKGROUND: #C1C6F7
}
.seleven {
	BACKGROUND: #C1C6F7
}

.bx-in {
 position: relative;
 font-size: 1.2em;
 line-height: 1.8em;
 margin-left: 12px;	
 margin-right: 12px;	
 margin-top: 5px;border-color:#E1EBFD; border-width:1px; border-style:solid;color: #666666; padding:10px;
 word-wrap: break-word;
}

 