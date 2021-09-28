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
                    <h2>Pengguna</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20%">Nama</th>
                          <th width="20%">Username</th>
                          <th width="20%">Password</th>
                          <th width="20%">Privilege</th>
                          <th width="20%">
                          <a class="btn btn-primary" href="<?php echo base_url('pengguna/create') ?>">
                            Tambah
                          </a>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php foreach ($list as $data => $value) { ?>
                        <tr>
                          <td>
                            <a href="<?php echo base_url('pengguna/show/'.$value->id) ?>"><span class="label label-success pull-right">Lihat Detail</span></a>
                            <?php echo $value->nama ?>
                          </td>
                          <td>
                            <?php echo $value->username ?>
                          </td>
                          <td>
                            <?php echo $value->password ?>
                          </td>
                          <td>
                            <?php echo $value->privilege ?>
                          </td>
                          <td><?php echo form_open('pengguna/destroy/'.$value->id)  ?>
                              <a class="btn btn-info" href="<?php echo base_url('pengguna/edit/'.$value->id) ?>">
                                Ubah
                              </a>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                              <?php echo form_close() ?></td>
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