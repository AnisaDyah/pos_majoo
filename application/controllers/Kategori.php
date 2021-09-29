<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kategori extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->library('form_validation');
		    $this->load->library('pagination');
            $this->load->model('Kategori_model');

            if($this->session->privilege != 'Administrator')
            {
                redirect('home');
            }
        }

        public function index()
        {
            $data['list'] = $this->Kategori_model->list_kategori();
            $this->load->view('Kategori/index', $data);
        }
        
        public function create()
        {
            $this->load->view('Kategori/create');
        }

        public function store()
        {

            $this->form_validation->set_rules('nama_kategori', "Nama Kategori", "required|is_unique[kategori_produk.nama_kategori]");
            $data = ['nama_kategori' => $this->input->post('nama_kategori')];

            if ($this->form_validation->run()== true) {
                $result = $this->Kategori_model->insert($data);
                if ($result) {
                    $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
                    redirect('Kategori'); 
                }else{
                    $this->session->set_flashdata("error", "Data Gagal di Tambahkan");
                    redirect(base_url("Kategori/create"));

                }
            } else {
                $this->session->set_flashdata('error', validation_errors());
                redirect('Kategori/create');
            }
        }

        public function show($id_kategori)
        {
            $kategori_produk = $this->Kategori_model->show($id_kategori);
            $data = [
                'data' => $kategori_produk
            ];
            $this->load->view('Kategori/show', $data);
        }

        public function edit($id_kategori)
        {
            $kategori = $this->Kategori_model->show($id_kategori);
            $data = [
                'data' => $kategori
            ];
            $this->load->view('Kategori/edit', $data);
        }
    
        public function update($id_kategori)
        {
            // TODO: implementasi update data berdasarkan $id
            $id_kategori = $this->input->post('id_kategori');
            $this->form_validation->set_rules('nama_kategori', "Nama Kategori", "required");
            $data = ['nama_kategori' => $this->input->post('nama_kategori')];

            if ($this->form_validation->run()== true) {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori')
            );

            $result = $this->Kategori_model->update($id_kategori, $data);
                if (!$result) {
                    $this->session->set_flashdata("success_message", "Data Berhasil di Perbaharui");
                    redirect('Kategori'); 
                }else{
                    $this->session->set_flashdata("error", "Data Gagal di Perbaharui");
                    redirect(base_url("Kategori/edit/".$id_kategori));

                }
            } else {
                $this->session->set_flashdata('error', validation_errors());
                redirect('Kategori/edit/'.$id_kategori);
            }
        }
    
        public function destroy($id_kategori)
        {
            $result=$this->Kategori_model->delete($id_kategori);
            if(!$result)
            {
                $this->session->set_flashdata("success_message", "Data Berhasil di Hapus");
            }else{
                $this->session->set_flashdata("error", "Data Gagal di Hapus");
            }
            redirect('Kategori');
        }
    
    }
    
    /* End of file Kategori.php */
    