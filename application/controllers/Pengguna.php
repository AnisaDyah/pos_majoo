<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengguna extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->library('form_validation');
		    $this->load->library('pagination');
            $this->load->model('Pengguna_model');

            // if($this->session->privilege != 'Administrator')
            // {
            //     redirect('home');
            // }
        }

        public function index()
        {
            $data['list'] = $this->Pengguna_model->list_user();
            $this->load->view('pengguna/index', $data);
        }
        
        public function create()
        {
            $this->load->view('pengguna/create');
        }

        public function store()
        {
            if($this->session->privilege=="Administrator")
            {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'email' => $this->input->post('email'),
                    'notelp' => $this->input->post('notelp'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'privilege' => $this->input->post('privilege')
                ];
                $rules = [
                    [
                    'field' => 'nama',
                    'label' => 'nama',
                    'rules' => 'trim|required'
                    ]
                ];
                
                $this->form_validation->set_rules($rules);
    
                if ($this->form_validation->run()) {
                    $result = $this->Pengguna_model->insert($data);
                    if ($result) {
                        redirect('pengguna');
                    }
                } else {
                    redirect('pengguna/create');
                }
            }

            else
            {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'email' => $this->input->post('email'),
                    'notelp' => $this->input->post('notelp'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'privilege' => 'User'
                ];
                $rules = [
                    [
                    'field' => 'nama',
                    'label' => 'nama',
                    'rules' => 'trim|required'
                    ]
                ];
                
                $this->form_validation->set_rules($rules);
    
                if ($this->form_validation->run()) {
                    $result = $this->Pengguna_model->insert($data);
             
                    if ($result) {
                        redirect('home');
                    }
                } else {
                    redirect('home/register');
                }
            }

        }

        public function show($id)
        {
            $pengguna = $this->Pengguna_model->show($id);
            $data = [
                'data' => $pengguna
            ];
            $this->load->view('pengguna/show', $data);
        }

        public function edit($id)
        {
            $pengguna = $this->Pengguna_model->show($id);
            $data = [
                'pengguna' => $pengguna
            ];
            $this->load->view('pengguna/edit', $data);
        }
    
        public function update($id)
        {
            // TODO: implementasi update data berdasarkan $id
            $id = $this->input->post('id');
            $data = array(
                'nama' => $this->input->post('nama'), 
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'notelp' => $this->input->post('notelp'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'privilege' => $this->input->post('privilege')
            );

            $this->Pengguna_model->update($id, $data);
            redirect('pengguna');
        }
    
        public function destroy($id)
        {
            $this->Pengguna_model->delete($id);
            redirect('pengguna');
        }
    
    }
    
    /* End of file Kategori.php */
    