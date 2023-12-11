<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
                <span>Sembako<strong>Ku</strong></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url('home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('home/keranjang'); ?>">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://api.whatsapp.com/send/?phone=081931438330&text&type=phone_number&app_absent=0">Kontak</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Adminpanel/login'); ?>">Login Admin</a>
                    </li> -->
                    <a href="">
                </ul>
                <div class="user_option">
                    <?php if ($this->session->userdata('status') == 'login') : ?>
                        <a href="<?php echo site_url('home/logout'); ?>">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo site_url('home/login'); ?>">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Login</span>
                        </a>
                    <?php endif; ?>
                    <!-- <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    </a>
                    <form class="form-inline ">
                        <button class="btn nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form> -->
                </div>
            </div>
        </nav>
    </header>
    <!-- end header section -->
</div>