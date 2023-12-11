<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/login');
    }

    public function dashboard()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('adminpanel');
        }

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer');
    }

    public function login()
    {

        $this->load->model('Madmin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->Madmin->M_login($u, $p)->num_rows();

        if ($cek == 1) {
            $data_session = array(
                'username' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('adminpanel/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('adminpanel');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('Berhasil Logout!');
        redirect('adminpanel');
    }
}
