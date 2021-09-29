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
        $config = array();
        $config["base_url"] = base_url('Produk/index');
        $config["total_rows"] = $this->Produk_model->getTotal();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["list"] = $this->Produk_model->fetch_product($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data["kategori"] = $kategori;
            // $data = [
            //     'list' => $this->Produk_model->list_product(),
            //     'kategori' => $kategori
            // ];
        

        $this->load->view('produk/index', $data);
    }

    public function search()
	{
		$json = [];


		$this->load->database();

		
		if(!empty($this->input->get("q"))){
			$this->db->like('nama_kategori', $this->input->get("q"));
			$query = $this->db->select('id_kategori,nama_kategori as text')
						->limit(10)
						->get("kategori_produk");
			$json = $query->result();
		}

		
		echo json_encode($json);
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

    public function getKategori(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $response = $this->Produk_model->getKategori($searchTerm);
  
        echo json_encode($response);
     }

    public function store()
    {
        $this->form_validation->set_rules('nama_produk', "Nama Produk", "required|is_unique[produk.nama_produk]");
		$this->form_validation->set_rules('kategori', "Kategori", "required");
		$this->form_validation->set_rules('deskripsi', "Deskripsi", "required");
        $this->form_validation->set_rules('harga', "Harga", "required|integer");
		$this->form_validation->set_rules('stok', "Stok", "required|integer");



		if ($this->form_validation->run() == true) {
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
                    $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
                    redirect('produk/index'); 
                }else{
                    $this->session->set_flashdata("error", "Data Gagal di Tambahkan");
                    redirect(base_url("Produk/create"));

                }
            }
        }else{
            $this->session->set_flashdata('error', validation_errors());
			redirect(base_url("Produk/create"));
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
        $this->form_validation->set_rules('nama_produk', "Nama Produk", "required");
		$this->form_validation->set_rules('kategori', "Kategori", "required");
		$this->form_validation->set_rules('deskripsi', "Deskripsi", "required");
        $this->form_validation->set_rules('harga', "Harga", "required|integer");
		$this->form_validation->set_rules('stok', "Stok", "required|integer");



		if ($this->form_validation->run() == true) {
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
                    $this->session->set_flashdata("success_message", "Data Berhasil di Ubah");
                    redirect('produk/index'); 
                }else{
                    $this->session->set_flashdata("error", "Data Gagal di Ubah");
                    redirect(base_url("Produk/edit/".$id_produk));

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
                    $this->session->set_flashdata("success_message", "Data Berhasil di Perbaharui");
                    redirect('produk/index'); 
                }else{
                    $this->session->set_flashdata("error", "Data Gagal di Perbaharui");
                    redirect(base_url("Produk/edit/".$id_produk));

                }
            }
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url("Produk/edit/".$id_produk));
        }
    }

    public function destroy($id_produk)
    {
        $result=$this->Produk_model->delete($id_produk);
        if(!$result)
        {
            $this->session->set_flashdata("success_message", "Data Berhasil di Hapus");
        }else{
            $this->session->set_flashdata("error", "Data Gagal di Hapus");
        }
        redirect('produk');
    }


}

/* End of file Produk.php */


?>