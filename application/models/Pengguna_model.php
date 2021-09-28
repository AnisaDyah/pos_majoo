<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengguna_model extends CI_Model {

        public function list_user()
        {
            $query = $this->db->get('admin_user');
            return $query->result();
        }

        public function getTotal()
        {
            return $this->db->count_all('admin_user');
        }

        public function insert($data = [])
        {
            $result = $this->db->insert('admin_user', $data);
            return $result;
        }

        public function show($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('admin_user');
            return $query->row();
        }

        public function update($id, $data = [])
        {
            $ubah = array(
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'email'  => $data['email'],
                'notelp'  => $data['notelp'],
                'username'  => $data['username'],
                'password'  => $data['password'],
                'privilege' => $data['privilege']
            );

            $this->db->where('id', $id);
            $this->db->update('admin_user', $ubah);
        }


        public function delete($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('admin_user');
        }
    }
    
    /* End of file Kategori_model.php */
    