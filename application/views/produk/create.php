<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
                <div class="container">
          <br/><br/><br/>
          <legend>Tambah Produk</legend>
          <div class="col-xs-12 col-sm-12 col-md-12">
          <?php $error = $this->session->flashdata('error');
							if ($error) { ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $error; ?>
								</div>
							<?php } ?>
          <?php echo form_open_multipart('produk/store'); ?>

            <div class="form-group">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
            </div>
            <div class="form-group">
              <label for="gambar">Gambar</label>
              <!-- <form method="post" action="" id="upload_file">
              <input type="file"  class="form-control" name="userfile" id="userfile" size="20" />

              <input class="btn btn-success" type="submit" name="submit" id="submit" />
            </form>
            <div class="row align-items-center">
              <div class="col">
                <div class="progress">
                  <div id="file-progress-bar" class="progress-bar"></div>
              </div>
            </div>
            </div> -->
              <input type="file" class="form-control" id="gambar" name="gambar" size="20" require>
            </div>
            <div class="form-group">
            <label> Kategori </label>
            <select id='itemName' class="form-control" name ="kategori">
                <option value='0'>-- Pilih Kategori --</option>
            </select>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <!-- <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" rows="3"> -->
              <textarea class="form-control" rows="5" cols="9" id="editordata" name="deskripsi"></textarea>
            </div>
            
            <div class="form-group">
              <label for="stok">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok">
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga">
            </div>

            <a class="btn btn-info" href="<?php echo base_url() ?>produk">Kembali</a>
            <button type="submit" class="btn btn-primary">OK</button>
          <?php echo form_close() ?>
          </div>
        </div>
        </div>        
        <!-- /page content -->
<script>
  $(function() {
	$('#upload_file').submit(function(e) {
    e.preventDefault();
    var file_data = $('#userfile').prop('files')[0];
    var form_data = new FormData();

    form_data.append('file', file_data);
		$.ajax({
      xhr: function() {
          var xhr = new window.XMLHttpRequest();         
          xhr.upload.addEventListener("progress", function(element) {
              if (element.lengthComputable) {
                  var percentComplete = ((element.loaded / element.total) * 100);
                  $("#file-progress-bar").width(percentComplete + '%');
                  $("#file-progress-bar").html(percentComplete+'%');
              }
          }, false);
          return xhr;
      },
      type: 'POST',
			url 			:'./upload_file/', 
			secureuri		:false,
      data: form_data,
      dataType		: 'json',
      cache: false,
      processData: false,
      beforeSend: function() {    
        $("#file-progress-bar").width('0%');
      },
			success	: function (data, status)
			{
				if(data.status != 'error')
				{
					$('#files').html('<p>Reloading files...</p>');
					refresh_files();
					$('#title').val('');
				}
				alert(data.msg);
			}
		});
		return false;
	});
});
</script>
        <?php $this->load->view('layouts/footer_admin'); ?>