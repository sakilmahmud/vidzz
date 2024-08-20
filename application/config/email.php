<?php
$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.hostinger.com',
    'smtp_port' => 465,
    'smtp_user' => 'noreply@softechplaza.com', // Replace with your email address
    'smtp_pass' => 'SP@noreply2025', // Replace with your email password
    'mailtype'  => 'html',
    'charset'   => 'iso-8859-1',
    'wordwrap'  => TRUE,
    'newline'   => "\r\n" // Required for some mail servers
);

$this->load->library('email', $config);
