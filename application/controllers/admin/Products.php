<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    /**
     * Halaman index - Menampilkan semua produk
     */
    public function index()
    {
        $data['products'] = $this->product_model->get_all();
        $this->load->view('products/index', $data);
    }

    /**
     * Halaman form tambah produk
     */
    public function create()
    {
        $this->load->view('products/add');
    }

    /**
     * Proses simpan produk baru
     */
    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
            'price' => (int) $this->input->post('price'),
            'description' => $this->input->post('description')
        ];

        if ($this->product_model->insert($data)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        }

        redirect('products');
    }

    /**
     * Proses hapus produk
     * @param int $id
     */
    public function delete($id)
    {
        if ($this->product_model->delete($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        }

        redirect('products');
    }
}
