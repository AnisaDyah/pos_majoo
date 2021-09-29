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
                    <h2>Kategori</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th width="1%">No.</th>
                          <th width="50%" class="text-center">Nama</th>
                          <th width="20%" class="text-center">
                          <!-- <a class="btn btn-primary" href="<?php echo base_url('Kategori/create') ?>"> -->
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
                              <?php echo $value->nama_kategori ?>
                          </td>
                          <td class="text-center"><?php echo form_open('Kategori/destroy/'.$value->id_kategori)  ?>
                              <a class="btn btn-info" href="<?php echo base_url('Kategori/edit/'.$value->id_kategori) ?>">
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