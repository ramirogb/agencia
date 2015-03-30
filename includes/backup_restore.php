<?php

/**
 * @author yas500('mohamedigm@gmail.com','mohamedigm@yahoo.com')
 * @copyright 2009
 * @Date 24 April
 * @Phpversion 5.2.8
 */
 
 						/** // // // // // // // // // // // // // // ||
 						// this class is used for backup and          ||
 						// restore mysql server databases or entire   ||
 						// server , can compress backup ,send         ||
 						// to ftp server ,restore from compress again ||
 						*/
 
 

set_time_limit('0');
error_reporting(E_ALL);


abstract class BackupRestore
{
	protected $link;
	protected $db=array();
	protected $table=array();
	protected $text="";
	private $debug='0';
	private $msg=array();
	
		/**
	function construct for logging to database server
	*/
	
	final public function __construct($host='localhost',$user='root',$pass='')
	{
		set_error_handler(array($this,'handleError'));
		
		try{
		$this->connect($host,$user,$pass);	
		}
		catch (exception $e){
			trigger_error($e->getMessage(),E_USER_ERROR);
		}
	}
	
	final private function __destruct()
	{
		if ($this->msg){
		foreach ($era as $rr){
			echo "<b>Note</b>".$rr."<br>";
			}                          
		}
		else
		{
			echo "The mission successfully complete.";
		}
		            //SHOW ERROR NOTES TO USER AFTER END
	}
	
	final public function handleError($errno,$errmsg,$errfile,$errline)
	{
        
		
        if ($this->debug == '0'){
			switch ($errno){
				case E_USER_ERROR:
				case E_WARNING:
				echo $errmsg;
				exit();
				break;
				
				case E_USER_WARNING:
				case E_USER_NOTICE:
				$this->msg[]=$errmsg;
				return true;
				break;
				
				case E_NOTICE:
				case E_STRICT:
				return true;
				break;
				
				default:
				echo "UNKNOWN ERROR OCCURED";
				exit();
			}
		}
		
		if ($this->debug == '1'){
		$errmsg=(strpos($errmsg,'Mysql'))? mysql_error():$errmsg;
		echo "<b>".$errno."</b>: ".$errmsg." <b>LINE: ".$errline."</b>"."<br><b><i>In file</i></b> ".$errfile."<hr>";
		exit();
		}
	}
	
	
	final private function connect($host,$user,$pass)
	{
	
	if (! $this->link= mysql_connect($host,$user,$pass))
	throw new exception ("Mysql:couldn't connect to database server or invalid inforamtion");
	}
	
	
	// if you have multiple dbs enter them in that sequence
	// $db1,$db2,..
	// or leave it and it will backup the entire server databases
	
	final public function setDbs($db='*')
	{
		$db=trim($db);
		if (empty($db) || $db == '*'){
			$list=mysql_list_dbs($this->link);
			$rows=query_db_num($list);
			if($rows == 0){
				trigger_error("Mysql:THERE IS NO DATABASES ON THE SERVER!!",E_USER_ERROR);
			}
			for($i=0;$i<$rows;$i++){
				$this->db[]=mysql_tablename($list,$i);
			}
		}
		else{
			$db=explode(",",$db);
			$this->db=$db;
		}
	}
	
	/**
	// this method will be for selecting tables or ignore it and
	// it will backup all tables
	*/
	
	final public function selectTable($table='*')
	{
		$table=trim($table);
		if($table == '')
		$table='*';
		if (! $table=="*" && count($this->db) > '1'){
			trigger_error("you can't specify tables if you want more than one db",E_USER_ERROR);
		}
		
		if ($table == "*"){
			foreach ($this->db as $name){
				$list=mysql_list_tables($name);
				$rows=query_db_num($list);
				for($i=0;$i<$rows;$i++){
					$this->table[$name][]=mysql_tablename($list,$i);
				}
			}
		}
		else{
			$table=explode(",",$table);
			foreach($table as $tb){
				$this->table[$this->db['0']][]=$tb;
			}
		}
	
	}
	
	/**
	// method for selecting the query required
 	// for backup
 	// this is ahabit for me to store all queries required in amethod and call it
	*/
	
