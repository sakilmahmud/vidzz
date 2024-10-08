<?php
/* use Google_Client;
use Google_Service_Oauth2; */

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //require_once APPPATH . '../vendor/autoload.php';
        // Load form validation library
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        // Load Mailer library
        $this->load->library('mailer');

        // Initialize Google Client
        /* $this->google_client = new Google_Client();
        $this->google_client->setClientId('117345918705-0ncelk4rt4c9me9kd5kqqukrg6ov09el.apps.googleusercontent.com');
        $this->google_client->setClientSecret('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');
        $this->google_client->setRedirectUri(base_url('auth/google_callback'));
        $this->google_client->addScope('email');
        $this->google_client->addScope('profile'); */
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        // Initialize the error message
        $data['error'] = '';
        $data['meta_title'] = "Vedzzy :: Login";
        $data['meta_descriptions'] = "Vedzzy.com";

        /* print_r($this->session->userdata);
        die; */

        // Check if the user is already logged in
        if ($this->session->userdata('user_id')) {
            $this->redirectUserByRole($this->session->userdata('role'));
        }

        // Set validation rules
        $this->form_validation->set_rules('username', 'Username or Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the login view
            $this->load->view('header-auth', $data);
            $this->load->view('login', $data);
            $this->load->view('footer-auth', $data);
        } else {
            // Handle POST request
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                // Authenticate user
                $user = $this->UserModel->getUserByUsernameOrMobileOrEmail($username);

                if ($user) {
                    if (!password_verify($password, $user['password'])) {
                        // Invalid password
                        $this->session->set_flashdata('error', 'Invalid password.');
                        redirect('login');
                    } elseif ($user['status'] != 1) {
                        // User is not verified
                        $this->session->set_flashdata('error', 'Your account is not active. Please contact our help centre.');
                        redirect('login');
                    } elseif (!$user['is_verified']) {
                        // User is not verified
                        $this->session->set_flashdata('error', 'Your account is not verified. Please check your email to verify your account.');
                        redirect('login');
                    } else {
                        // User is verified and password is correct, set user session data
                        $this->setUserSession($user);

                        // Handle "Remember Me" functionality
                        if ($this->input->post('remember')) {
                            $this->setRememberMeCookie($user, $username, $password);
                        }

                        // Redirect based on user role
                        $this->session->set_flashdata('success', 'Welcome ' . $user['first_name']);
                        $this->redirectUserByRole($user['user_role']);
                    }
                } else {
                    // Invalid username or email
                    $this->session->set_flashdata('error', 'Invalid username or email.');
                    redirect('login');
                }
            }
        }
    }


    /**
     * Redirect user based on their role.
     *
     * @param int $role
     */
    private function redirectUserByRole($role)
    {
        switch ($role) {
            case 1:
                redirect('admin/dashboard');
                break;
            case 2:
            case 4:
            case 5:
                redirect('admin/dashboard');
                break;
            case 3:
                redirect('user/dashboard');
                break;
            default:
                redirect('login');
                break;
        }
    }

    /**
     * Set user session data.
     *
     * @param array $user
     */
    private function setUserSession($user)
    {
        $this->session->set_userdata([
            'user_id' => $user['id'],
            'full_name' => $user['full_name'],
            'role' => $user['user_role']
        ]);
    }

    /**
     * Set a persistent "Remember Me" cookie.
     *
     * @param array $user
     * @param string $username
     * @param string $password
     */
    private function setRememberMeCookie($user, $username, $password)
    {
        $cookie_value = $user['id'] . ':' . sha1($user['id'] . $username . $password . 'your_secret_key');
        $cookie_expiration = 60 * 60 * 24 * 30; // 30 days
        $this->input->set_cookie('remember_me', $cookie_value, $cookie_expiration);
    }

    // Display & Handle user registration
    public function register()
    {
        $data['meta_title'] = "Vedzzy :: Register";
        $data['meta_descriptions'] = "Vedzzy.com";

        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('terms', 'Terms and Conditions', 'required');

        // If validation fails
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('header-auth', $data);
            $this->load->view('register', $data);
            $this->load->view('footer-auth', $data);
        } else {
            // Generate verification token
            $verification_token = bin2hex(random_bytes(50));

            // Prepare data for insertion
            $user_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('email'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'verification_token' => $verification_token,
                'is_verified' => 0
            );

            // Insert user data into the database
            if ($this->UserModel->insert_user($user_data)) {
                // Send verification email
                $send_mail = $this->_send_verification_email($user_data['email'], $verification_token);
                if ($send_mail) {
                    $this->session->set_flashdata('success', 'Registration successful. Please check your email for verification.');
                } else {
                    $this->session->set_flashdata('success', 'Registration successful. Failed to send verification link. Please click here to resend it.');
                }
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'An error occurred. Please try again.');
                redirect('register');
            }
        }
    }

    private function _send_verification_email($email, $token)
    {
        $verification_link = base_url('verify?token=' . $token);

        $subject = "Email Verification";
        $message = "<p>Please click the link below to verify your email address:</p>";
        $message .= "<a href='" . $verification_link . "'>Verify Email</a>";

        // Send email
        if ($this->mailer->sendMail($email, $subject, $message)) {
            $isSent = true;
        } else {
            $isSent = false;
        }
        return $isSent;
    }

    public function verify()
    {
        $token = $this->input->get('token');

        $user = $this->UserModel->getUserByToken($token);

        if ($user && $user['is_verified'] == 0) {
            $this->UserModel->verifyUser($user['id']);
            $this->session->set_flashdata('success', 'Your email has been verified. You can now login.');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', 'Invalid token or your email is already verified.');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('user_id');
        redirect('login'); // Change 'login' to the desired destination after logout
    }

    // Google Login/Signup
    public function google_login()
    {
        $login_url = $this->google_client->createAuthUrl();
        redirect($login_url);
    }

    // Google Callback
    public function google_callback()
    {
        if ($this->input->get('code')) {
            $token = $this->google_client->fetchAccessTokenWithAuthCode($this->input->get('code'));
            $this->google_client->setAccessToken($token);

            $google_service = new Google_Service_Oauth2($this->google_client);
            $google_user_info = $google_service->userinfo->get();

            $user_data = array(
                'oauth_provider' => 'google',
                'oauth_uid' => $google_user_info->id,
                'first_name' => $google_user_info->givenName,
                'last_name' => $google_user_info->familyName,
                'email' => $google_user_info->email,
                'picture' => $google_user_info->picture,
                'is_verified' => 1,  // Google accounts are already verified
            );

            $user = $this->UserModel->checkUser($user_data);

            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('full_name', $user['full_name']);
                $this->session->set_userdata('role', $user['user_role']);

                redirect('dashboard');
            } else {
                $user_id = $this->UserModel->insert_user($user_data);
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('full_name', $user_data['first_name'] . ' ' . $user_data['last_name']);
                $this->session->set_userdata('role', 'user');

                redirect('dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong, please try again.');
            redirect('login');
        }
    }

    /** forgot password */
    // Handle forgot password request
    public function forgot_password()
    {
        $data['meta_title'] = "Vedzzy :: Forgot Password";
        $data['meta_descriptions'] = "Vedzzy.com";

        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        // If validation fails
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header-auth', $data);
            $this->load->view('forgot_password');
            $this->load->view('footer-auth', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->UserModel->getUserByEmail($email);

            if ($user) {
                // Generate password reset token
                $reset_token = bin2hex(random_bytes(50));

                // Save the token to the database
                $this->UserModel->savePasswordResetToken($user['id'], $reset_token);

                // Send password reset email
                $this->_send_password_reset_email($email, $reset_token);
                $this->session->set_flashdata('success', 'A password reset link has been sent to your email.');
                redirect('forgot-password');
            } else {
                $this->session->set_flashdata('error', 'No account found with that email.');
                redirect('forgot-password');
            }
        }
    }

    // Handle password reset request
    public function reset_password()
    {
        $data['meta_title'] = "Vedzzy :: Reset Password";
        $data['meta_descriptions'] = "Vedzzy.com";

        $token = $this->input->get('token');
        $user = $this->UserModel->getUserByResetToken($token);


        if ($user) {
            // Set validation rules
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            // If validation fails
            if ($this->form_validation->run() == FALSE) {
                $data['token'] = $token;
                $this->load->view('header-auth', $data);
                $this->load->view('reset_password', $data);
                $this->load->view('footer-auth', $data);
            } else {
                // Update user's password
                $new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $this->UserModel->updatePassword($user['id'], $new_password);

                // Clear the reset token
                $this->UserModel->clearPasswordResetToken($user['id']);

                $this->session->set_flashdata('success', 'Your password has been reset. You can now login.');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid or expired reset token.');
            redirect('forgot-password');
        }
    }

    public function reset_password_submit()
    {

        $data['meta_title'] = "Vedzzy :: Reset Password";
        $data['meta_descriptions'] = "Vedzzy.com";

        $token = $this->input->post('token');

        // Set validation rules
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        // If validation fails
        if ($this->form_validation->run() == FALSE) {
            $data['token'] = $token;

            $this->load->view('header-auth', $data);
            $this->load->view('reset_password', $data);
            $this->load->view('footer-auth', $data);
        } else {

            $user = $this->UserModel->getUserByResetToken($token);
            if ($user) {
                // Update user's password
                $new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $this->UserModel->updatePassword($user['id'], $new_password);

                // Clear the reset token
                $this->UserModel->clearPasswordResetToken($user['id']);

                $this->session->set_flashdata('success', 'Your password has been reset. You can now login.');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Invalid or expired reset token.');
                redirect('forgot-password');
            }
        }
    }

    // Send password reset email
    private function _send_password_reset_email($email, $token)
    {
        $reset_link = base_url('reset-password?token=' . $token);

        $subject = "Password Reset Request";
        $message = "<p>Please click the link below to reset your password:</p>";
        $message .= "<a href='" . $reset_link . "'>Reset Password</a>";

        // Send email
        return $this->mailer->sendMail($email, $subject, $message);
    }
}
