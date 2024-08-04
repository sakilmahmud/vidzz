<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CampaignModel extends CI_Model
{

    public function insert_campaign($data)
    {
        $this->db->insert('campaigns', $data);
    }

    public function get_all_campaigns()
    {
        $query = $this->db->get('campaigns');
        return $query->result();
    }
}
