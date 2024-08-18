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
        $this->db->select('campaigns.*, payments.id as payment_id');
        $this->db->from('campaigns');
        $this->db->join('payments', 'payments.campaign_id = campaigns.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function update_campaign_status($campaign_id, $status)
    {
        $this->db->where('id', $campaign_id);
        $this->db->update('campaigns', ['status' => $status]);
    }
}
