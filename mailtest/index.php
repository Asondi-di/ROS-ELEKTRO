<?php
define('STOP_STATISTICS', true); 
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
/*
$res = mail("dp@luckru.ru", "test4", "test3");

var_dump($res);

$res = CEvent::Send("NEW_PASSWORD", 's1', [
    "EMAIL" => "dp@luckru.ru",
	"LOGIN" => "Test",
	"PASSWORD"   => "DSR984"
]);

var_dump($res);
*/
exit;

require_once("PHPMailer/Exception.php");
require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/SMTP.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->Host = 'smtp.yandex.ru';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->Username = 'noreply@ros-elektro.ru';
$mail->Password = '4-01TU2R54oW';

    
$mail->setFrom('noreply@ros-elektro.ru', 'info');
$mail->addAddress('dpluckru@gmail.com', '');
$mail->Subject = 'test';
$mail->msgHTML("
1
");
$r = $mail->send();
var_dump($r);