	final protected function selectQuery($type)
	{
		$query=array(1=>"SHOW CREATE DATABASE ","SHOW CREATE TABLE ","INSERT INTO ","DROP DATABASE IF EXISTS ","DROP TABLE IF EXISTS ","SELECT * FROM ");
		return $query[$type];
	}
	
	/**
	method for validate file before restore database
	*/
	
	final protected function getFile($file)
	{
		$this->text="";
		switch ($file){
			case (!file_exists($file)):
			trigger_error("File doesn't exist!!",E_USER_ERROR);
			return false;
			break;
			case (!is_file($file)):
			trigger_error("This not valid file",E_USER_ERROR);
			return false;
			break;
			case (!is_readable($file)):
			trigger_error("Can't get access to the file!!",E_USER_ERROR);
			return false;
			break;
			case (! ereg("\.sql$",$file) && ! ereg("\.gz$",$file) && ! ereg("\.txt$",$file)):
			trigger_error("This is not avalid file name.",E_USER_ERROR);
			break;
			return false;
			default:
			if(ereg("\.gz$",$file)){
				if(!$gz=gzopen($file,'rb'))
				trigger_error("couldn't open compressed file",E_USER_ERROR);
				gzrewind($gz);
				while(!gzeof($gz)){
					$this->text.=gzgets($gz);
				}
				gzclose($gz);
			}
			else
			{
				if(!$fp=fopen($file,'rb'))
				trigger_error("Couldn't read from the file",E_USER_ERROR);
				flock($fp,'1');;
				while(!feof($fp)){
					$this->text.=fgets($fp);
				}
				flock($fp,'3');
				fclose($fp);
				
			}
			if($er=error_get_last()){
				trigger_error($er['type'].":".$er['message'],E_USER_WARNING);
			}
			return true;
		}
		
	}
	
	/**
		this method is for prepare file that be backuped
		//
	*/
	
	final protected function setFile($txt,$cmp,$ftp,$fhost,$fuser,$fpass,$fport)
	{
		$recognize="";
		foreach ($this->db as $rec){
		$recognize.=$rec."_";
		}
		$recognize=ereg_replace("_$","",$recognize);   //for naming file backuped

		// this the preferred for me format for naming files
		$file='backup@'.$recognize."@".date('Y-M-d',time()).'.sql';
		if(!$fp=fopen($file,'wb'))
		{
			trigger_error("You may have no enough rights on server",E_USER_ERROR);
		}
		flock($fp,'2');
		fwrite($fp,$txt);
		flock($fp,'3');
		fclose($fp);
		
		if ($cmp == '1'){
			$file=$file.".gz";
			if(! $gz=gzopen($file,'wb'))
			trigger_error("Script failed to compress backuped file.",E_USER_NOTICE);
			gzwrite($gz,$txt);
			gzclose($gz);
		}
		
		if($ftp == '1'){
			if(! $conn=ftp_connect($fhost,$fport))
		trigger_error("this is not avalid ftp server or make sure you type it well",E_USER_ERROR);
			$log=ftp_login($conn,$fuser,$fpass);
			if(!$log)trigger_error("Username or Password is not correct",E_USER_ERROR);
			$put=ftp_put($conn,$file,$file,FTP_BINARY);
			if(!$put){
				trigger_error("Couldn't upload file to remote server",E_USER_WARNING);
			}
			ftp_close($conn);
			
		}
		else{
			$this->downBackup($file);
		}	
		return true;
	}
	
	
	// download backuped file
	
	final private function downBackup($file)
	{
		header("Content-Description:File Transfer");;
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
   		header('Pragma: public');
   		header('Content-Disposition: attachment; filename='.basename($file));
   		header('Content-Type: application/octet-stream');
    	header('Content-Length: ' . filesize($file));
    	ob_clean();
    	flush();
    	readfile($file);
	}
	
	abstract protected function backupData($cmp='0',$ftp='0',$fhost='',$fpass='',$fport='21');
	
	abstract protected function restoreSql($file);

}




final class Backuprestoresql extends BackupRestore
{
	
	const HEADERS='***********************
Y    A    S    5   0  0 
***********************';               // mohamed ghareeb mohamed saeed signature
	const FIELDSEP=';';                 // seperate between queries
	
	
	/* this method for backup
	// you can specify more options like compression (0,1) , send through ftp to server (0,1)
	//
	*/
	
