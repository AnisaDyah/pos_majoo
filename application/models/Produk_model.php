<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

        public function list_product()
        {
            $this->db->limit(5);
            $query = $this->db->get('produk');
            return $query->result();
        }

        public function fetch_product($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get("produk");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
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
            $this->db->select('*');
            $this->db->join('kategori_produk', 'kategori_produk.id_kategori = produk.kategori');
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

        function getKategori($searchTerm){

            $this->db->select('*');
            $this->db->where("lower(nama_kategori) like '%".$searchTerm."%' ");
            $fetched_records = $this->db->get('kategori_produk');
            $kategori = $fetched_records->result_array();
       
            // Initialize Array with fetched data
            $data = array();
            foreach($kategori as $kat){
               $data[] = array("id"=>$kat['id_kategori'], "text"=>$kat['nama_kategori']);
            }
            return $data;
         }

}

/* End of file Produk_model.php */


?>
