<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['meta_title'] = "Vedzzy :: Home";
        $data['meta_descriptions'] = "Vedzzy.com";

        $this->load->view('header', $data);
        $this->load->view('home', $data);
        $this->load->view('footer', $data);
    }
    public function contact()
    {
        $data['meta_title'] = "Vedzzy :: Contact";
        $data['meta_descriptions'] = "Vedzzy.com";

        $this->load->view('header', $data);
        $this->load->view('contact', $data);
        $this->load->view('footer', $data);
    }
    public function terms()
    {
        $data['meta_title'] = "Vedzzy :: Term & Conditions";
        $data['meta_descriptions'] = "Vedzzy.com";
        $this->load->view('header', $data);
        $this->load->view('terms', $data);
        $this->load->view('footer', $data);
    }
    public function privacy()
    {
        $data['meta_title'] = "Vedzzy :: Privacy & Policy";
        $data['meta_descriptions'] = "Vedzzy.com";
        $this->load->view('header', $data);
        $this->load->view('privacy', $data);
        $this->load->view('footer', $data);
    }
}
