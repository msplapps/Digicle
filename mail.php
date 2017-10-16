<?php
header("Content-type:application/json");
if(isset($_GET['receiverEmail']) && $_GET['receiverEmail']!='') {
    $to = $_GET['receiverEmail'];
    $name = isset($_GET['name'])?$_GET['name']:'';
    $from = isset($_GET['fromEmail'])?$_GET['fromEmail']:'';
    $tel = isset($_GET['tel'])?$_GET['tel']:'';
    $message = isset($_GET['messageBody'])?$_GET['messageBody']:'';
    $postTitle = isset($_GET['postTitle'])?$_GET['postTitle']:'';
    $subject = "Reply from " .$name. ", for Ad: " .$postTitle. "";

    $mail_html = file_get_contents("mailtemplate.php");
    $mail_html = str_replace("{{name}}", $name, $mail_html);
    $mail_html = str_replace("{{email}}", $from, $mail_html);
    $mail_html = str_replace("{{subject}}", $subject, $mail_html);
    $mail_html = str_replace("{{tel}}", $tel, $mail_html);
    $mail_html = str_replace("{{message}}", $message, $mail_html);
    $message = $mail_html;


    $login_email = 'app.codeworksltd@gmail.com';//app-support@codeworksltd.com
    $login_password = 'CodeWorks@123';//SQ3dAcmVkZHk=
    
    $response["error"] = FALSE;
    $response["error_msg"] = "";
    
    require("PHPMailer_5.2.0/class.phpmailer.php");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $login_email;
    $mail->Password = $login_password; //base64_decode($login_password);
    //$mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    $mail->setFrom($login_email, $name);
    $mail->addAddress($to, 'Code Works Ltd.');
    $mail->addReplyTo($from, $from);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body    = $message;
    //$mail->AltBody = '';
    if(!$mail->send()) {
        $headers = 'From: '.$login_email . "\r\n" .
                'Reply-To: '.$from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        if(mail($to,$subject,$mail->Body,$headers)) {
            $response["error"] = TRUE;
            $response["error_msg"] = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $response["error"] = FALSE;
            $response["error_msg"] = 'Direct Mail Sent';
        }
    } else {
        //mail("$email","Forget Password",$mail->Body);
        $response["error"] = FALSE;
        $response["error_msg"] = 'SMTP Mail Sent';
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "No Receiver Email Given";
}
echo json_encode($response);
$error = "Occured Time: ". date("d-m-Y h:i:s A")."\n";
$error .= "From Url: ". $this->getUrl()."\n";
$error .= "IP: ".$_SERVER['REMOTE_ADDR']."\n";
$error .= "Recieved Data: ".json_encode($_REQUEST)."\n";
$error .= "File Data: ".json_encode($_FILES)."\n";
$error .= "Input Data: ".json_encode(file_get_contents('php://input'))."\n";
$error .= "Response: ".json_encode($response)."\n";
$error .= "Extra Data: ".json_encode($data). "\n\n";
$logFile = "./errors/".date('dmy-H').'.log';

if(!file_exists($logFile)){
    $file = @fopen($logFile, 'w+') or die("Can't create file");
    @chmod($file, 0777);
    $linecount = 0;
    while(!feof($file)){
        $line = fgets($file);
        $linecount++;
    }
}
@file_put_contents($logFile, $error.PHP_EOL, FILE_APPEND); 
