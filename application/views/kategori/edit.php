<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
            <div class="container">
      <br/><br/><br/>
      <legend>Edit Kategori</legend>
      <div class="col-xs-12 col-sm-12 col-md-12">
      <?php echo form_open('kategori/update/'.$data->id_kategori); ?>
        <?php echo form_hidden('id_kategori', $data->id_kategori) ?>
        <div class="form-group">
          <label for="kategori">Kategori</label>
          <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Kategori" value="<?php echo $data->nama_kategori ?>">
        </div>

        <a class="btn btn-info" href="<?php echo base_url('kategori/index') ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">OK</button>
      <?php echo form_close(); ?>
      </div>
</div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>