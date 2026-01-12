<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{

    /**
     * Mendapatkan semua produk
     * @return array
     */
    public function get_all()
    {
        return $this->db->get('products')->result();
    }

    /**
     * Mendapatkan produk berdasarkan ID
     * @param int $id
     * @return object|null
     */
    public function get_by_id($id)
    {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    /**
     * Menyimpan produk baru
     * @param array $data
     * @return bool
     */
    public function insert($data)
    {
        return $this->db->insert('products', $data);
    }

    /**
     * Menghapus produk berdasarkan ID
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->db->delete('products', ['id' => $id]);
    }
}
