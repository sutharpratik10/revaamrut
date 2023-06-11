<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'feedbackmail/phpmailer/phpmailer/src/Exception.php';
require 'feedbackmail/phpmailer/phpmailer/src/PHPMailer.php';
require 'feedbackmail/phpmailer/phpmailer/src/SMTP.php';

// Include autoload.php file
require 'feedbackmail/autoload.php';  
// Create object of PHPMailer class
$mail = new PHPMailer(true);

$feedbackoutput = '';

if (isset($_POST['submitfeedback'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $message = $_POST['message'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        // Gmail ID which you want to use as SMTP server
        $mail->Username = 'revaamrut@gmail.com';
        // Gmail Password
        $mail->Password = 'Complecated@me';
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email ID from which you want to send the email
        $mail->setFrom($email);
        // Recipient Email ID where you want to receive emails
        $mail->addAddress('info@revaamrut.com');

        $mail->isHTML(true);
        $mail->Subject = "feed back of $name from $city";
        $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

        $mail->send();
        $feedbackoutput = '<div class="alert alert-success">
                  <h5>Thank you! for contacting us, We\'ll get back to you soon!</h5>
                </div>';
    } catch (Exception $f) {
        $feedbackoutput = '<div class="alert alert-danger">
                  <h5>' . $f->getMessage() . '</h5>
                </div>';
    }
}
?>
