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
              
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produk</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20%">Nama Produk</th>
                          <th width="20%">Gambar</th>
                          <th width="15%">Kategori</th>
                          <th width="10%">Stok</th>
                          <th width="10%">Harga</th>
                          <th width="45%">
                          <a class="btn btn-primary" href="<?php echo base_url('produk/create') ?>">
                            Tambah
                          </a>
                          </th>
                          
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($list as $data => $value) { ?>
                        <tr>
                        <td>
                        <a href="<?php echo base_url('produk/show/'.$value->id_produk) ?>"><span class="label label-success pull-right">Lihat Detail</span></a>
                          <?php echo $value->nama_produk ?>
                        </td>
                        <td>
                          <!-- <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal"> -->
                          <center>    
                          <a href ="<?php echo base_url('assets/image/'.$value->gambar)?>"><img src="<?php echo base_url('assets/image/'.$value->gambar)?>" width="100" height="100"></a>
                          </center>
                          <!-- </button> -->
                          <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Produk</h4>
                                </div>
                                <div class="modal-body">
                                <center> 
                                    <img src="<?php echo base_url('assets/image/'.$value->gambar)?>" alt="" class="img-responsive">
                                </center>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                </div>
                            </div>
                            </div>
                        </div> -->
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
                        <td><?php echo $value->stok ?></td>
                        <td><?php echo $value->harga ?></td>
                          <td>
                              <?php echo form_open('produk/destroy/'.$value->id_produk)  ?>
                              <a class="btn btn-info" href="<?php echo base_url('produk/edit/'.$value->id_produk) ?>">
                                  Ubah
                              </a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                              <?php echo form_close() ?>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>