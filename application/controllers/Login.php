<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url', 'form');
        $this->load->model('Login_model');
    }
    public function index()
    {
        $this->load->view('majoo/index2');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordx = md5($password);
        $set = $this->Login_model->login($username, $passwordx);
        if($set)
        { 
            $log = [
                'id' => $set->id,
                'username' => $set->username,
                'privilege' => $set->privilege,
                'status' => 'Logged'
            ];
            $this->session->set_userdata($log);            

            if($this->Login_model->login($username, $passwordx))
            {
                if($this->session->privilege=="Administrator")
                { redirect('Admin/index'); 
                }
                else
                { redirect('Home'); 
                }
            }
            else
            {
               redirect('Home');
            }
        }
        else
        {
            redirect('Home');
        }
    }

    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('Home');
    }
}

/* End of file Login.php */
?>
