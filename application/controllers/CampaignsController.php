<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CampaignsController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Campaign_model');
    }

    public function create()
    {
        $data = [
            'user_id' => $this->session->userdata('user_id'), // Assuming user_id is stored in session
            'video_id' => $this->input->post('video_id'),
            'estimated_view' => $this->input->post('estimated_view'),
            'budget' => $this->input->post('budget'),
            'country_id' => $this->input->post('country_id'),
            'campaign_type' => $this->input->post('campaign_type'),
            'status' => $this->input->post('status'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->Campaign_model->insert_campaign($data);
        redirect('your_redirect_page'); // Redirect to your desired page after insertion
    }
}
