<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
        $data['member'] = $this->Madmin->get_all_data('member')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/member/member', $data);
        $this->load->view('admin/layout/footer');
    }

    public function delete($id)
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }
        $this->Madmin->hapus('member', 'id_konsumen', $id);
        redirect('member');
    }
}
