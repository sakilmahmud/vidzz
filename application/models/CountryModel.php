<?php
class CountryModel extends CI_Model
{
    public function getCountries()
    {
        return $this->db->get('countries')->result_array();
    }

    public function insertCountry($data)
    {
        $this->db->insert('countries', $data);
    }

    public function getCountryById($country_id)
    {
        return $this->db->get_where('countries', array('id' => $country_id))->row_array();
    }

    public function updateCountry($country_id, $data)
    {
        $this->db->where('id', $country_id);
        $this->db->update('countries', $data);
    }

    public function deleteCountry($country_id)
    {
        $this->db->delete('countries', array('id' => $country_id));
    }
}
