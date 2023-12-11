<!-- slider section -->

<section class="slider_section">
    <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <h1>
                                        Selamat Datang <br>
                                        SembakoKu
                                    </h1>
                                    <p>
                                        Selamat Datang.
                                    </p>
                                    <p>
                                        Selamat bebrbelanja, kami menyediakan banyak kebutuhan sehari-hari. selalu ada selalu bisa!!!
                                    </p>
                                    <a href="https://api.whatsapp.com/send/?phone=081931438330&text&type=phone_number&app_absent=0">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="img-box">
                                    <img src="<?php echo base_url('assets/home/images/slider-img.png'); ?>" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <h1>
                                        Welcome To <br>
                                        SembakoKu
                                    </h1>
                                    <p>
                                        Bergabung menjadi member memberikan banyak kemudahan dalam berbelanja serta nikmati berbagai keuntungan yang akan anda dapatkan
                                    </p>
                                    <a href="<?php echo site_url('home/register'); ?>">
                                        Gabung Member
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="img-box">
                                    <img src="<?php echo base_url('assets/home/images/slider-img.png'); ?>" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_btn-box">
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <img src="images/line.png" alt="" />
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>
</div>
<!-- shop section -->
<section class="category_section layout_padding">
    <div class="heading_container heading_center">
        <h2>
            PRODUK
        </h2>
    </div>
    <BR></BR>
    <div class="container-fluid">
        <div class="px-lg-5">
            <div class="row">
                <!-- Bagian Produk -->
                <?php foreach ($produk as $val) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="bg-white rounded shadow-sm">
                            <a href="<?php echo site_url('home/tampilkan_detail/' . $val->id_Produk); ?>"><img src="<?php echo base_url('assets/uploads/' . $val->foto); ?>" alt="" class="img-fluid card-img-top" style="height: 200px;"></img></a>

                            <div class="p-4">
                                <h5><a href="<?php echo site_url('home/tampilkan_detail/' . $val->id_Produk); ?>" class="text-dark"><?php echo $val->Namaproduk; ?></a></h5>
                                <p class="small text-muted mb-0"><?php echo $val->Deskripsiproduk; ?></p>
                                <p class="small text-muted mb-0">Rp. <?php echo $val->harga; ?></p>
                                <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                    <a href="<?php echo site_url('home/tampilkan_detail/' . $val->id_Produk); ?>" class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Detail</span></a>
                                    <a href="<?php echo site_url('home/tambah_keranjang/' . $val->id_Produk); ?>" class="badge badge-danger px-3 rounded-pill font-weight-normal">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div>
        </div>
    </div>
</section>


<!-- Bagian Kategori -->
<section class="category_section layout_padding">
    <div class="heading_container heading_center">
        <h2>
            Kategori
        </h2>
    </div>
    <BR></BR>
    <div class="container-fluid">
        <div class="px-lg-5">
            <div class="row">
                <?php foreach ($kategori as $val) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="bg-white rounded shadow-sm">
                            <!-- Gambar kategori statis -->
                            <div class="p-4">
                                <h5> <a href="<?php echo base_url('home/tampil_kategori/' . $val->Namakategori); ?>" class="text-dark"><?php echo $val->Namakategori; ?></a></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Lihat Lebih Banyak</a></div>
        </div>
    </div>
</section>


<!-- end saving section -->

<br>
<br>

<!-- end saving section -->



<!-- gift section -->

<section class="gift_section layout_padding-bottom">
    <div class="box ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="<?php echo base_url('assets/home/images/gifts.png'); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                Gabung Jadi Member <br>
                                Lebih banyak Untungnya
                            </h2>
                        </div>
                        <p>
                            Omnis ex nam laudantium odit illum harum, excepturi accusamus at corrupti, velit blanditiis unde
                            perspiciatis, vitae minus culpa? Beatae at aut consequuntur porro adipisci aliquam eaque iste ducimus
                            expedita accusantium?
                        </p>
                        <div class="btn-box">
                            <a href="<?php echo site_url('home/register'); ?>" class="btn1">
                                Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- end gift section -->




<!-- end client section -->