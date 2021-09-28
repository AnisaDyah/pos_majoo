<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class User extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url', 'form');
            $this->load->model('Login_model');
            $this->load->model('User_model');
        }

        public function index()
        {
            $session_id = $this->session->userdata('user');
            if(!empty($session_id))
            {
                redirect('sippko/');
            }

            $data['user'] = $session_id;
            $this->load->view('sippko', $data);
        }

        public function riwayat()
        {
            $id_user = $this->session->userdata('id');
            $data['riwayat'] = $this->User_model->getRiwayat($id_user);
            $this->load->view('sippko/historiorder', $data);
        }

        public function preupdate($id_order)
        {
            $data['preupdate'] = $this->User_model->orderdetail($id_order);
            $this->load->view('sippko/preupdate', $data);
        }

        public function update($id)
        {
            $config['upload_path']      = './assets/buktitf/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = 15000;
            $config['max_width']        = 13660;
            $config['max_height']       = 7680;
            $this->load->library('upload', $config);
            $this->upload->do_upload('bukti_tf');
            $this->User_model->ubahfoto($id);

            $this->riwayat();
        }

        public function orderdetail($id_order)
        {
            $data['orderdetail'] = $this->User_model->orderdetail($id_order);
            $this->load->view('sippko/orderdetail', $data);
        }
    }
    
    /* End of file .php */
