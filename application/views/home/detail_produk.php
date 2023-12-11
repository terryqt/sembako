<div class="container mt-4">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?php echo base_url('assets/uploads/' . $detail_produk->foto); ?>" alt="" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $detail_produk->Namaproduk; ?></h5>
                    <p class="card-text"><?php echo $detail_produk->Deskripsiproduk; ?></p>
                    <p class="card-text">Rp. <?php echo $detail_produk->harga; ?></p>
                    <!-- Tombol Tambah ke Cart -->
                    <form action="<?php echo site_url('home/tambah_keranjang/' . $detail_produk->id_Produk); ?>" method="post">
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah ke Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>