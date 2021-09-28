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
            $this->load->view('kategori/index', $data);
        }
        
        public function create()
        {
            $this->load->view('kategori/create');
        }

        public function store()
        {
            $data = ['nama_kategori' => $this->input->post('nama_kategori')];
            $rules = [
                [
                'field' => 'nama_kategori',
                'label' => 'nama_kategori',
                'rules' => 'trim|required'
                ]
            ];
            
            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run()) {
                $result = $this->Kategori_model->insert($data);
                if ($result) {
                    redirect('kategori');
                }
            } else {
                redirect('kategori/create');
            }
        }

        public function show($id_kategori)
        {
            $kategori_produk = $this->Kategori_model->show($id_kategori);
            $data = [
                'data' => $kategori_produk
            ];
            $this->load->view('kategori/show', $data);
        }

        public function edit($id_kategori)
        {
            $kategori = $this->Kategori_model->show($id_kategori);
            $data = [
                'data' => $kategori
            ];
            $this->load->view('kategori/edit', $data);
        }
    
        public function update($id_kategori)
        {
            // TODO: implementasi update data berdasarkan $id
            $id_kategori = $this->input->post('id_kategori');
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori')
            );

            $this->Kategori_model->update($id_kategori, $data);
            redirect('kategori');
        }
    
        public function destroy($id_kategori)
        {
            $this->Kategori_model->delete($id_kategori);
            redirect('kategori');
        }
    
    }
    
    /* End of file Kategori.php */
    