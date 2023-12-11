<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <div class="col-md-30 col-sm-30">
                    <h1> Manajemen Produk</h1>
                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Data Kategori</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-bordered">
                                <thead>
                                    <a href="<?php echo site_url('produk/add'); ?>" class="btn btn-primary">Tambah</a>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Produk</th>
                                        <th>Foto</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th style="width: 150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($produk as $val) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $val->Namaproduk; ?></td>
                                            <td><img src="<?php echo base_url('assets/uploads/' . $val->foto); ?>" height="100" height="100"></td>
                                            <td><?php echo $val->kategori; ?></td>
                                            <td><?php echo $val->Deskripsiproduk; ?></td>
                                            <td><?php echo $val->harga; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo site_url('produk/get_by_id/' . $val->id_Produk); ?>" class="btn btn-warning">Edit</a>
                                                    <a href="<?php echo site_url('produk/delete/' . $val->id_Produk); ?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>