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
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Nama Member</th>
                                        <th>email</th>
                                        <th>Alamat</th>
                                        <th>telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($member as $val) { ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $val->username; ?></td>
                                            <td><?php echo $val->Namakonsumen; ?></td>
                                            <td><?php echo $val->email; ?></td>
                                            <td><?php echo $val->alamat; ?></td>
                                            <td><?php echo $val->telepon; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo site_url('member/delete/' . $val->id_konsumen); ?>" onclick="return confirm('Yakin Akan Hapus Data Ini?')" class="btn btn-danger">Hapus</a>
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