<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../vendor/autoload.php';


function sendEmail($firstname, $email, $patronPassword) {


    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))
    ->setUsername('abenfield98@gmail.com')
    ->setPassword('TasteMyD3w')
  ;
  
  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);
  
  $body = "'Welcome to the library, $firstname! You're randomly generated password is '$patronPassword'.";
  // Create a message
  $message = (new Swift_Message('Welcome to Mid-Continent Public Library!'))
    ->setFrom(['limeweb@lime.com' => 'Lime Web'])
    ->setTo([$email => $firstname])
    ->setBody($body)
    ;
  
  // Send the message
  $result = $mailer->send($message);

}
?>