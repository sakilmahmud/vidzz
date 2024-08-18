<?php

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

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
        $this->load->model('YouTubeModel');
        $this->load->model('CampaignModel');
        $this->load->model('PaymentModel');

        $this->load->helper('custom_helper', 'url');

        $this->load->library('paypal_lib');

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

    public function all_campaigns()
    {
        $data['activePage'] = 'campaigns';

        // Get all campaigns
        $campaigns = $this->CampaignModel->get_all_campaigns();

        // Fetch video details for each campaign
        /* foreach ($campaigns as $campaign) {
            if ($campaign->video_id) {
                $videoDetails = $this->YouTubeModel->getVideoDetails($campaign->video_id);
                if ($videoDetails) {
                    $campaign->videoDetails = $videoDetails;
                } else {
                    $campaign->videoDetails = null;
                }
            } else {
                $campaign->videoDetails = null;
            }
        } */

        $data['campaigns'] = $campaigns;

        $this->load->view('user/header', $data);
        $this->load->view('user/campaigns', $data);
        $this->load->view('user/footer');
    }

    public function add_campaign()
    {
        $data['activePage'] = 'add_campaign';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $url = $this->input->post('youtube_url');
            $videoId = $this->extractVideoId($url);

            if ($videoId) {
                $data['videoDetails'] = $this->YouTubeModel->getVideoDetails($videoId);
                /* echo "<pre>";
                print_r($data);
                die; */
            } else {
                $data['error'] = 'Invalid YouTube URL';
            }
        }

        $this->load->view('user/header', $data);
        $this->load->view('user/add_campaign', $data);
        $this->load->view('user/footer');
    }

    public function create_campaign()
    {
        $videoId = $this->input->post('video_id');

        $videoDetails = $this->YouTubeModel->getVideoDetails($videoId);
        $video_title = "";
        $video_thumbs = "";
        if (!empty($videoDetails)) {
            $video_title = $videoDetails['items'][0]['snippet']['title'];
            $video_thumbs = serialize($videoDetails['items'][0]['snippet']['thumbnails']);
        }

        $campaign_data = [
            'user_id' => $this->session->userdata('user_id'),
            'video_id' => $this->input->post('video_id'),
            'video_title' => $video_title,
            'video_thumbs' => $video_thumbs,
            'estimated_view' => $this->input->post('estimated_view'),
            'budget' => $this->input->post('budget'),
            'country_id' => $this->input->post('country_id'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->CampaignModel->insert_campaign($campaign_data);

        $campaign_id = $this->db->insert_id();

        // Insert payment data
        $payment_data = [
            'user_id' => $this->session->userdata('user_id'),
            'campaign_id' => $campaign_id, // Get the last inserted campaign ID
            'video_id' => $this->input->post('video_id'),
            'estimated_view' => $this->input->post('estimated_view'),
            'payment_amount' => $this->input->post('budget'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->PaymentModel->insert_payment($payment_data);

        $payment_id = $this->db->insert_id(); // Get the last inserted payment ID
        redirect("user/payments/$payment_id"); // Redirect to the payments view
    }

    public function payments($payment_id)
    {
        $data['activePage'] = 'payments';

        $payment_details = $this->PaymentModel->get_payment_data($payment_id);
        $videoId = $payment_details->video_id;
        $data['payment_details'] = $payment_details;
        /* if ($videoId) {
            $data['videoDetails'] = $this->YouTubeModel->getVideoDetails($videoId);
        } else {
            $data['error'] = 'Invalid YouTube URL';
        } */

        $this->load->view('user/header', $data);
        $this->load->view('user/payments', $data);
        $this->load->view('user/footer');
    }

    private function extractVideoId($url)
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        return $params['v'] ?? null;
    }

    public function payment_history()
    {
        $data['activePage'] = 'payment_history';

        // Get the current user ID
        $user_id = $this->session->userdata('user_id');

        // Get payment history for the current user
        $data['payments'] = $this->PaymentModel->get_payment_history_with_campaigns($user_id);

        // Load the view
        $this->load->view('user/header', $data);
        $this->load->view('user/payment_history', $data);
        $this->load->view('user/footer');
    }


    public function profile()
    {
        $data['activePage'] = 'profile';
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->UserModel->get_user_by_id($user_id);

        $this->load->view('user/header', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('user/footer');
    }

    public function update_profile()
    {
        $user_id = $this->session->userdata('user_id');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->profile();
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->UserModel->update_user($user_id, $data);

            $this->session->set_flashdata('success', 'Profile updated successfully.');
            redirect('user/profile');
        }
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

    public function pay_with_paypal($payment_id)
    {
        $paymentDetails = $this->PaymentModel->get_payment_data($payment_id);

        // Set up PayPal payment
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($paymentDetails->payment_amount);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setDescription('Payment for Video Campaign');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('user/payment_success/' . $payment_id))
            ->setCancelUrl(base_url('user/payment_failed/' . $payment_id));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->paypal_lib->getApiContext());
            redirect($payment->getApprovalLink());
        } catch (Exception $ex) {
            log_message('error', 'PayPal error: ' . $ex->getMessage());
            redirect('user/payment_failed/' . $payment_id);
        }
    }

    public function payment_success($payment_id)
    {
        $paymentId = $this->input->get('paymentId');
        $payerId = $this->input->get('PayerID');

        $payment = Payment::get($paymentId, $this->paypal_lib->getApiContext());
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            // Execute the payment
            $result = $payment->execute($execution, $this->paypal_lib->getApiContext());

            // Update the payment status in the database
            $this->PaymentModel->update_payment_status($payment_id, $result->getId(), 1, 'Payment successful.');

            // Get the campaign ID from the payment (assuming payment_id relates to campaign_id)
            $campaign_id = $this->PaymentModel->get_campaign_id_by_payment($payment_id);

            // Update the campaign status to 1 (Paid)
            $this->CampaignModel->update_campaign_status($campaign_id, 1);

            // Set a flash message with the transaction ID
            $this->session->set_flashdata('transaction_id', $result->getId());

            // Redirect to thank you page
            redirect('user/thank_you');
        } catch (Exception $ex) {
            // Log any errors and redirect to payment failure page
            log_message('error', 'PayPal error: ' . $ex->getMessage());
            redirect('user/payment_failed/' . $payment_id);
        }
    }


    public function payment_failed($payment_id)
    {
        $this->PaymentModel->update_payment_status($payment_id, null, 0, 'Payment failed.');
        redirect('user/payment_error');
    }

    public function thank_you()
    {
        $data['activePage'] = 'thank_you';
        $this->load->view('user/header', $data);
        $this->load->view('user/thank_you', $data);
        $this->load->view('user/footer');
    }

    public function payment_error()
    {
        $data['activePage'] = 'payment_error';
        $this->load->view('user/header', $data);
        $this->load->view('user/payment_error', $data);
        $this->load->view('user/footer');
    }
}
