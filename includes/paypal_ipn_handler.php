<?php 
// PHP 4.1

// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';



foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}

// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";



//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30); //LIVE SITE
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30); //For SAndBox



// assign posted variables to local variables
$item_name = $_POST['item_name1'];
$item_number = $_POST['item_number1'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];



	$insertSQL = "	INSERT INTO ipns_paypal
						SET
						item_name     = '".'paso1'."',
						item_number = '".$item_number."',
						payment_status = '".$payment_status."',
						payment_amount    = '".$payment_amount."',
						txn_id    = '".$payment_currency."',
						payer_email    = '".$payer_email."',
						added = '".mktime()."'";
	//query_db($insertSQL);


if (!$fp) {
// HTTP ERROR

	//query_db($insertSQL);
}
 else 
 {
fputs ($fp, $header . $req);
while (!feof($fp)) 
{
$res = fgets ($fp, 1024);
if (strcmp ($res, "VERIFIED") == 0) { //(((((
// check the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email
// check that payment_amount/payment_currency are correct
// process payment
	$insertSQL = "	INSERT INTO ipns_paypal
						SET
						item_name     = '".$item_name."',
						item_number = '".$item_number."',
						payment_status = '".$payment_status."',
						payment_amount    = '".$payment_amount."',
						txn_id    = '".$payment_currency."',
						payer_email    = '".$payer_email."',
						added = '".mktime()."'";
	query_db($insertSQL);
	
$id=$item_name;
$add_comments='IPN';
$add_amount=$payment_amount;

$query="select * from reserv_master where DocNro='$id'";
$result = query_db($query);
$row3x8=query_db_assoc( $result);	
$deuda=$row3x8['they_owe_you']-$payment_amount;

	$querygg="update reserv_master set they_owe_you= '$total_price' where DocNro='$id' ";
	$result = query_db($querygg);
	log_booking($id,$add_trans.': '.$add_amount);	
	$ti=mktime();	
	 $querygg = "	INSERT INTO payments_reservations	SET		DocNro   = '$id',
	  timestamp   ='$ti' ,Observ='$add_comments',
	  payment_type='$add_type',
	  amount='$add_amount',
	  user_id='$payer_email'";
	 	$result = query_db($querygg);

	
	
	}//))))))))
	else if (strcmp ($res, "INVALID") == 0) 	{
// log for manual investigation
	echo 'algo esta mal';
	
		$insertSQL = "	INSERT INTO ipns_paypal
						SET
						item_name     = '".'Devuelve invalido'."',
						item_number = '".$item_number."',
						payment_status = '".$payment_status."',
						payment_amount    = '".$payment_amount."',
						txn_id    = '".$payment_currency."',
						payer_email    = '".$payer_email."',
						added = '".mktime()."'";
	query_db($insertSQL);

	//query_db($insertSQL);

	}
}//while
fclose ($fp);
} //fp ok
?>