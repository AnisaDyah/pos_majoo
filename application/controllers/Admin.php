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
               redirect('Home'); 
            }
        }
		
		//load view admin index
        public function index()
        {
            $this->load->view('Admin/index');
        }
        
    
    }
    
    /* End of file Admin.php */
    
