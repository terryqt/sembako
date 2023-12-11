<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <div class="col-md-12 col-sm-12">
                    <h1> Manajemen Kategori</h1>
                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Data Kategori</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <table class="table table-bordered">
                                <thead>
                                    <a href="<?php echo site_url('kategori/add'); ?>" class="btn btn-primary">Tambah</a>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategori as $val) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $val->Namakategori; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo site_url('kategori/get_by_id/' . $val->id_Kategori); ?>" class="btn btn-warning">Edit</a>
                                                    <a href="<?php echo site_url('kategori/delete/' . $val->id_Kategori); ?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
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