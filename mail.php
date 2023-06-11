<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'contactmail/phpmailer/phpmailer/src/Exception.php';
require 'contactmail/phpmailer/phpmailer/src/PHPMailer.php';
require 'contactmail/phpmailer/phpmailer/src/SMTP.php';

// Include autoload.php file
require 'contactmail/autoload.php';  
// Create object of PHPMailer class
$mail = new PHPMailer(true);

$output = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
//        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        // Gmail ID which you want to use as SMTP server
        $mail->Username = 'revaamrut@gmail.com';
        // Gmail Password
        $mail->Password = 'Complecated@me';
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = 'ssl'; //'tls' for localhost secure transfer enabled REQUIRED for Gmail
        $mail->Port = 465; // or 587 for localhost

        // Email ID from which you want to send the email
        $mail->setFrom($email);
        // Recipient Email ID where you want to receive emails
        $mail->addAddress('info@revaamrut.com');

        $mail->isHTML(true);
        $mail->Subject = "Inquiry from $name"  ;
        $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

        $mail->send();
        $output = '<div class="alert alert-success">
                  <h5>Thank you! for contacting us, We\'ll get back to you soon!</h5>
                </div>';
    } catch (Exception $e) {
        $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
}
?>
