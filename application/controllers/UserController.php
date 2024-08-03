<?php

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
        // Load form validation library
        $this->load->library('form_validation');

        // Check if the "remember_me" cookie exists
        $cookie_value = $this->input->cookie('remember_me');

        if ($cookie_value) {
            list($user_id, $cookie_hash) = explode(':', $cookie_value);
            // Validate the cookie hash here (e.g., against the user's stored hash)

            // Log in the user automatically using the user_id
            $user = $this->UserModel->getUserById($user_id);
            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('full_name', $user['full_name']);
                $this->session->set_userdata('role', $user['user_role']);
            }
        }

        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login'); // Redirect to the login page if not logged in
        }

        //print_r($this->session->userdata); die;

        $this->load->model('SettingsModel');

        $this->load->helper('custom_helper');


        // Load the upload library for handling file uploads
        $this->load->library('upload'); // Make sure 'upload' is the correct name of the library class
    }


    public function index()
    {

        if ($this->session->userdata('username')) {
            redirect('user/dashboard');
        }
    }

    public function dashboard()
    {
        // Method logic for the dashboard
        $data['activePage'] = 'dashboard';

        $this->load->view('user/header', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('user/footer');
    }

    public function generalSettings()
    {
        // Method logic for general settings
        $data['activePage'] = 'settings';
        $data['error'] = ''; // Initialize the error message

        $data['settings'] = $this->SettingsModel->getSettings();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/general_settings', $data);
        $this->load->view('admin/footer');
    }

    public function updateSettings()
    {
        // Process the form submission and update the settings
        $settings = $this->input->post();
        unset($settings['submit']); // Remove the submit button from the settings array

        // Handle file uploads for frontend_logo and admin_logo
        $config['upload_path'] = './assets/uploads/'; // Specify the upload directory path
        $config['allowed_types'] = 'gif|jpg|png'; // Allowed file types
        $config['max_size'] = 2048; // Maximum file size in KB (2MB)

        $this->load->library('upload');

        // Frontend Logo
        if (!empty($_FILES['frontend_logo']['name'])) {
            // Remove the previous frontend logo if exists
            $existing_frontend_logo = $settings['frontend_logo'];
            if (file_exists($existing_frontend_logo)) {
                unlink($existing_frontend_logo);
            }

            $config['file_name'] = 'frontend_logo'; // Set a custom name for the uploaded file
            $this->upload->initialize($config);
            if ($this->upload->do_upload('frontend_logo')) {
                $data = $this->upload->data();
                $settings['frontend_logo'] = 'assets/uploads/' . $data['file_name'];
            }
        }

        // Admin Logo
        if (!empty($_FILES['admin_logo']['name'])) {
            // Remove the previous admin logo if exists
            $existing_admin_logo = $settings['admin_logo'];
            if (file_exists($existing_admin_logo)) {
                unlink($existing_admin_logo);
            }

            $config['file_name'] = 'admin_logo'; // Set a custom name for the uploaded file
            $this->upload->initialize($config);
            if ($this->upload->do_upload('admin_logo')) {
                $data = $this->upload->data();
                $settings['admin_logo'] = 'assets/uploads/' . $data['file_name'];
            }
        }

        // Update the settings in the database
        $this->SettingsModel->updateSettings($settings);

        // Redirect back to the settings page with a success message
        $this->session->set_flashdata('success', 'Settings updated successfully.');
        redirect('admin/settings');
    }

    public function passwordChange()
    {
        // Method logic for password change
        $data['activePage'] = 'password';
        $data['error'] = ''; // Initialize the error message
        $this->load->view('admin/header', $data);
        $this->load->view('admin/password_change', $data);
        $this->load->view('admin/footer');
    }

    public function updatePassword()
    {
        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

        $data['activePage'] = 'password';

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the change password page with validation errors
            $this->load->view('admin/header', $data);
            $this->load->view('admin/password_change', $data);
            $this->load->view('admin/footer');
        } else {
            // Form validation succeeded, update the user's password
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            // Check if the current password matches the logged-in user's password
            $user_id = $this->session->userdata('user_id');
            $user = $this->UserModel->getUserById($user_id);

            if (password_verify($current_password, $user['password'])) {
                // Current password is correct, update the password
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                $this->UserModel->updatePassword($user_id, $hashed_password);

                // Redirect to a success page or display a success message
                // You can customize this part based on your requirements
                $data['message'] = 'Password updated successfully!';
                $this->load->view('admin/header', $data);
                $this->load->view('admin/password_change', $data);
                $this->load->view('admin/footer');
            } else {
                // Current password is incorrect, show an error message
                $data['error'] = 'Current password is incorrect.';
                $this->load->view('admin/header', $data);
                $this->load->view('admin/password_change', $data);
                $this->load->view('admin/footer');
            }
        }
    }
}
