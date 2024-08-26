<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PriceWiseViewController extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->model('PriceWiseViewModel');
        $this->load->model('CountryModel'); // Assuming you have a model for countries
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['activePage'] = 'price_wise_view';
        $data['price_wise_views'] = $this->PriceWiseViewModel->getAll();
        $data['countries'] = $this->CountryModel->getCountries(); // Fetch all countries to be used in the form

        // Load header, content, and footer views
        $this->load->view('admin/header', $data);
        $this->load->view('admin/price_wise_view/list', $data);
        $this->load->view('admin/footer');
    }

    public function addPriceWiseView()
    {
        $data['activePage'] = 'add_price_wise_view';
        $data['isUpdate'] = 0;
        $data['error'] = '';
        $data['countries'] = $this->CountryModel->getCountries(); // Fetch countries for the dropdown

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('country_id', 'Country', 'required|is_unique[price_wise_view.country_id]');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('starting_view', 'Starting View', 'required|integer');
            $this->form_validation->set_rules('end_view', 'End View', 'required|integer');

            if ($this->form_validation->run() === FALSE) {
                // Validation failed, show the form again
                $data['selected_country'] = $this->input->post('country_id'); // Store selected country
                $this->load->view('admin/header', $data);
                $this->load->view('admin/price_wise_view/add', $data);
                $this->load->view('admin/footer');
            } else {
                // Validation successful, insert data
                $priceWiseViewData = array(
                    'country_id'    => $this->input->post('country_id'),
                    'price'         => $this->input->post('price'),
                    'starting_view' => $this->input->post('starting_view'),
                    'end_view'      => $this->input->post('end_view')
                );
                $this->PriceWiseViewModel->insert($priceWiseViewData);
                $this->session->set_flashdata('message', 'Price Wise View added successfully');
                redirect('admin/price_wise_view');
            }
        } else {
            // No form submission, just load the form
            $this->load->view('admin/header', $data);
            $this->load->view('admin/price_wise_view/add', $data);
            $this->load->view('admin/footer');
        }
    }


    public function editPriceWiseView($id)
    {
        $data['activePage'] = 'edit_price_wise_view';
        $data['isUpdate'] = 1;
        $data['countries'] = $this->CountryModel->getCountries(); // Fetch countries for the dropdown
        $data['priceWiseView'] = $this->PriceWiseViewModel->getPriceWiseViewById($id);
        $data['error'] = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('country_id', 'Country', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric');
            $this->form_validation->set_rules('starting_view', 'Starting View', 'required|integer');
            $this->form_validation->set_rules('end_view', 'End View', 'required|integer');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/header', $data);
                $this->load->view('admin/price_wise_view/add', $data); // Updated to 'edit' view
                $this->load->view('admin/footer');
            } else {
                $priceWiseViewData = array(
                    'country_id'    => $this->input->post('country_id'),
                    'price'         => $this->input->post('price'),
                    'starting_view' => $this->input->post('starting_view'),
                    'end_view'      => $this->input->post('end_view')
                );
                $this->PriceWiseViewModel->update($id, $priceWiseViewData);
                $this->session->set_flashdata('message', 'Price Wise View updated successfully');
                redirect('admin/price_wise_view');
            }
        } else {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/price_wise_view/add', $data); // Updated to 'edit' view
            $this->load->view('admin/footer');
        }
    }



    public function delete($id)
    {
        $this->PriceWiseViewModel->delete($id);
        redirect('admin/price_wise_view');
    }
}
