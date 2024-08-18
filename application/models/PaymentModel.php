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
}
