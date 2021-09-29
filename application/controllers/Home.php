<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Produk_model');
            $this->load->model('Kategori_model');
        }

        public function index()
        {
            $data['kategori'] =$this->Produk_model->get_kategori();
            $data['list'] = $this->Produk_model->list_product();
            $this->load->view('majoo/index2', $data);
        }

        public function register()
        {
            $data['kategori'] =$this->Produk_model->get_kategori();
            $this->load->view('majoo/register',$data);
        }

        public function kontak()
        {
            $data['kategori'] =$this->Produk_model->get_kategori();
            $this->load->view('majoo/kontak',$data);
        }


        public function kategori($id_kategori)
        {
            $produk = $this->Kategori_model->show($id_kategori);
            $data ['nama_kategori'] = $produk->nama_kategori;
            //var_dump($data ['data']->nama_kategori);
            $data['produk_by'] = $this->Kategori_model->produk_by($id_kategori);
            $data['kategori'] =$this->Produk_model->get_kategori();
            $this->load->view('majoo/kategori', $data);
        }


        

        public function detail($id_produk)
        {
            $produk = $this->Produk_model->show($id_produk);
            $data = ['data' => $produk];
            $data['kategori'] = $this->Produk_model->get_kategori();
            $this->load->view('majoo/detail', $data);
        }
    
        
    }
    
    /* End of file Home.php */
?>