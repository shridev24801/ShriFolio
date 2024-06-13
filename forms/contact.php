<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require '../forms/vendor/phpmailer/phpmailer/src/Exception.php';
require '../forms/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../forms/vendor/phpmailer/phpmailer/src/SMTP.php';

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'pavishri01@gmail.com';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'shridev24801@gmail.com';               // SMTP username
    $mail->Password   = 'esefbsnlksqrnthq';                             // SMTP password
    $mail->SMTPSecure = 'TLS';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_STARTTLS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 587 if you're using `PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress($receiving_email_address);                 // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
