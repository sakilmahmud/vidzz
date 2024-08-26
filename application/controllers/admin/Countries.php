<?php
class Countries extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->model('CountryModel');
        $this->load->library('form_validation');
    }

    public function list()
    {
        $data['activePage'] = 'countries';
        $data['countries'] = $this->CountryModel->getCountries();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/countries/index', $data);
        $this->load->view('admin/footer');
    }

    public function addCountry()
    {
        $data['activePage'] = 'add_country';
        $data['isUpdate'] = 0;
        $data['error'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('code', 'Country Code', 'required|is_unique[countries.code]');
            $this->form_validation->set_rules('title', 'Country Title', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/header', $data);
                $this->load->view('admin/countries/add', $data);
                $this->load->view('admin/footer');
            } else {
                $countryData = array(
                    'code' => $this->input->post('code'),
                    'title' => $this->input->post('title'),
                    'status' => $this->input->post('status')
                );
                $this->CountryModel->insertCountry($countryData);
                $this->session->set_flashdata('message', 'Country added successfully');
                redirect('admin/countries');
            }
        } else {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/countries/add', $data);
            $this->load->view('admin/footer');
        }
    }

    public function editCountry($country_id)
    {
        $data['activePage'] = 'edit_country';
        $data['isUpdate'] = 1;
        $data['country'] = $this->CountryModel->getCountryById($country_id);
        $data['error'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('code', 'Country Code', 'required');
            $this->form_validation->set_rules('title', 'Country Title', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/header', $data);
                $this->load->view('admin/countries/add', $data);
                $this->load->view('admin/footer');
            } else {
                $countryData = array(
                    'code' => $this->input->post('code'),
                    'title' => $this->input->post('title'),
                    'status' => $this->input->post('status')
                );
                $this->CountryModel->updateCountry($country_id, $countryData);
                $this->session->set_flashdata('message', 'Country updated successfully');
                redirect('admin/countries');
            }
        } else {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/countries/add', $data);
            $this->load->view('admin/footer');
        }
    }

    public function deleteCountry($country_id)
    {
        $this->CountryModel->deleteCountry($country_id);
        $this->session->set_flashdata('message', 'Country deleted successfully');
        redirect('admin/countries');
    }
}
