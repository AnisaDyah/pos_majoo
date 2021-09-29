<?php $this->load->view('layouts/header') ?>

    <div id="all">

        <div id="content">
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>
                                <img src="<?php echo base_url() ?>assets/img/majoo_logo_small.png" width="100" height="100"><br/>
                                <b>MAJOO <br/></b>
                                <font size ="5" >Majoo Teknologi Indonesia</font>
                            </h2>
                        </div>
                    </div>
                </div>

            <section id="produk">
                <div class="container">
                
                    <div class="product-slider">
                    <?php foreach ($list as $data => $value) { ?>
                        <div class="item" >
                            <div class="product" >
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>">
                                                <img src="<?php echo base_url('assets/image/'.$value->gambar)?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>">
                                                <img src="<?php echo base_url('assets/image/'.$value->gambar)?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>" class="invisible">
                                    <img src="<?php echo base_url('assets/image/'.$value->gambar)?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                     <h3><a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>" ><?php echo $value->nama_produk ?></a></h3>
                                     <!-- <h3><?php echo $value->nama_produk ?></a></h3> -->
                                    <p class="price"><b><?php echo "Rp." . $value->harga ?></b></p>
                                    <p class="price"><?php echo $value->deskripsi ?></p>
                                    <a class="btn btn-default" style="margin-bottom:20px; margin-left:40px" href="#">
                                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Beli</span>
                                    </a>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php }?>
                    </div>
                    <!-- /.product-slider -->
               
                
                </div>
            </section>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->

        <?php $this->load->view('layouts/footer'); ?>
        