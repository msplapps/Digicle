<?php
      
//require_once "class.phpmailer-lite.php";
//$mail = new PHPMailerLite();
		
		
$fname			=       $_POST["fname"];
$fphone			=       $_POST["fphone"]; 
$femail			=       $_POST["femail"]; 
$ftech 			=       $_POST["ftech"];  
$fprice			=		$_POST["fprice"];
$fmsg			=		$_POST["fmsg"];


$subject		= 'Contact us form submitted online';

$message         = '<table >';
$message        .= '<tr><td>';
$message        .= 'Hi,';
$message        .= '</td></tr>';

$message        .= '<tr><td>';
$message        .= '<b>Name</b>			: '.$fname ;
$message        .= '</td></tr>';

$message        .= '<tr><td>';
$message        .= '<b>Phone</b>		: '.$fphone;
$message        .= '</td></tr>';

$message        .= '<tr><td>';
$message        .= '<b>Email ID</b>		: '.$femail;
$message        .= '</td></tr>';

$message        .= '<tr><td>';
$message        .= '<b>Technologies</b>	: '.$ftech ;
$message        .= '</td></tr>';

$message        .= '<tr><td>';
$message        .= '<b>Pricing</b>		: '.$fprice ;
$message        .= '</td></tr>';

$message        .= '<tr><td>';
$message        .= '<b>Message</b>		: '.$fmsg ;
$message        .= '</td></tr>';

$message        .= '</table>';



$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Subject
$subject = 'Online Contact form';

// To Address 
$to ="reddy@codeworksltd.co.uk";

// Additional headers
$headers        .= 'From: '.$fname.' ' . "\r\n";
//$headers      .= 'Cc: <email id here>' . "\r\n";
//$headers      .= 'Bcc: <email id here>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

echo 'Thank you. Your message has been sent successfully.';

?>

