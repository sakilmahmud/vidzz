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
        $this->db->where('id', $payment_id);
        $query = $this->db->get('payments');
        return $query->row();
    }
}
