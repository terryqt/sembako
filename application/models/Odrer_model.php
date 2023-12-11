<?php
class Order_model extends CI_Model
{
    public function insert_order($data)
    {
        $this->db->insert('order', $data);
        return $this->db->insert_id();
    }

    public function insert_detail_order($data)
    {
        $this->db->insert('detail_order', $data);
    }
}
