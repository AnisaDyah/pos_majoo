
<style>
    .text-limit {
        display: -webkit-box;
  overflow: hidden;
  -webkit-line-clamp: 5;
  -webkit-box-orient: vertical;
    }
}
</style>
<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            <?php if ($this->session->flashdata('success_message') != null) : ?>
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success_message'); ?>
              </div>
            <?php endif ?>
            <?php $error = $this->session->flashdata('error');
							if ($error) { ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $error; ?>
								</div>
							<?php } ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produk</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-produk" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th width="1%">No.</th>
                          <th width="10%" class="text-center">Nama Produk</th>
                          <th width="10%" class="text-center">Gambar</th>
                          <th width="5%" class="text-center">Kategori</th>
                          <th width="20%" class="text-center">Deskripsi</th>
                          <th width="5%" class="text-center">Stok</th>
                          <th width="10%" class="text-center">Harga</th>
                          <th width="10%" class="text-center">
                          <!-- <a class="btn btn-primary" href="<?php echo base_url('produk/create') ?>"> -->
                          Action
                          </a>
                          </th>
                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($list as $data => $value) { ?>
                        <tr>
                        <td class="text-center"><?php echo ++$data; ?></td>
                        <td>
                          <?php echo $value->nama_produk ?>
                        </td>
                        <td>
                          <center>    
                          <a href ="<?php echo base_url('assets/image/'.$value->gambar)?>"><img src="<?php echo base_url('assets/image/'.$value->gambar)?>" width="100" height="100"></a>
                          </center>
                        </td>
                        <td>
                          <?php foreach ($kategori as $k)
                          {
                            if($k->id_kategori == $value->kategori)
                            {
                              echo $k->nama_kategori;
                            }
                          }
                          ?>
                        </td>
                        <td class="text-center">
                        <p class="text-justify text-limit"><?php echo $value->deskripsi ?></p>
                        </td>
                        <td class="text-center"><?php echo $value->stok ?></td>
                        <td><?php echo "Rp " . number_format($value->harga,2,',','.') ?></td>
                          <td class="text-center">
                              <?php echo form_open('Produk/destroy/'.$value->id_produk)  ?>
                              <a class="btn btn-info" href="<?php echo base_url('Produk/edit/'.$value->id_produk) ?>">
                                  Ubah
                              </a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                              <?php echo form_close() ?>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                    <div class="row">
                      <div class="col">
                          <!--Tampilkan pagination-->
                          <?php echo $links; ?>
                      </div>
                  </div>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>