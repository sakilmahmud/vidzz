<?php
class PaymentModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert_payment($data)
    {
        return $this->db->insert('payments', $data);
    }

    public function get_payment_data($payment_id)
    {
        $this->db->select('*, campaigns.id as campaign_id, campaigns.video_id as video_id, campaigns.video_title as video_title, campaigns.video_thumbs as video_thumbs');
        $this->db->from('payments');
        $this->db->join('campaigns', 'campaigns.id = payments.campaign_id', 'left');
        $this->db->where('payments.id', $payment_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_payment_status($payment_id, $transaction_id, $status, $note)
    {
        $data = [
            'transaction_id' => $transaction_id,
            'payment_status' => $status,
            'payment_note' => $note,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $payment_id);
        return $this->db->update('payments', $data);
    }
    public function get_campaign_id_by_payment($payment_id)
    {
        $this->db->select('campaign_id');
        $this->db->from('payments');
        $this->db->where('id', $payment_id);
        $query = $this->db->get();
        return $query->row()->campaign_id;
    }

    public function get_payment_history_with_campaigns($user_id)
    {
        $this->db->select('*, campaigns.id as campaign_id, campaigns.video_id as video_id, campaigns.video_title as video_title, campaigns.video_thumbs as video_thumbs');
        $this->db->from('payments');
        $this->db->join('campaigns', 'campaigns.id = payments.campaign_id', 'left');
        $this->db->where('campaigns.user_id', $user_id);
        $this->db->order_by('payments.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
