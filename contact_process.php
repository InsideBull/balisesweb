<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once "vendor/autoload.php";

  $mail = new PHPMailer;
  $mail->isSMTP();            
  //Set SMTP host name                          
  $mail->Host = "smtp.gmail.com";
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = true;                          
  //Provide username and password     
  $mail->Username = "andriamisainacontact@gmail.com";                 
  $mail->Password = "wargames";                          
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "tls";                           
  //Set TCP port to connect to 
  $mail->Port = 465;    

  //From email address and name
  $mail->From = $_REQUEST['email'];
  $mail->addReplyTo($_REQUEST['email']);

    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];

    $subject = "PROJET WEB.";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

	$to = ''; //Balisesweb mail

    //To address and name
    $mail->addAddress($to);

     //Send HTML or Plain Text email
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = utf8_decode($body);

    if(!$mail->send()) 
    {
        //echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        //echo "Message has been sent successfully";
    }
				
	header('Location: index.html');

?>