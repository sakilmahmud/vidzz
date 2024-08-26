<?php
class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login'); // Redirect to the login page if not logged in
        }

        $this->load->model('UserModel');
        // Load form validation library
        $this->load->library('upload');

        $this->load->model('SettingsModel');
        // Load form validation library
        $this->load->library('form_validation');
    }


    public function list()
    {
        $data['activePage'] = 'users';

        $data['users'] = $this->UserModel->getUserListWithDetails();
        // Load the views
        $this->load->view('admin/header', $data);
        $this->load->view('admin/users/index', $data);
        $this->load->view('admin/footer');
    }

    public function addUser()
    {
        // Method logic for adding a new admin user
        $data['activePage'] = 'add_user';
        $data['isUpdate'] = 0;
        $data['error'] = ''; // Initialize the error message

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Set form validation rules
            $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');

            if ($this->form_validation->run() === FALSE) {
                // Validation failed or first load of the page, show the form
                $this->load->view('admin/header', $data);
                $this->load->view('admin/users/add', $data);
                $this->load->view('admin/footer');
            } else {
                $password = password_hash("123456", PASSWORD_DEFAULT);

                // Prepare the data for adding the admin user
                $data = array(
                    'user_role' => 3,
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'is_verified' => 1,
                    'password' => $password
                );

                // Call the UserModel method to add the admin user
                $this->UserModel->insert_user($data);

                $this->session->set_flashdata('message', 'New user created successfully');
                // Redirect back to the admin user management page
                redirect('admin/users');
            }
        } else {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/users/add');
            $this->load->view('admin/footer');
        }
    }

    public function editUser($user_id)
    {
        $data['activePage'] = 'edit_user';
        $data['isUpdate'] = 1;
        $data['user'] = $this->UserModel->getUserById($user_id);
        $data['error'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/header', $data);
                $this->load->view('admin/users/add', $data);
                $this->load->view('admin/footer');
            } else {
                $userData = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email')
                );

                $this->UserModel->updateUser($user_id, $userData);
                $this->session->set_flashdata('message', 'User updated successfully');
                redirect('admin/users');
            }
        } else {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/users/add', $data);
            $this->load->view('admin/footer');
        }
    }

    public function changeStatus($user_id)
    {
        $user = $this->UserModel->getUserById($user_id);
        $new_status = ($user['status'] == 1) ? 0 : 1;

        $this->UserModel->updateUser($user_id, ['status' => $new_status]);

        $this->session->set_flashdata('message', 'User status updated successfully');
        redirect('admin/users');
    }

    public function changeVerifiedStatus($user_id)
    {
        $user = $this->UserModel->getUserById($user_id);
        $new_status = ($user['is_verified'] == 1) ? 0 : 1;

        $this->UserModel->updateUser($user_id, ['is_verified' => $new_status]);

        $this->session->set_flashdata('message', 'User verification status updated successfully');
        redirect('admin/users');
    }

    public function deleteUser($user_id)
    {
        $this->UserModel->deleteUser($user_id);

        $this->session->set_flashdata('message', 'User deleted successfully');
        redirect('admin/users');
    }
}
