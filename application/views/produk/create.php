<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
                <div class="container">
          <br/><br/><br/>
          <legend>Tambah Produk</legend>
          <div class="col-xs-12 col-sm-12 col-md-12">
          <?php echo form_open_multipart('produk/store'); ?>

            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" class="form-control" id="gambar" name="gambar" size="20">
            </div>
            <div class="form-group">
            <label> Kategori </label>
                  <select class="form-control" name ="kategori" id="kategori"> 
                  <option selected> --Pilih Kategori-- </option>
                  <?php foreach ($dataKategori as $k) { ?>
                  <option value="<?php echo $k->id_kategori?>"><?php echo $k->nama_kategori?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" rows="3">
            </div>
            
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga">
            </div>

            <a class="btn btn-info" href="<?php echo base_url() ?>produk">Kembali</a>
            <button type="submit" class="btn btn-primary">OK</button>
          <?php echo form_close() ?>
          </div>
        </div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>