<?php $this->load->view('layouts/header') ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li><?php echo $data->nama_produk ?>
                        </li>                        
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach ($kategori as $key => $value) { ?>
                                <li><a href="<?php echo base_url('Home/kategori/'.$value->id_kategori) ?>"><?php echo $value->nama_kategori ?></a></li>
                            <?php } ?>
                           </ul>

                        </div>
                    </div>

                    
                    
                </div>

                <div class="col-md-9">
                <?php echo form_open('Cart/insert_cart');?>
                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div class="box">
                                <img src="<?php echo base_url('assets/image/'.$data->gambar)?>" alt="" class="img-responsive" >
                            </div>

                            
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $data->nama_produk ?></h1>
                                <p class="price"><?php echo "Rp " . number_format($data->harga,2,',','.') ?></p>

                                <p class="text-center buttons">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#login-modal"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                       
                                </p>
                                
                            
                            </div>

                            <div class="box" id="details">
                        <p>
                            <h4>Deskripsi Produk</h4>
                            <p><?php echo $data->deskripsi ?></p>
                            <hr>
                            <h4>Stok</h4>
                            <p><?php echo $data->stok ?></p>
                        </p>
    
                    </div>
                    <?php echo form_close()?>

                        </div>

                    </div>


                    
                    </div>
                    </form>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php $this->load->view('layouts/footer'); ?>