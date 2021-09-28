<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Admin_model');
            if($this->session->privilege !='Administrator')
            { 
               redirect('home'); 
            }
        }
		
		//load view admin index
        public function index()
        {
            $this->load->view('admin/index');
        }

        public function transaksi()
        {
            $data['konfirmasi'] = $this->Admin_model->getData();
            $this->load->view('admin/transaksi', $data);
        }
        public function change_status()
        {
            $this->Admin_model->change_status();
            redirect('admin/transaksi','refresh');
        }
    
    }
    
    /* End of file Admin.php */
    
