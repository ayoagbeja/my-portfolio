<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Process form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $receiving_email_address = 'oagbeja79@gmail.com';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $mail = new PHPMailer(true);

  try {
      // Server settings
      $mail->SMTPDebug = 0;                                      
      $mail->isSMTP();                                           
      $mail->Host       = 'smtp.gmail.com';                    
      $mail->SMTPAuth   = true;                                  
      $mail->Username   = 'ayoagbeja.com';              
      $mail->Password   = 'jzkqshngusqhylpe';                 
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
      $mail->Port       = 587;                                  

      // Recipients
      $mail->setFrom('oagbeja79@gmail.com', 'Ayo Ore');
      $mail->addAddress('oagbeja79@gmail.com', 'Ayo Ore');   
      $mail->addReplyTo($email, $name);

      // Content
      $mail->isHTML(true);                                   
      $mail->Subject = $subject;
      $mail->Body    = $message;
      $mail->AltBody = strip_tags($message);

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


} else {
  // Respond with a 405 Method Not Allowed error for other methods
  http_response_code(405);
  echo 'This is what is being sent';
}

?>
