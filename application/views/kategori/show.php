<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
              <div class="container">
        <br/>
        <legend>Lihat Kategori</legend>
        <div class="content">
          <div class="form-group">
            <label for="jabatan">Kategori</label>
            <p><?php echo $data->nama_kategori ?></p>
          </div>
          <a class="btn btn-info" href="<?php echo base_url('kategori/') ?>">Kembali</a>
        </div>
      </div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>