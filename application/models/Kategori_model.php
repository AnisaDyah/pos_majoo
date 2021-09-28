<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kategori_model extends CI_Model {
       public function list_kategori()
        {
            $query = $this->db->get('kategori_produk');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('kategori_produk');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('kategori_produk', $data);
            return $result;
        }

        public function show($id_kategori)
        {
            $this->db->where('id_kategori', $id_kategori);
            $query = $this->db->get('kategori_produk');
            return $query->row();
        }

        public function update($id_kategori, $data = [])
        {
            $ubah = array(
                'nama_kategori' => $data['nama_kategori']
            );

            $this->db->where('id_kategori', $id_kategori);
            $this->db->update('kategori_produk', $ubah);
        }


        public function delete($id_kategori)
        {
            $this->db->where('id_kategori', $id_kategori);
            $this->db->delete('kategori_produk');
        }
    }
    
    /* End of file Kategori_model.php */
    