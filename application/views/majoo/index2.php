

<style>
    .text-limit {
        display: -webkit-box;
  overflow: hidden;
  -webkit-line-clamp: 5;
  -webkit-box-orient: vertical;
    }
}
</style>
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
                <div class="owl-carousel owl-theme">
                <?php foreach ($list as $data => $value) { ?>
                    <div class="item" style="margin-left:10px; margin-right:10px"> 
                    <div class="box" style="height:500; height-max:1000px">
                        <a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>">
                            <img src="<?php echo base_url('assets/image/'.$value->gambar)?>" alt="" class="img-responsive">
                        </a>
                        <div class="text">
                                <h3 class="text-center"><a href="<?php echo base_url('home/detail/'.$value->id_produk) ?>" ><?php echo $value->nama_produk ?></a></h3>
                                <!-- <h3><?php echo $value->nama_produk ?></a></h3> -->
                            <p class="price text-center"><b><?php echo "Rp " . number_format($value->harga,2,',','.') ?></b></p>
                            <p class="text-justify text-limit"><?php echo $value->deskripsi ?></p>
                            <a class="btn btn-default" style="margin-bottom:20px; margin-left:75px" href="#">
                            <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Beli</span>
                            </a>
                        </div>
                    </div>
                    </div>
                <?php } ?>
                </div>
                </div>
            </section>
  </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->

        <?php $this->load->view('layouts/footer'); ?>

