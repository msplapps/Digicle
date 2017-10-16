<?php
      
	//require_once "class.phpmailer-lite.php";

        //$mail = new PHPMailerLite();
		
		
        $name                   =       $_POST["name"];
        $email          	=       $_POST["email"]; 
        $phone            	=       $_POST["phone"]; 
	$messaage 		=       $_POST["messaage"];  
		
	$subject                = 'Contact us form submitted online';
		   
        $message         = '<table >';
        $message        .= '<tr><td>';
        $message        .= 'Hi,';
        $message        .= '</td></tr>';

        $message        .= '<tr><td>';
        $message        .= '<b>Name</b>                 : '.$name ;
        $message        .= '</td></tr>';
		
	$message        .= '<tr><td>';
        $message        .= '<b>E-Mail Id</b> 		: '.$email;
        $message        .= '</td></tr>';
		
	$message        .= '<tr><td>';
        $message        .= '<b>Phone No</b> 		: '.$phone;
        $message        .= '</td></tr>';
		
	$message        .= '<tr><td>';
	$message        .= '<b>Message</b>		: '.$messaage ;
        $message        .= '</td></tr>';
		
        $message        .= '</table>';




$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Subject
$subject = 'Online Contact form';

// To Address 
$to ="reddy@codeworksltd.co.uk";

// Additional headers
$headers        .= 'From: '.$name.' ' . "\r\n";
//$headers      .= 'Cc: <email id here>' . "\r\n";
//$headers      .= 'Bcc: <email id here>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

echo 'Thank you. Your message has been sent successfully.';

?>

