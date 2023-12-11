<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/formAdd');
        $this->load->view('admin/layout/footer');
    }

    public function save()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $namaKategori = $this->input->post('Namakategori');
        $datainput = array('Namakategori' => $namaKategori);
        $this->Madmin->insert('kategori', $datainput);
        redirect('kategori');
    }

    public function get_by_id($id)
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $data['kategori'] = $this->Madmin->get_by_id('kategori', $id);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $id = $this->input->post('id_Kategori');
        $Namakategori = $this->input->post('Namakategori');
        $dataupdate = array('Namakategori' => $Namakategori);
        $this->Madmin->update('kategori', $dataupdate, 'id_Kategori', $id);
        redirect('kategori');
    }

    public function delete($id)
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $this->Madmin->hapus('kategori', 'id_Kategori', $id);
        redirect('kategori');
    }

    public function tampil_kategori()
    {
        $data['kategori'] = $this->Madmin->tamp_kategori()->result();
        $this->load->view('tampil_kategori', $data);
    }


    public function sabun_mandi()
    {
        $data['sabun_mandi'] = $this->M_kategori->data_sabun_mandi()->result();
        $this->load->view('home/layout/header');
        $this->load->view('home/layout/menu');
        $this->load->view('home/tampil_kategori', $data);
        $this->load->view('home/tampil_footer');
    }
}
