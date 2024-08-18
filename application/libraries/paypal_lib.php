<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class Paypal_lib
{
    public function __construct()
    {
        require_once APPPATH . '../vendor/autoload.php';
        $this->CI = &get_instance();
        $this->CI->load->config('paypal');

        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $this->CI->config->item('paypal_client_id'),
                $this->CI->config->item('paypal_secret')
            )
        );

        $this->_api_context->setConfig($this->CI->config->item('paypal_settings'));
    }

    public function getApiContext()
    {
        return $this->_api_context;
    }
}
