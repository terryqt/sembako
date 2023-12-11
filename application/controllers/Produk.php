<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $data['produk'] = $this->Madmin->get_all_data_with_kategori();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/produk/tampil', $data);
        $this->load->view('admin/layout/tampil');
    }



    public function add()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $data['kategori'] = $this->Madmin->get_all_kategori();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/produk/formAdd', $data);
        $this->load->view('admin/layout/footer');
    }

    public function save()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $Namaproduk = $this->input->post('Namaproduk');
        $Deskripsiproduk = $this->input->post('Deskripsiproduk');
        $harga = $this->input->post('harga');
        $id_Kategori = $this->input->post('id_Kategori');

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $data_file = $this->upload->data();
            $data_insert = array(
                'Namaproduk' => $Namaproduk,
                'foto' => $data_file['file_name'],
                'Deskripsiproduk' => $Deskripsiproduk,
                'id_Kategori' => $id_Kategori,
                'harga' => $harga
            );

            $this->Madmin->insert('produk', $data_insert);
            redirect('produk');
        } else {
            // Jika upload gagal, tampilkan pesan kesalahan
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/produk/formAdd', $error);
        }
    }

    public function get_by_id($id)
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $data['produk'] = $this->Madmin->get_by_produk('produk', $id);
        $data['kategori'] = $this->Madmin->get_all_kategori();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/produk/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $id = $this->input->post('id_Produk');
        $Namaproduk = $this->input->post('Namaproduk');
        $Deskripsiproduk = $this->input->post('Deskripsiproduk');
        $harga = $this->input->post('harga');
        $id_Kategori = $this->input->post('id_Kategori');

        $foto = ''; // Default value

        if ($_FILES['foto']['name']) {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $data_file = $this->upload->data();
                $foto = $data_file['file_name'];
            } else {
                // Handle upload error
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/produk/formEdit', $error);
                return;
            }
        }

        $dataupdate = array(
            'Namaproduk' => $Namaproduk,
            'foto' => $foto,
            'Deskripsiproduk' => $Deskripsiproduk,
            'harga' => $harga,
            'id_Kategori' => $id_Kategori
        );

        $this->Madmin->update('produk', $dataupdate, 'id_Produk', $id);
        redirect('produk');
    }



    public function delete($id)
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $this->Madmin->hapus('produk', 'id_Produk', $id);
        redirect('produk');
    }
}
