<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Produk_model');
        }

        public function index()
        {
            $data['list'] = $this->Produk_model->list_product();
            $this->load->view('sippko/index2', $data);
        }

        // public function etical()
        // {
        //     $data['getEtical'] = $this->Produk_model->getEtical();
        //     $this->load->view('sippko/etical', $data);
        // }

        // public function generic()
        // {
        //     $data['getGeneric'] = $this->Produk_model->getGeneric();
        //     $this->load->view('sippko/generic', $data);
        // }

        // public function lainnya()
        // {
        //     $data['getLainnya'] = $this->Produk_model->getLainnya();
        //     $this->load->view('sippko/lainnya', $data);
        // }

        public function bag()
        {
            $data['getBag'] = $this->Produk_model->getBag();
            $this->load->view('sippko/bag', $data);
        }

        public function straw()
        {
            $data['getStraw'] = $this->Produk_model->getStraw();
            $this->load->view('sippko/straw', $data);
        }

        public function container()
        {
            $data['getContainer'] = $this->Produk_model->getContainer();
            $this->load->view('sippko/container', $data);
        }

        public function poncho()
        {
            $data['getPoncho'] = $this->Produk_model->getPoncho();
            $this->load->view('sippko/poncho', $data);
        }

        public function pla()
        {
            $data['getPla'] = $this->Produk_model->getPla();
            $this->load->view('sippko/pla', $data);
        }

        public function paper()
        {
            $data['getPaper'] = $this->Produk_model->getPaper();
            $this->load->view('sippko/paper', $data);
        }

        public function register()
        {
            $this->load->view('sippko/register');
        }

        public function kontak()
        {
            $this->load->view('sippko/kontak');
        }

        public function faq()
        {
            $this->load->view('sippko/faq');
            
        }

        public function profper()
        {
            $this->load->view('sippko/profper');
            
        }

        public function vismis()
        {
            $this->load->view('sippko/vismis');
            
        }

        public function history()
        {
            $this->load->view('sippko/historiorder');
            
        }

        public function detail($id_produk)
        {
            $produk = $this->Produk_model->show($id_produk);
            $data = ['data' => $produk];
            $data['kategori'] = $this->Produk_model->get_kategori();
            $this->load->view('sippko/detail', $data);
        }
    
        public function basket($id_produk)
        {
            /*$produk = $this->Produk_model->show($id_produk);
            $data = ['data' => $produk];
            $data['kategori'] = $this->Produk_model->get_kategori();
            $this->load->view('sippko/basket', $data);*/
            $kategori  = $this->Produk_model->get_kategori();
            $data = [
                'list' => $this->Produk_model->list_product(),
                'kategori' => $kategori];
            $this->load->view('sippko/basket', $data);
        }
    }
    
    /* End of file Home.php */
?>