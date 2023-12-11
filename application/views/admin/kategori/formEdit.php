<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kelola Kategori</h3>
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
                        <form id="demo-form2" method="post" action="<?php echo site_url('kategori/edit'); ?>" class="form-horizontal form-label-left">
                            <div class="item form-group">
                                <input type="hidden" name="id_Kategori" value="<?php echo $kategori->id_Kategori; ?>">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kategori <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="Namakategori" value="<?php echo $kategori->Namakategori; ?>" required="required" class="form-control " placeholder="Nama Kategori">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>