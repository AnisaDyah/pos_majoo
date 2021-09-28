<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

        public function list_product()
        {
            $query = $this->db->get('produk');
            return $query->result();
        }

        // public function getEtical()
        // {
        //     $query = $this->db->query('select*from produk where kategori=1');
        //     return $query->result();
        // }

        // public function getGeneric()
        // {
        //     $query = $this->db->query('select*from produk where kategori=2');
        //     return $query->result();
        // }

        // public function getLainnya()
        // {
        //     $query = $this->db->query('select*from produk where kategori=4');
        //     return $query->result();
        // }

        public function getBag()
        {
            $query = $this->db->query('select*from produk where kategori=5');
            return $query->result();
        }

        public function getStraw()
        {
            $query = $this->db->query('select*from produk where kategori=6');
            return $query->result();
        }

        public function getContainer()
        {
            $query = $this->db->query('select*from produk where kategori=7');
            return $query->result();
        }

        public function getPoncho()
        {
            $query = $this->db->query('select*from produk where kategori=8');
            return $query->result();
        }

        public function getPla()
        {
            $query = $this->db->query('select*from produk where kategori=9');
            return $query->result();
        }

        public function getPaper()
        {
            $query = $this->db->query('select*from produk where kategori=10');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('produk');
        }


        public function insert($data = [])
        {
            $result = $this->db->insert('produk', $data);
            return $result;
        }

        public function show($id_produk)
        {
            $this->db->where('id_produk', $id_produk);
            $query = $this->db->get('produk');
            return $query->row();
        }

        public function update($id_produk, $data = [])
        {
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk', $data);
        }


        public function delete($id_produk)
        {
            $this->db->where('id_produk', $id_produk);
            $this->db->delete('produk');
        }
	
	//mengambil kategori
        public function get_kategori()
        {
            $query = $this->db->get('kategori_produk');
            return $query->result();
        }

}

/* End of file Produk_model.php */


?>
