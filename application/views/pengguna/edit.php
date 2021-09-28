<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
            <div class="container">
      <br/><br/><br/>
      <legend>Edit User</legend>
      <div class="col-xs-12 col-sm-12 col-md-12">
      <?php echo form_open('pengguna/update/'.$pengguna->id); ?>
        <?php echo form_hidden('id', $pengguna->id) ?>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?php echo $pengguna->nama ?>">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $pengguna->alamat ?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?php echo $pengguna->email ?>">
        </div>
        <div class="form-group">
          <label for="notelp">No. Telp</label>
          <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukkan No. Telp" value="<?php echo $pengguna->notelp ?>">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?php echo $pengguna->username ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?php echo $pengguna->password ?>">
        </div>
        <div class="form-group">
          <label> Privilege </label>
              <select class="form-control" name ="privilege" id="privilege"> 
                <option selected>
                <?php
                      echo $pengguna->privilege;
                ?>
                </option>
                <option value="User">User</option>
                <option value="Administrator">Administrator</option>
            </select>
        </div>

        <a class="btn btn-info" href="<?php echo base_url('kategori/index') ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">OK</button>
      <?php echo form_close(); ?>
      </div>
</div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>