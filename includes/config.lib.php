<?php
class config
{	
	var $configIsFile;
	var $configFileNew;
	var $configError;
	var $configLastError;
	var $configArrayVars;
	function config()	{	$this->configFileNew = false;
		$this->configIsFile = false;
		$this->configError = null;
		$this->configLastError = null;
		$this->configArrayVars = null;}
		
	function config_setNewFile($file)
	{$this->configIsFile = $file;}
	
	function config_setFile($file){
		if(file_exists($file))
		{
			$this->configIsFile = $file;
			return true;
		}#end if
		else
		{
			$error = "File not exist";
			$this->configError = $this->configError.$error;
			$this->configLastError = $error;
			return false;
		}
	}
	
	function config_createFile()
	{	$handle = fopen($this->configIsFile, 'w');
		fclose($handle);
		$this->configFileNew = true;
	}
	
	function config_getError()	{
		return $this->configError;	}
		
	function config_getLastError()
	{	return $this->configLastError;
	}
	function config_set($var,$value)
   {
   $c = count($this->configArrayVars);  
     
 	  $cc = 0;
	   $x=0;
	  while($cc <= $c) //= if new file
	  {
			  $agrego=true;	   		
			if ( $this->configArrayVars[$cc][0]==$var)
	   		{			
			$this->configArrayVars[$cc][1] = $value;
			//echo "update $value<BR>";
			$agrego=false;
			break;
			};	   		
	  		$cc++;			
	   } //while
	   					if ($agrego==true)
	   					{									
						 $x++;
						$this->configArrayVars[$c+x][0] = $var;
	 					 $this->configArrayVars[$c+x][1] = $value;
						// echo "agrego $value <BR>";
				   		}	   
   
   }
 function config_openFile()
	{
		if($this->configFileNew == true)
		{return true;}
		   $handle = fopen($this->configIsFile, "r");
    $c = fread($handle, filesize($this->configIsFile));
    fclose($handle);
    $c = str_replace("\n","",str_replace("?>", "", str_replace("<?php", "", str_replace("'", "", str_replace(";", "", $c)      ))));
    $c = explode("$",$c);
    $c1 = null;
    $s = count($c);
    $s1 = 0;
    $s2 = 0;
    while($s1 < $s)
    {
    	if($c[$s1] != null)
    	{
    		#$c1[$s2] = $c[$s1];
    		$c1[$s2] = explode("=",$c[$s1]);
    		$c1[$s2][0] = str_replace(" ","",$c1[$s2][0] );
    		$c1[$s2][1] = str_replace(" ","",$c1[$s2][1] );
    		$s2++;
    	}// if
    	$s1++;
    }//while
    $this->configArrayVars = $c1;
    return true;
  }//close function
	function config_closeFile()
  {
	  $string = null;
   	  $string = $string."<?php\n";
	  #add comments
	  $string = $string.$this->configArrayVars['comments'];
	  unset($this->configArrayVars['comments']);	
	  $c = count($this->configArrayVars);
	  $cc = 0;
	  while($cc < $c)
	  {
		  $this->configArrayVars[$cc][0] = "$".$this->configArrayVars[$cc][0]; #add ' and = and ; and \n to vars values		 
		  if($this->configArrayVars[$cc][1] == 'null' OR $this->configArrayVars[$cc][1] == 'NULL')
		  {$this->configArrayVars[$cc][1] = " = ".$this->configArrayVars[$cc][1].";\n";  }
		  else
		  {
		    $this->configArrayVars[$cc][1] = " = '".$this->configArrayVars[$cc][1]."';\n";
		  }#end else
		  #join all
		  $string = $string.$this->configArrayVars[$cc][0].$this->configArrayVars[$cc][1];
		  $cc++;
	  }//while
	 	  $string = $string."?>\n";//end
	  if (!$handle = fopen($this->configIsFile, 'w')) 
	  {      return false; }
       if (fwrite($handle, $string) === FALSE) 
    {   return false; }
    fclose($handle);
    return true;
  }//close function
}#end class
?>