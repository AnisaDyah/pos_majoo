<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
              <div class="container">
        <br/>
        <legend>Edit Produk</legend>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <?php $error = $this->session->flashdata('error');
							if ($error) { ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $error; ?>
								</div>
							<?php } ?>
        <?php echo form_open_multipart('Produk/update/'.$data->id_produk); ?>
          <?php echo form_hidden('id_produk', $data->id_produk) ?>
          <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk"
            value="<?php echo $data->nama_produk ?>">
          </div>
          <div class="form-group">
              <label for="">Gambar</label>
              <input type="file" class="form-control" id="gambar" name="gambar" size="20">
            </div>
          <div class="form-group">
          <label> Kategori </label>
            <select id='itemName' class="form-control" name ="kategori">
                <option value='<?php echo $data->id_kategori ?>' selected><?php echo $data->nama_kategori ?></option>
            </select>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" rows="5" cols="9" id="editordata" name="deskripsi"><?php echo $data->deskripsi ?></textarea>
            
          </div>
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok"
            value="<?php echo $data->stok ?>">
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga"
            value="<?php echo $data->harga ?>">
          </div>

          <a class="btn btn-info" href="<?php echo base_url('Produk/') ?>">Kembali</a>
          <button type="submit" class="btn btn-primary">OK</button>
        <?php echo form_close(); ?>
        </div>
      </div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>