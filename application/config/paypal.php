<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config['paypal_client_id'] = 'Ab7DxMuO9HWxA9_KyiecIibeyUT7xpQvpwSGyCPAHGJ4x_bGASpfJhRroUBgeDy2kvT5R9VOy-u4dqzp';
$config['paypal_secret'] = 'ENOU4qagV1KSWAn00f6qyn-CDZPHXQUAlx90pib43oLVSGLg7XDlvdMysHc9wMYrSmJiiT3tjiCKvYot';
$config['paypal_settings'] = array(
    'mode' => 'sandbox', // Change to 'live' for production
    'http.ConnectionTimeOut' => 30,
    'log.LogEnabled' => true,
    'log.FileName' => APPPATH . 'logs/paypal.log',
    'log.LogLevel' => 'DEBUG', // Available levels: FINE, INFO, WARN, ERROR
);
