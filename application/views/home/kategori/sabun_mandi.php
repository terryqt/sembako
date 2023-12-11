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
                <?php foreach ($sabun_mandi as $val) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                        <div class="bg-white rounded shadow-sm">
                            <a href="<?php echo site_url('home/kategori/sabun_mandi/' . $val->id_Produk); ?>">
                                <img src="<?php echo base_url('assets/uploads/' . $val->foto); ?>" alt="" class="img-fluid card-img-top" style="height: 200px;">
                            </a>
                            <div class="p-4">
                                <h5><a href="<?php echo site_url('home/det_produk/' . $val->id_Produk); ?>" class="text-dark"><?php echo $val->Namaproduk; ?></a></h5>
                                <p class="small text-muted mb-0"><?php echo $val->Deskripsiproduk; ?></p>
                                <p class="small text-muted mb-0">Rp. <?php echo $val->harga; ?></p>
                                <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                                    <a href="<?php echo site_url('home/keranjang/'); ?>" class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Detail</span></a>
                                    <a href="<?php echo site_url('home/keranjang/'); ?>" class="badge badge-danger px-3 rounded-pill font-weight-normal">add to cart</a>
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