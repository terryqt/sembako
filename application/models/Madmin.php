<?php

class Madmin extends CI_Model
{

    public function M_login($u, $p)
    {
        $q = $this->db->get_where('admin', array('username' => $u, 'password' => $p));
        return $q;
    }

    public function get_all_data($table)
    {
        $q = $this->db->get($table);
        return $q;
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }


    public function get_by_id($table, $id)
    {
        $this->db->where('id_Kategori', $id);
        $query = $this->db->get($table);
        return $query->row();
    }
    public function get_by_produk($table, $id)
    {
        $this->db->where('id_Produk', $id);
        $query = $this->db->get($table);
        return $query->row();
    }
    public function get_by_member($table, $id)
    {
        $this->db->where('id_member', $id);
        $query = $this->db->get($table);
        return $query->row();
    }
    public function get_all_kategori()
    {
        $q = $this->db->get('kategori');
        return $q->result();
    }
    public function update($table, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($table, $data);
    }

    public function hapus($table, $id, $val)
    {
        $this->db->delete($table, array($id => $val));
    }


    public function get_all_data_with_kategori()
    {
        $this->db->select('produk.*, Kategori.namakategori as kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_Kategori = kategori.id_Kategori');
        $q = $this->db->get();
        return $q->result();
    }
    public function insert_order($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function get_produk_id_by_order_id($order_id)
    {
        $this->db->select('id_Produk');
        $this->db->from('detail_order');
        $this->db->where('id_Order', $order_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->id_Produk : null;
    }

    public function insert_detail_order($data)
    {
        $this->db->insert('detail_order', $data);
    }
}
