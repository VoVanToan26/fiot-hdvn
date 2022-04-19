<?php
	// header('Content-Type: text/html; charset=utf-8');
	//Import PHPMailer classes into the global namespace
	//These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';
	$outlook_mail = new PHPMailer;
	$outlook_mail->CharSet = 'UTF-8';

	$outlook_mail->IsSMTP();
	// Send email using Outlook SMTP server
	$outlook_mail->Host = 'smtp-mail.outlook.com';
	// port for Send email
	$outlook_mail->Port = 587;
	$outlook_mail->SMTPSecure = 'tls';
	$outlook_mail->SMTPDebug = 1;
	$outlook_mail->SMTPAuth = true;
	$outlook_mail->Username = 'maruei_miat@outlook.com';
	$outlook_mail->Password = 'MVPSolution';
	 
	$outlook_mail->From = 'maruei_miat@outlook.com';
	$outlook_mail->FromName = 'HDVN Notification';// frome name
	// $outlook_mail->AddAddress('toanvo6270@marueivn.com','Toàn');  // Add a recipient  to name
	$outlook_mail->AddAddress('thanhtran6054@marueivn.com','Thành');
	// $outlook_mail->AddAddress('tinhtao3675@marueivn.com','Tình');
	// $outlook_mail->AddAddress('toanvo6270@marueivn.com;thanhtran6054@marueivn.com');  // Name is optional
	// $outlook_mail->AddCC('cuongnguyen6157@marueivn.com');
	 
	$outlook_mail->IsHTML(true); // Set email format to HTML
	 
	$outlook_mail->Subject = 'Cảnh báo hackker xâm nhập OKKKKKK';
	$outlook_mail->Body    = 'Heo mi cíu cíu nóng nóng <b>HOT HOT</b>
	<p style="color:red">Please heo mi !!!</p>';
	$outlook_mail->AltBody = 'Cíu cíu/';
	 
	if(!$outlook_mail->Send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $outlook_mail->ErrorInfo;
		exit;
	}
	else{
		echo 'Message of Send email using Outlook SMTP server has been sent';
	}
?>

<!-- require 'class.phpmailer.php';
 
$outlook_mail = new PHPMailer;
 
$outlook_mail->IsSMTP();
// Send email using Outlook SMTP server
$outlook_mail->Host = 'smtp-mail.outlook.com';
// port for Send email
$outlook_mail->Port = 587;
$outlook_mail->SMTPSecure = 'tls';
$outlook_mail->SMTPDebug = 1;
$outlook_mail->SMTPAuth = true;
$outlook_mail->Username = 'your-Outlook-address@Outlook.com';
$outlook_mail->Password = 'add-your-Outlook-Password';
$outlook_mail->From = 'your-Outlook-address@Outlook.com';
$outlook_mail->FromName = 'Your From name';// frome name
$outlook_mail->AddAddress('to-Outlook-address@Outlook.com', 'To Name');  // Add a recipient  to name
$outlook_mail->AddAddress('to-Outlook-address@Outlook.com');  // Name is optional
 
$outlook_mail->IsHTML(true); // Set email format to HTML
 
$outlook_mail->Subject = 'Here is the subject for onlinecode';
$outlook_mail->Body    = 'Send email using Outlook SMTP server <br>This is the HTML message body <strong>in bold!</strong> <a href="https://onlinecode.org/" target="_blank">onlincode.org</a>';
$outlook_mail->AltBody = 'This is the body in plain text for non-HTML mail clients at https://onlinecode.org/';
 
if(!$outlook_mail->Send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $outlook_mail->ErrorInfo;
exit;
}
else
{
echo 'Message of Send email using Outlook SMTP server has been sent';
} -->

<!-- //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} -->