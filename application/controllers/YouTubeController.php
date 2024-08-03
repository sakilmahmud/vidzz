<?php
defined('BASEPATH') or exit('No direct script access allowed');

class YouTubeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('YouTubeModel');
    }

    public function index()
    {

        // Method logic for the dashboard
        $data['activePage'] = 'dashboard';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    public function fetch_video_details()
    {
        $url = $this->input->post('youtube_url');
        $videoId = $this->extractVideoId($url);
        if ($videoId) {
            $data['videoDetails'] = $this->YouTubeModel->getVideoDetails($videoId);

            // Method logic for the dashboard
            $data['activePage'] = 'dashboard';

            $this->load->view('admin/header', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('admin/footer');
        } else {
            $data['error'] = 'Invalid YouTube URL';

            // Method logic for the dashboard
            $data['activePage'] = 'dashboard';

            $this->load->view('admin/header', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('admin/footer');
        }
    }

    private function extractVideoId($url)
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        return $params['v'] ?? null;
    }
}
