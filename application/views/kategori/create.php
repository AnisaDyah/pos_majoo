<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
          <div class="container">
            <br/><br/><br/>
            <legend>Tambah Kategori</legend>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <?php $error = $this->session->flashdata('error');
							if ($error) { ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $error; ?>
								</div>
							<?php } ?>
            <?php echo form_open('Kategori/store'); ?>

              <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Kategori">
              </div>

              <a class="btn btn-info" href="<?php echo base_url() ?>Kategori">Kembali</a>
              <button type="submit" class="btn btn-primary">OK</button>
            <?php echo form_close() ?>
            </div>
          </div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>