<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kelola Barang</h3>
            </div>

        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" method="post" action="<?php echo site_url('produk/edit'); ?>" class="form-horizontal form-label-left" enctype="multipart/form-data">

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6">
                                    <input type="hidden" id="id_Produk" name="id_Produk" value="<?php echo $produk->id_Produk; ?>" required="required" class="form-control" placeholder="ID Produk">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Produk <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="first-name" name="Namaproduk" value="<?php echo $produk->Namaproduk; ?>" required="required" class="form-control" placeholder="Nama Produk">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kategori">Kategori <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="id_Kategori" required>
                                        <?php foreach ($kategori as $kat) : ?>
                                            <option value="<?php echo $kat->id_Kategori; ?>" <?php echo ($kat->id_Kategori == $produk->id_Kategori) ? 'selected' : ''; ?>><?php echo $kat->Namakategori; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Foto Produk <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="first-name" name="foto" class="form-control">
                                    <?php if ($produk->foto) : ?>
                                        <img src="<?php echo base_url('assets/uploads/' . $produk->foto); ?>" alt="Foto Produk" width="100" height="100">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Deskripsi Produk <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="first-name" name="Deskripsiproduk" value="<?php echo $produk->Deskripsiproduk; ?>" required="required" class="form-control" placeholder="Deskripsi Produk">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Harga <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="first-name" name="harga" value="<?php echo $produk->harga; ?>" required="required" class="form-control" placeholder="Harga">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>