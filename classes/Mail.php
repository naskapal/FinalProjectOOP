<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/swiftmailer-5.x/lib/swift_required.php';
class Mail
{
  public function sendTest($username, $password, $destination)
  {
    $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
    ->setUsername("co.terbang@gmail.com")
    ->setPassword("nmxpaethpsuosroo");
    // Create the message
    $message = Swift_Message::newInstance()
    ->setSubject('TEST TOLEK')
    ->setFrom(array('co.terbang@gmail.com' => 'Rizky'))
    ->setTo(array($destination => $username))
    ->setBody('Dear User, This is your new password for login \n'. $password);

    // Send the email
    $mailer = Swift_Mailer::newInstance($transport);
    $mailer->send($message);
  }
}
$_mail = new Mail();
$_mail->sendTest();
 ?>
