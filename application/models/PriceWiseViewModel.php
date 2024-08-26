<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PriceWiseViewModel extends CI_Model
{

    public function getAll()
    {
        $this->db->select('price_wise_view.*, countries.title as country_name');
        $this->db->from('price_wise_view');
        $this->db->join('countries', 'countries.id = price_wise_view.country_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('price_wise_view', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('price_wise_view', $data);
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('price_wise_view');
    }
    public function getPriceWiseViewById($id)
    {
        $this->db->select('price_wise_view.*, countries.title as country_name');
        $this->db->from('price_wise_view');
        $this->db->join('countries', 'countries.id = price_wise_view.country_id');
        $this->db->where('price_wise_view.id', $id);

        $query = $this->db->get();

        // Check if the record exists and return it
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return as an associative array
        }

        return null; // Return null if no record found
    }
}
