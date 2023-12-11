<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SembakoKu</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/temp/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet'); ?>">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/temp/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet'); ?>">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/temp/vendors/nprogress/nprogress.css" rel="stylesheet'); ?>">
    <!-- Animate.css -->
    <link href="<?php echo base_url('assets/temp/vendors/animate.css/animate.min.css" rel="stylesheet'); ?>">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/temp/build/css/custom.min.css'); ?>" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php echo site_url('home/save_reg'); ?>" method="post">
                        <h1>Daftar</h1>
                        <?php
                        if ($this->session->flashdata('error')) {
                            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                        }
                        ?>
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" />

                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <div>
                            <input type="text" name="namaKonsumen" class="form-control" placeholder="Nama" />

                        </div>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="email" />

                        </div>
                        <div>
                            <input type="text" name="alamat" class="form-control" placeholder="alamat" />

                        </div>
                        <div>
                            <input type="number" name="telpon" class="form-control" placeholder="telepon" />

                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Daftar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <a href="<?php echo site_url('home/login'); ?>" class="to_register"> Sudah punya Akun? </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>