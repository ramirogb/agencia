<?php 
$template = 'templates/reservation_es.htm'; //input  
$prefix=rand(100,10000);
//$prefix='';
$template2 = 'templates/reservation_'.$prefix.'.htm';//output
$template22 = 'reservation_'.$prefix; //.'.htm';//output
$templateDoc = 'templates/reservation_'.$prefix.'.doc';//output



function prepare_template($cotiza,$reserva, $CODIGO_DE_OPE,$table, $table2,$download=false)
{
//this global vars are from configuration.php dont remove!
global $template,$template2,$date_reserv,$FECHA,$date_reserv,
 $templateDoc,$hour_reserv, $minutes_reserv, $service_reserv,$descript_reserv,$type_reserv,$lang_reserv,$unit_price,$total_reserv;


if ($cotiza==1) {$header_doc=$quoteH; } //simple message for template reservation_es.php
if ($reserva==1) {$header_doc=$reservH; }

 $sql_="select * from $table,$table2,agencias, users where $table2.DocNro=$table.DocNro and $table2.DocNro='$CODIGO_DE_OPE' and agencias.AgeCdg=$table2.AgeCdg";
$result_ = query_db($sql_);
$row=query_db_assoc($result_);
   $AGENCIA=$row['AgeDsc'];   $CONTACTO=$row['AgeCto'];   $TELEFONO=$row['AgeFon'];
   $TELEFONO24=$row['AgeFon2'];   $dformat = 'd-m-Y';   $FECHA_DE_SOLICITUD=date($dformat,$row['timestamp']);
   $HORA_SOL=date("H:i:s ",$row['timestamp']);  
    $FECHA_DE_CONFIRMACION=date($dformat,$row['date_confirm']).date(' H:i:s', $row_reserv['date_confirm']);
	   $ESTADO_DE_RESERVA= $row['state_reserv'];	
   $NOMBRE_DE_GRUPO=$row['paxname'];    $NUMERO_DE_PAX=$row['paxnumber'];   $PAIS=$row['country'];	
   $FE_LIM_PREPAGO=date($dformat,$row['FecLimPrePag']);
   $separator='<BR>';   
   //$TIPO_DE_SERVICIO=$row3x8['AgeCto'];$IDIOMA_DE_GUIADO=$row3x8['AgeCto'];	
   
    $FECHA=''; $Hour='';	$SERVICIO='';	$TIPO='';	$GUIADO='';	$Nro_Pax='';	$Costo_Unitario='';	$TOTAL='';
   	//$observations=$row['Obs'];
	global $confirmed,$canceled,$pending;
   if ($ESTADO_DE_RESERVA==1){ $ESTADO_DE_RESERVA=$confirmed; }
   if ($ESTADO_DE_RESERVA==2){ $ESTADO_DE_RESERVA=$canceled; }
   if ($ESTADO_DE_RESERVA==''){ $ESTADO_DE_RESERVA=   $pending; }
   
  $sql_lang="select * from countries where id=' $PAIS' "; 
$in = query_db($sql_lang) ;
$imm= query_db_assoc($in);
 $PAIS=$imm['Name'];

//fill template for "services" 
$los_services_1= "<table width=\"100%\"  class=\"tables\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";

$los_services_3='</table>' ;
$SUMA_SUB_TOTALES=0; //header

$los_servicesR2=  "<tr><td>&nbsp; $date_reserv: </td><td>$hour_reserv $minutes_reserv&nbsp;</td><td>&nbsp; </td><td>&nbsp;$service_reserv</td><td>&nbsp;$type_reserv</td><td>&nbsp;$lang_reserv</td><td>&nbsp;N. Pax</td><td>&nbsp;$unit_price</td><td>&nbsp;$total_reserv</td></tr>";
$TAXES= $row['taxes'];

 $sql_services="select * from $table,servicios where $table.DocNro= '$CODIGO_DE_OPE' and $table.SerCdg= servicios.SerCdg "; 
$result_services = query_db($sql_services) ;
$row2= query_db_assoc($result_services);
 
 do
 {/////////////
  $FECHA=  date($dformat,$row2['FecAdd']);
  $HOR=date('   H:i', $row2['FecAdd']); 
  //$Hour=$_SESSION['hour'][$i];$minutes
  $SERVICIO=$row2['SerCdg']; 
  
  $serv_descrip=$row2['SerDsc'];
  $comenta=$row2['comment'];
  
  $ti=$row2['tipe'];
  if (!(strcmp("TRUE", $ti  ) ) ) {$TIPO= 'Privado';}
  if (!(strcmp("FALSE", $ti ) ) ) {$TIPO= 'Compartido';}else {$TIPO= 'Privado';}

  $ti=$row2['lang'];	  
 $sql_lang="select * from languajes where lang='$ti' "; 
$in = query_db($sql_lang) ;
$imm= query_db_assoc($in);
$GUIADO=$imm['lang_descript'];

$Nro_Pax= $row2['Paxs'];	
$Costo_Unitario=$row2['price1'];
$TOTAL=$row2['pricet'];
$SUMA_SUB_TOTALES = $SUMA_SUB_TOTALES + $TOTAL;//data
$los_services_2=  "<tr><td>&nbsp;$FECHA</td><td>$HOR&nbsp;</td><td>&nbsp;</td><td>&nbsp;$SERVICIO $serv_descrip</td><td>&nbsp;$TIPO</td><td>&nbsp;$GUIADO</td><td>&nbsp;$Nro_Pax</td><td>&nbsp;$Costo_Unitario</td><td>&nbsp;$TOTAL</td></tr>";
$los_comments.="$SERVICIO $comenta";
//echo '<BR>';
$los_servicesR2.=$los_services_2; //replace var
$los_comments2.="$SERVICIO:  $comenta$separator".$row['Observ'];; 
 
 }/////////////
 while ($row2= query_db_assoc($result_services) );
$TAXES=$row['taxes'];
$costoTT= $SUMA_SUB_TOTALES+$TAXES;
 $sendhtml=='TRUE';
                
//	AddAttachment

$salida=array( $AGENCIA,                        $CONTACTO,                $TELEFONO,             $TELEFONO24,   $FECHA_DE_SOLICITUD,    $FECHA_DE_CONFIRMACION,$FE_LIM_PREPAGO,
                   $HORA_DE_CONFIRMACION,  $ESTADO_DE_RESERVA,       $CODIGO_DE_OPE,         $NOMBRE_DE_GRUPO,        $NUMERO_DE_PAX,                    $PAIS,
				   $TIPO_DE_SERVICIO,       $IDIOMA_DE_GUIADO,                   $FECHA,                    $Hour,             $SERVICIO,                    $TIPO,
				   $GUIADO,                     $Nro_Pax,             $Costo_Unitario,                $TOTAL,                 $costoTT, $HORA_SOL,$TAXES,$SUMA_SUB_TOTALES,$header_doc);
				 
				
	 if(!($fp= fopen ($template, "r"))) die ("Can't open");
        $dataText = fread($fp, 2000000);
        fclose ($fp);
		
		   
	$entrada=array( _AGENCIA,                        _CONTACTO,                _TELEFONO,             _TELEFONO24,   _FECHA_DE_SOLICITUD,    _FECHA_DE_CONFIRMACION, FE_LIM_PREPAGO,
                   _HORA_DE_CONFIRMACION,  _ESTADO_DE_RESERVA,       _CODIGO_DE_OPE,         _NOMBRE_DE_GRUPO,        _NUMERO_DE_PAX,                    _PAIS,
				   _TIPO_DE_SERVICIO,       _IDIOMA_DE_GUIADO,                   _FECHA,                    _Hour,             _SERVICIO,                    _TIPO,
				   _GUIADO,                     _Nro_Pax,             _Costo_Unitario,                _TOTAL,                        _SUMATOTAL, _HORA_SOL, _TAXES, CSUMA_SUB_PARTIALS,_HEADER_DOC);
	
	//FILLING THE TEMPLATE BEGIN===================
//$dataText		 	    tiene la plantilla
 $dataText = str_replace($entrada,$salida, $dataText); //reemplaza las cabeceras DATOS GENERALES
 
 $los_servicios=$los_services_1.$los_servicesR2.$los_services_3; //Concatenates for creating a table 
 $dataText = str_replace ('$SERVICIO__',$los_servicios, $dataText); //reemplaza los servicios de $SERVICIO__ 
 
  $dataText = str_replace (' $TOTAL',$los_servicios, $dataText); //reemplaza los servicios de $SERVICIO__ 

 
 $dataText = str_replace ('$observations__',$los_comments2, $dataText); //reemplaza los commentarios, ya esta todo
 
//FILLING THE TEMPLATE END=========================
	 
	
	 touch($template2);
	 if(!($fcc= fopen ($template2, "w"))) die ("Can't open");
     fwrite($fcc,$dataText,strlen($dataText) );
	 fclose($fcc);
	
    include("html_to_doc.inc.php");	
	$htmltodoc= new HTML_TO_DOC();	
	if ($download==true) 
	{
	$htmltodoc->createDoc($template2,$templateDoc,true);
	}
	else
	{
	$htmltodoc->createDoc($template2,$templateDoc,false);
	}
	unlink($template2);

}//end of function

?>