	public function backupData($cmp='0',$ftp='0',$fhost='',$fuser='anonymous',$fpass='mohamedigm@gmail.com',$fport='21')
	{
		
		if($ftp == '1'){
			if (empty($fhost)){
			trigger_error("You must specify ftp host name as you select ftp option",E_USER_ERROR);
		}
			if(strpos($fhost,"ftp://")){
				str_replace("ftp://","",$fhost);
			}
		}
		
		$this->text="";
		$this->text.=self::HEADERS;
	
		/**
		this will begin save database to file
		*/
		foreach($this->db as $key){
		$result=query_db($this->selectQuery('1')."$key",$this->link);
		while($row=query_db_row($result)){
			$this->text.="\r\n".$this->selectQuery('4')."$key".self::FIELDSEP.$row['1'];
		}
		
		// this will save tables related to that database
		mysql_select_db($key);
		foreach($this->table[$key] as $select){
			if(! count($this->table[$key]) == '0'){
			$result=query_db($this->selectQuery('2').$select,$this->link);
			while($row=query_db_row($result)){
			$this->text.=self::FIELDSEP.$this->selectQuery('5').$select.self::FIELDSEP.$row['1'];
				
				// fetch fields values in the tables
				$result2=query_db($this->selectQuery('6').$select,$this->link);
				while($row2=query_db_row($result2)){
					$txt="";
					foreach ($row2 as $val){
						$val=mysql_real_escape_string($val,$this->link);
						$txt.="'".$val."'".",";
						if($val == mysql_real_escape_string($row2[count($row2)-1])){
							$txt=ereg_replace(",$","",$txt);
						}
					// save field values as insertion query 
					}
				$this->text.=self::FIELDSEP.$this->selectQuery('3').$select." VALUES(".$txt.")";					
			}
				@ mysql_free_result($result2);	
				}
			}
						
		}
		
		//* finish database Dump *//
		$this->text.="\r\n### ".$key." DATABASE DUMP COMPLETED ###";
		}
		mysql_close($this->link);
		
		if(!$this->setFile($this->text,$cmp,$ftp,$fhost,$fuser,$fpass,$fport))
		trigger_error("Something goes wrong with file creation",E_USER_ERROR);
		
		
		return true;               // all things is done correctly
	}
	
	/**
	this method for restore server database
	//
	*/
	
	public function restoreSql($file)
	{
		if($this->getFile($file)){
		$this->text=str_replace(self::HEADERS,"",$this->text);   // ignore header
	$this->text=preg_replace("/###.* DATABASE DUMP COMPLETED ###/",self::FIELDSEP,$this->text);
	// ignore database dump complete message

		foreach ($tt=explode(self::FIELDSEP,$this->text) as $query){
			if (empty($query))
			continue;
			$rs=query_db($query,$this->link);
			if(!$rs){
				trigger_error("Mysql:problem with aquery",E_USER_NOTICE);
			}
			
			if (strstr($query,"CREATE DATABASE")){
				$seldb=substr($query,strpos($query,'`')+1,strlen($query));
				$seldb=substr($seldb,'0',strpos($seldb,"`"));
				mysql_select_db($seldb,$this->link);
				//**
				// could use query with "use database " and the name of database
				//**
			}

		}
	}
	else
	exit();
	mysql_close($this->link);
	return true;
	}
	
}





//*****  EXAMPLES *****//

/** FOR BACKUP FILE  **/
/**
 || $obj=new Backuprestoresql()   // you can specify information of your server or make it
 								  // default as localhost and user root with no pass
 || $obj->setDbs()              // leave it blank or * and it will backup entire server
 								  // or specify dbs "more one db1,db2,..."
 								// caution :: make sure you have rights to write on dbs you choose
 || $obj->selectTable()         // leave it blank or * and it will backup all tables
 								  // or specify tables "more one table1,table2,..."
 || $obj->backupData()     // here will be the backup you can choose compression (0,1)
 								  // ftp (0,1) if you specify ftp you must specify at least host
*/



/** FOR RESTORE FROM FILE  **/
/**
 || $obj=new Backuprestoresql()   // you can specify information of your server or make it
 								  // default as localhost and user root with no pass
 || $obj->restoreSql('file path') // specify location of your file accepted extension sql,gz,txt
*/





?>