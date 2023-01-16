<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$passport = $_POST['passport'];
$issuedate = $_POST['issuedate'];
$passportauthority = $_POST['[passportauthority'];
$passportcode = $_POST['passportcode'];
$address = $_POST['address'];
$birthdate =$_POST['birthdate'];
$work =$_POST['work'];
$weight = $_POST['weight'];
$hieght = $_POST['hieght'];
$birthdoc = $_POST['birthdoc'];
$birthautority = $_POST['birthauthority'];
$medicine = $_POST['medicine'];
$study = $_POSR['study'];
$traininggoal = $_POST['traininggoal'];


require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'lawartur@gmail.com';                 // Наш логин
$mail->Password = 'ilkuts100682';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('', 'Sportgrad');   // От кого письмо 
$mail->addAddress('boded96427@heroulo.com');     // Add a recipient
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
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
	E-mail: ' . $email . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>