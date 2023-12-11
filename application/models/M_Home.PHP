<?php

class M_Home extends CI_Model
{

    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('member', array('username' => $u, 'password' => $p));
        return $q;
    }

    public function produk()
    {
        $query = $this->db->get('produk');
        return $query->result();
    }
    public function kategori()
    {

        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function get_detail_produk($id_produk)
    {
        $query = $this->db->where('id_Produk', $id_produk)->get('produk');
        return $query->row();
    }
}
