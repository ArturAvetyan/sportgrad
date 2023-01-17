<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$passport = $_POST['passport'];
$issuedate = $_POST['issuedate'];
$passportauthority = $_POST['passportauthority'];
$passportcode = $_POST['passportcode'];
$birthdate = $_POST['birthdate'];
$work = $_POST['work'];
$birthdoc = $_POST['birthdoc'];
$weight = $_POST['weight'];
$hieght = $_POST['hieght'];
$medicine = $_POST['medicine'];
$study = $_POST['study'];
$traininggoal = $_POST['traininggoal'];
$email = $_POST['email'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'trymetest@yandex.ru';                 // Наш логин
$mail->Password = 'dtzktimxhkmsrnrh';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('trymetest@yandex.ru', 'Sportgrad');   // От кого письмо 
$mail->addAddress('nofaw28378@themesw.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Данные';
$mail->Body    = '
		Пользователь оставил данные <br> 
	Фамилия родителя: ' . $name . ' <br>
	Имя родителя: ' . $name . ' <br>
	Отчество родителя: ' . $name . ' <br>
	паспорт серия номер: ' . $passport . ' <br>
	паспорт дата выдачи: ' . $issuedate . ' <br>
	паспорт выдаший орган: ' . $passportauthority . ' <br>
	паспорт код подразделения: ' . $placeholder . ' <br>
	Телефона: ' . $phone . '<br>
	Адрес регистрации: ' . $address . ' <br>
	E-mail: ' . $email . ' <br>
	Дата рождения родителя: ' . $name . ' <br>
	Место работы родителя: ' . $work . ' <br>
	Фамилия ученика: ' . $name . ' <br>
	Имя ученика: ' . $name . ' <br>
	Отчество ученика: ' . $name . ' <br>
	Дата рождения ученика: ' . $birthdate . ' <br>
	Свидетельство о рождении дата номер: ' . $birthdoc . ' <br>
	Выдавший орган: ' . $birthauthority . ' <br>
	Принимаются ли препараты на постоянной основе: ' . $medicine . ' <br>
	Место учёбы: ' . $study . ' <br>
	Цель занятий спортом: ' . $traininggoal . ' <br>
	Противопоказания: ' . $medicine . ' <br>
	Адерс проживания ученика: ' . $address . ' <br>
	Фамилия второго родителя: ' . $name . ' <br>
	Имя второго родителя: ' . $name . ' <br>
	Отчество второго родителя: ' . $name . ' <br>
	Телефона: ' . $phone . '<br>
	Место работы второго родителя: ' . $name . '';


if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>