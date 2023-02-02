<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

// От кого письмо
$mail->setFrom('sergbunchak@bk.ru', 'Veresov');
// Кому отправить
$mail->addAddress('sbunchak@bk.ru');
$mail->Subject = 'Заявка с сайта "Veresov"';

$body = '<h1>Заявка с сайта "Veresov"</h1>';

if(trim(!empty($_POST['user_name']))){
   $body.='<p><strong>Имя:</strong> '.$_POST['user_name'].'</p>';
}
if(trim(!empty($_POST['user_phone']))){
   $body.='<p><strong>Телефон:</strong> '.$_POST['user_phone'].'</p>';
}
if(trim(!empty($_POST['user_email']))){
   $body.='<p><strong>E-mail:</strong> '.$_POST['user_email'].'</p>';
}
if(trim(!empty($_POST['user_info']))){
   $body.='<p><strong>Дополнительная информация:</strong> '.$_POST['user_info'].'</p>';
}

$mail->$Body = $body;

// Отправляем
if(!$mail->send()){
   $message = 'Ошибка';

}
else{
   $message = 'Данные отправлены!';
}
$response = ['message'=> $message];
header('Content-type: application/json');
echo json_encode($response);
?>