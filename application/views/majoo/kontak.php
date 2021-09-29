<?php $this->load->view('layouts/header') ?>

<div id="all">

<div id="content">
    <div class="container">

        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url() ?>">Home</a>
                </li>
                <li>Contact</li>
            </ul>

        </div>

        <div class="col-md-3">
            <!-- *** PAGES MENU ***
_________________________________________________________ -->
            <div class="panel panel-default sidebar-menu">

                <div class="panel-heading">
                    <h3 class="panel-title">Pages</h3>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="<?php echo base_url()?>home/kontak">Kontak</a>
                        </li>
                        <!-- <li>
                            <a href="<?php echo base_url()?>home/faq">FAQ</a>
                        </li> -->

                    </ul>

                </div>
            </div>

            <!-- *** PAGES MENU END *** -->

        </div>

        <div class="col-md-9">


            <div class="box" id="contact">
                <h1>Kontak</h1>

                <!-- <p class="lead">Apakah Anda ingin tahu tentang sesuatu? Apakah Anda memiliki masalah dengan obat kami?</p> -->
                <p>Jangan ragu untuk menghubungi kami, Customer Service kami bekerja untuk Anda 24/7.</p>

                <hr>

                <div class="row">
                    <div class="col-sm-4">
                        <h3><i class="fa fa-map-marker"></i> Alamat</h3>
                        <p>majoo Plaza
                            <br> Jl. Prapanca Raya No.25
                            <br> Jakarta - Indonesia, 12160
                            <br>
                            <strong>Indonesia</strong>
                        </p>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <h3><i class="fa fa-phone"></i> Call center</h3>
                        <p class="text-muted">Nomor ini bebas pulsa jika menelepon dari Indonesia, jika tidak kami menyarankan Anda untuk menggunakan bentuk komunikasi elektronik.</p>
                        <p><strong>1500 460 (24 jam)</strong>
                        </p>
                    </div>
                    <!-- /.col-sm-4 -->
                    <div class="col-sm-4">
                        <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                        <p class="text-muted">Silakan menulis email kepada kami.</p>
                        <ul>
                            <li><strong><a href="https://majoo.id/">majoo.id</a></strong>
                            </li>
                        </ul>
                    </div>
                    <!-- /.col-sm-4 -->
                </div>
                <!-- /.row -->

            </div>


        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->

<?php $this->load->view('layouts/footer'); ?>