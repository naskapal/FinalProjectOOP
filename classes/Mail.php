<?php
class Mail
{

  public function sendTest($recipient,$username,$password)
  {
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
    ->setUsername("co.terbang@gmail.com")
    ->setPassword("nmxpaethpsuosroo");
    // Create the message
    $message = Swift_Message::newInstance()
    ->setSubject('TEST TOLEK')
    ->setFrom(array('co.terbang@gmail.com' => 'Mailbot'))
    ->setTo(array($recipient => $username))
    ->setBody('Dear customer, here is your new password '.$password);

    // Send the email
    $mailer = Swift_Mailer::newInstance($transport);
    $mailer->send($message);
  }
}

$_mail = new Mail();

 ?>
