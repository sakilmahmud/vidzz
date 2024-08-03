<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        // Load the UserModel to get the list of doctors
        //$this->load->model('UserModel');
        $this->load->model('DoctorAppointmentsModel');
        $status = 1;
        //$data['doctors'] = $this->UserModel->getDoctors($status); // Assuming you have a method in the UserModel to fetch doctors
        $data['doctors'] = $this->DoctorAppointmentsModel->upcomingDoctors(); // Assuming you have a method in the DoctorAppointmentsModel to fetch doctors

		///echo "<pre>"; print_r($data['doctors']); die;

        // Load the home view and pass the doctors data
        $this->load->view('home', $data);
    }
}
