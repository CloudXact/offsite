<?php
/**
* Copyright © 2021-2022 CloudXact. All Rights Reserved.
*/

  $receiving_email_address = 'support@cloudxact.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( '無法加載"PHP 電子郵件表單"庫!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  //使用 SMTP
  $contact->smtp = array(
    'host' => 'elvarvis.mino.host',
    'username' => 'kevin',
    'password' => '(,5]tW*XxLxl',
    'port' => '25'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);
  $contact->recaptcha_secret_key = '6LdFoj4iAAAAADEbMe_aJWPP4tiLyrgNNbRBxYkx';

/*
$embedMessage = $messageFactory->create('embed');
$embedMessage->setTitle( $_POST['name'], 'From');
$embedMessage->setDescription( $_POST['message'], 'Message', 10);
$embedMessage->setColor(0x00ff00);
$embedMessage->setTimestamp(date("Y-m-d", strtotime("now")));
$embedMessage->setFooterText( $_POST['email'], 'Email');

$webhook = new DiscordWebhook($embedMessage);
$webhook->setWebhookUrl("");
  echo $webhook->send();
  */
  echo $contact->send();
?>
