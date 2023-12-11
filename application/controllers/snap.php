<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-8PPP7_TDFpg5_q7odcoLKdiM', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->load->model('Madmin');
    }

    public function index()
    {
        $this->load->view('checkout_snap');
    }

    public function token()
    {
        $total = $this->input->post('total');
        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $total, // Use the total value from the post input
        );

        // Optional item details (you may customize this according to your needs)
        $item1_details = array(
            'id' => 'a1',
            'price' => $total,
            'quantity' => 1,
            'name' => "Payment"
        );

        $item_details = array($item1_details);

        // Optional customer details (you may customize this according to your needs)
        $billing_address = array(
            'first_name'    => "John",
            'last_name'     => "Doe",
            'address'       => "123 Main Street",
            'city'          => "Cityville",
            'postal_code'   => "12345",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        $shipping_address = array(
            'first_name'    => "John",
            'last_name'     => "Doe",
            'address'       => "123 Main Street",
            'city'          => "Cityville",
            'postal_code'   => "12345",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        $customer_details = array(
            'first_name'    => "John",
            'last_name'     => "Doe",
            'email'         => "john.doe@example.com",
            'phone'         => "081122334455",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => array(
                'secure' => true
            ),
            'expiry'             => array(
                'start_time' => date("Y-m-d H:i:s O", time()),
                'unit' => 'hour',
                'duration'  => 2
            )
        );
        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));

        $order_id = $result->order_id;
        $gross_amount = $result->gross_amount;
        $transaction_status = $result->transaction_status;

        if ($transaction_status == 'settlement') {
            $order_data = array(
                'StatusOrder' => 'Sampai'
            );
            $this->Madmin->update('order', $order_data, 'id_Order', $order_id);

            $id_produk = isset($result->id_produk) ? $result->id_produk : null;

            $detail_order_data = array(
                'id_Order' => $order_id,
                'id_Produk' => $id_produk,
                'jumlah' => 1,
                'harga' => $gross_amount
            );

            $this->Madmin->insert_detail_order($detail_order_data);

            echo 'Transaksi berhasil.';
        } else {
            echo 'Transaksi gagal atau belum sukses.';
        }
    }
}
