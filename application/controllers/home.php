<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Home');
        $this->load->model('Madmin');
        $this->load->library('cart'); // Load the Cart library


        $params = array('server_key' => 'Mid-server-wm-ZPA0sx5ds4ecuxc1VmMpG', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }
    public function index()
    {
        $data['produk'] = $this->M_Home->produk();
        $data['kategori'] = $this->M_Home->kategori();
        $this->load->view('home/layout/header');
        $this->load->view('home/layout/menu', $data);
        $this->load->view('home/home', $data);
        $this->load->view('home/layout/footer');
    }

    public function login()
    {
        $this->load->view('home/login');
    }

    public function cek_login()
    {
        $this->load->model('Madmin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->M_Home->cek_login($u, $p)->num_rows();
        $result = $this->M_Home->cek_login($u, $p)->row_object();

        if ($cek == 1) {
            $data_session = array(
                'idKonsumen' => $result->id_konsumen,
                'Member' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('home');
        } else {
            redirect('home/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }



    public function register()
    {
        $this->load->view('home/daftar');
    }

    public function save_reg()
    {
        $username = $this->input->post('username'); // change 'nama' to 'username'
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon'); // change 'telpon' to 'telepon'
        $nama = $this->input->post('namaKonsumen');
        $password = $this->input->post('password');
        $alamat = $this->input->post('alamat');

        $dataInput = array(
            'username' => $username,
            'password' => $password,
            'namaKonsumen' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'telepon' => $telepon // change 'tlpn' to 'telepon'
        );

        $this->Madmin->insert('member', $dataInput);
        redirect('home/login');
    }



    public function kategori()
    {
        $data['kategori'] = $this->M_Home->kategori();
    }



    public function tampilkan_detail($id_produk)
    {
        $data['detail_produk'] = $this->M_Home->get_detail_produk($id_produk);
        $this->load->view('home/layout/header');
        $this->load->view('home/layout/menu');
        $this->load->view('home/detail_produk', $data);
    }

    public function keranjang()
    {
        if (!$this->is_logged_in()) {
            // Jika belum login, arahkan ke halaman login
            redirect('home/login');
        }

        $data['cart'] = $this->cart->contents();
        $this->load->view('home/layout/header');
        $this->load->view('home/layout/menu');
        $this->load->view('home/keranjang', $data);
    }

    public function tambah_keranjang($id_produk)
    {
        // Pemeriksaan apakah pengguna sudah login
        if (!$this->is_logged_in()) {
            // Jika belum login, arahkan ke halaman login
            redirect('home/login');
        }

        $produk = $this->M_Home->get_detail_produk($id_produk);

        $this->session->set_userdata('id_produk', $produk->id_Produk);

        $data = array(
            'id'      => $produk->id_Produk,
            'qty'     => 1,
            'price'   => $produk->harga,
            'name'    => $produk->Namaproduk,
            'image'   => $produk->foto
        );

        $this->cart->insert($data);
        redirect('home/keranjang');
    }

    public function hapus_item_keranjang($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty'   => 0,
        );

        $this->cart->update($data);
        redirect('home/keranjang');
    }

    public function kosongkan_keranjang()
    {
        $this->cart->destroy();
        redirect('home/keranjang');
    }

    private function is_logged_in()
    {
        return $this->session->userdata('status') == 'login';
    }
}
