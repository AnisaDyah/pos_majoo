<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('Produk_model');
        //Konfigurasi Upload
        $config['upload_path']      = './assets/image/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 15000;
        $config['max_width']        = 13660;
        $config['max_height']       = 7680;
        $this->load->library('upload', $config);
        if($this->session->privilege != 'Administrator')
        {
            redirect('home');
        }
    }

    public function index()
    { 
        $kategori = $this->Produk_model->get_kategori();

            $data = [
                'list' => $this->Produk_model->list_product(),
                'kategori' => $kategori
            ];
        

        $this->load->view('produk/index', $data);
    }
    
    public function create()
    {
        $kategori = $this->Produk_model->get_kategori();
        $dataKategori = ['dataKategori' => $kategori];
        $data = [
            'error' => ''
        ];
        $this->load->view('produk/create', $dataKategori);
    }

    public function store()
    {
        // Percobaan Upload
        if ( ! $this->upload->do_upload('gambar'))
        {
            $data = [ 
                'error' => $this->upload->display_errors()
            ];
            $this->load->view('produk/index', $data);
        }
        else
        {
            // Insert data
            $data = ['nama_produk' => $this->input->post('nama_produk'),
                'gambar' =>$this->upload->data('file_name'),
                'kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'stok' =>$this->input->post('stok'),
                'harga' => $this->input->post('harga')
                 ];
            
            if ($this->Produk_model->insert($data))
            { 
                redirect('produk/index'); 
            }
        }

    }

    public function show($id_produk)
    {
        $produk = $this->Produk_model->show($id_produk);
        $data = ['data' => $produk];
        $data['kategori'] = $this->Produk_model->get_kategori();
        $this->load->view('produk/show', $data);
    }

    public function edit($id_produk)
    {
        $produk = $this->Produk_model->show($id_produk);
        $kategori = $this->Produk_model->get_kategori();
        $data = ['data' => $produk,
                'kategori' => $kategori
                ];
        $this->load->view('produk/edit', $data);
    }

    public function update($id_produk)
    {
        // TODO: implementasi update data berdasarkan $id
        $id_produk = $this->input->post('id_produk');
        if(! $this->upload->do_upload('gambar'))
        {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
            ];
            $result = $this->Produk_model->update($id_produk, $data);
            if(!$result)
            {
                redirect('produk/index');
            }
        }
        else
        {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'gambar' => $this->upload->data('file_name'),
                'kategori' => $this->input->post('kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')
            ];

            $hapgam = $this->Produk_model->show($id_produk);
            unlink('./assets/image/'.$hapgam->gambar);
            $result = $this->Produk_model->update($id_produk, $data);

            if(!$result)
            {
                redirect('produk/index');
            }
        }
    }

    public function destroy($id_produk)
    {
        $this->Produk_model->delete($id_produk);
        redirect('produk');
    }


}

/* End of file Produk.php */


?>