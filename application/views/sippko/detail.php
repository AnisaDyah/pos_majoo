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
                                <li>
                                    <a href="<?php echo base_url() ?>home/etical">Etical</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>home/generic">Generic</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>home/lainnya">Lainnya</a>
                                </li>
                           </ul>

                        </div>
                    </div>

                    
                    
                </div>

                <div class="col-md-9">
                <?php echo form_open('Cart/insert_cart');?>
                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="<?php echo base_url('assets/image/'.$data->gambar)?>" alt="" class="img-responsive" >
                            </div>

                            
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $data->nama_produk ?></h1>
                                <p class="price"><?php echo "Rp ".$data->harga ?></p>

                                <p class="text-center buttons">
                                        <?php
                                            if($this->session->privilege == 'User')
                                                { ?>
                                                    <a href="<?php echo base_url() ?>cart/insert_cart/<?php echo $this->uri->segment(3) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <?php }
                                            else if($this->session->privilege == 'Administrator')
                                            { ?>
                                                <a href="<?php echo base_url() ?>cart/insert_cart/<?php echo $this->uri->segment(3) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <?php }
                                            else
                                            { ?>
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#login-modal"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <?php }
                                        ?>
                                </p>
                                
                            
                            </div>

                            <div class="box" id="details">
                        <p>
                            <h4>Deskripsi Produk</h4>
                            <p><?php echo $data->deskripsi ?></p>
                        </p>
    
                    </div>
                    <?php echo form_close()?>

                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Stok</h4>
                            <p><?php echo $data->stok ?></p>
                            
                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
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