<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    protected $CI;
    protected $mail;

    public function __construct()
    {
        require_once APPPATH . '../vendor/autoload.php';
        $this->CI = &get_instance();
        $this->mail = new PHPMailer(true);

        // SMTP configuration
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.hostinger.com';  // Replace with your SMTP server
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'noreply@vedzzy.com';  // SMTP username
        $this->mail->Password = 'ReplyV#246';  // SMTP password
        $this->mail->SMTPSecure = 'ssl';  // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 465;  // TCP port to connect to
        $this->mail->setFrom('noreply@vedzzy.com', 'Vedzzy.com'); // Sender info
    }

    public function sendMail($to, $subject, $body)
    {
        try {
            // Recipient
            $this->mail->addAddress($to);

            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            // Send email
            return $this->mail->send();
        } catch (Exception $e) {
            log_message('error', 'Mailer Error: ' . $this->mail->ErrorInfo);
            return false;
        }
    }
}
