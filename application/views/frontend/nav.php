<nav class="navbar" id="nav">
    <div class="container">
        <div class="header-navibox-1">
            <!-- Mobile Trigger Start-->
            <button class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button"><i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i>
            </button>
            <!-- Mobile Trigger End-->
            <a class="navbar-brand scroll" href="">
                <img class="normal-logo img-responsive" src="<?=base_url()?>assets/frontend/media/general/headersikopmil.jpg" alt="logo" />
                <img class="scroll-logo hidden-xs img-responsive" src="<?=base_url()?>assets/frontend/media/general/headersikopmil.jpg" alt="logo" />
            </a>
        </div>
        <div class="header-navibox-2">
            <ul class="yamm main-menu nav navbar-nav">
                <li><a href="<?=base_url()?>index">HOME</a>
                <li><a href="<?=base_url()?>index/list_kendaraan">LIST KENDARAAN</a></li>
               
                <!-- <li><a href="#">BLOG</a></li> -->

                <?php 
                $notif = $this->transaksi_model->getRiwayatSewaByIduserNotif($this->session->userdata('id_user'));
                if(!empty($this->session->userdata('id_user'))): ?>
                     <li><a href="<?=base_url()?>index/riwayat_sewa">RIWAYAT PINJAM
                        <span class="header-cart-count bg-primary"><?=$notif?></span>
                     </a></li>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Akun<b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=base_url()?>index/account" tabindex="-1">Pengaturan Akun</a>
                            </li>
                            <li><a href="<?=base_url()?>index/doLogout" tabindex="-1">Logout</a>
                            </li>
                        </ul>
                    </li>

                <?php else: ?>

                    <li><a href="<?=base_url()?>index/login">LOGIN</a>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>