<?php $this->load->view('layouts/header') ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li><?php echo $nama_kategori ?></li>
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
                            <?php foreach ($kategori as $data => $value) { ?>
                                <li><a href="<?php echo base_url('Home/kategori/'.$value->id_kategori) ?>"><?php echo $value->nama_kategori ?></a></li>
                            <?php } ?>
                            </ul>

                        </div>
                    </div>

                    

                    <!-- *** MENUS AND FILTERS END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1><?php echo $nama_kategori ?></h1>
                        <!-- <p>Obat yang hanya dapat diperoleh dengan resep dokter (ethical)</p> -->
                    </div>

                    
                    <div class="row products">
        
                        <?php foreach ($produk_by as $data => $value) { ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
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
                                    <h3><a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>"><?php echo $value->nama_produk ?></a></h3>
                                    <p class="price"><?php echo "Rp " . number_format($value->harga,2,',','.') ?></p>
                                    <p class="buttons">
                                        <a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>" class="btn btn-default">View detail</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        
                        </div>
                        <?php } ?>
                    </div>

                    


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php $this->load->view('layouts/footer'); ?>