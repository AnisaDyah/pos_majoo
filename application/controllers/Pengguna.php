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
            $this->load->view('Pengguna/index', $data);
        }
        
        public function create()
        {
            $this->load->view('Pengguna/create');
        }

        public function store()
        {
            $this->form_validation->set_rules('username', "username", "required|alpha_numeric|min_length[4]");
            $this->form_validation->set_rules('notelp', "No Telp", "required");
            $this->form_validation->set_rules('alamat', "Alamat", "required");
            $this->form_validation->set_rules('nama', "Nama Lengkap", "required");
            $this->form_validation->set_rules('password', "password", "min_length[4]");
            $this->form_validation->set_rules('email', "E-mail", "trim|required|valid_email");

            if($this->session->privilege=="Administrator")
            {
                $this->form_validation->set_rules('privilege', "Privilege", "required");

                if ($this->form_validation->run() == true) {
                        $data = [
                            'nama' => $this->input->post('nama'),
                            'alamat' => $this->input->post('alamat'),
                            'email' => $this->input->post('email'),
                            'notelp' => $this->input->post('notelp'),
                            'username' => $this->input->post('username'),
                            'password' => md5($this->input->post('password')),
                            'privilege' => $this->input->post('privilege')
                        ];

                            $result = $this->Pengguna_model->insert($data);
                            if ($result) {
                                 $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
                                 redirect('Pengguna');
                            }else{
                                $this->session->set_flashdata("error", "Data Gagal di Tambahkan");
                                redirect('Pengguna/create');

                            }
                    }else{
                        $this->session->set_flashdata('error', validation_errors());
                        redirect('Pengguna/create');
                    }
                    
            }else{
                if ($this->form_validation->run() == true) {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'email' => $this->input->post('email'),
                    'notelp' => $this->input->post('notelp'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'privilege' => 'User'
                ];
                
                    $result = $this->Pengguna_model->insert($data);
             
                    if ($result) {
                        $this->session->set_flashdata("success_message", "Berhasil Registrasi, Silahkan Login");
                        redirect('Home/register'); 
                    }else{
                        $this->session->set_flashdata("error", "Gagal Registrasi");
                        redirect('Home/register');
    
                    }
               
            }else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('Home/register');
            }
          }

        }

        public function show($id)
        {
            $pengguna = $this->Pengguna_model->show($id);
            $data = [
                'data' => $pengguna
            ];
            $this->load->view('Pengguna/show', $data);
        }

        public function edit($id)
        {
            $pengguna = $this->Pengguna_model->show($id);
            $data = [
                'pengguna' => $pengguna
            ];
            $this->load->view('Pengguna/edit', $data);
        }
    
        public function update($id)
        {
            // TODO: implementasi update data berdasarkan $id
            $this->form_validation->set_rules('username', "username", "required|alpha_numeric|min_length[4]");
            $this->form_validation->set_rules('notelp', "No Telp", "required");
            $this->form_validation->set_rules('alamat', "Alamat", "required");
            $this->form_validation->set_rules('nama', "Nama Lengkap", "required");
            $this->form_validation->set_rules('password', "password", "min_length[4]");
            $this->form_validation->set_rules('email', "E-mail", "trim|required|valid_email");
            $this->form_validation->set_rules('privilege', "Privilege", "required");

            $id = $this->input->post('id');
            if ($this->form_validation->run() == true) {
            $data = array(
                'nama' => $this->input->post('nama'), 
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'notelp' => $this->input->post('notelp'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'privilege' => $this->input->post('privilege')
            );

                $result=$this->Pengguna_model->update($id, $data);
                if (!$result) {
                    $this->session->set_flashdata("success_message", "Data Berhasil di Perbaharui");
                    redirect('Pengguna');
               }else{
                   $this->session->set_flashdata("error", "Data Gagal di Perbaharui");
                   redirect('Pengguna/edit/'.$id);

               }
            }else{
                $this->session->set_flashdata('error', validation_errors());
                redirect('Pengguna/edit/'.$id);
            }
        }
    
        public function destroy($id)
        {
            $result=$this->Pengguna_model->delete($id);
            if(!$result)
            {
                $this->session->set_flashdata("success_message", "Data Berhasil di Hapus");
            }else{
                $this->session->set_flashdata("error", "Data Gagal di Hapus");
            }
            redirect('Pengguna');
        }
    
    }
    
    /* End of file Kategori.php */
    