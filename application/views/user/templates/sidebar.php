<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();  ?>user" class="brand-link">
        <img src="https://morwel.id/wp-content/uploads/2021/04/Lazismu.jpg" alt="userLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LAZISMU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url();  ?>assets/img/profile/default.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['nama']; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>user/" class="nav-link 
                      <?php if ($this->uri->segment('1') == 'user') {
                            echo 'active';
                        } ?>">

                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://lazismudiy.or.id/tentang-kami/" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://lazismudiy.or.id/" target="_blank" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Berita
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>distribusiuser/index" class="nav-link
                      <?php if ($this->uri->segment('1') == 'distribusiuser' && $this->uri->segment('2') == 'index') {
                            echo 'active';
                        } ?>">

                        <i class="nav-icon fas fa-people-arrows"></i>
                        <p>
                            Kegiatan Distribusi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link 
                      <?php if ($this->uri->segment('1') == 'nikuser') {
                            echo 'active';
                        } ?>">

                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Pencarian Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>nikuser" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Data NIK</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link 
                      <?php if ($this->uri->segment('1') == 'manfaatuser') {
                            echo 'active';
                        } ?>">

                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Penerima Manfaat
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>manfaatuser" class="nav-link">
                                <i class="nav-icon fas fa-pencil-alt"></i>
                                <p>Input Data</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>manfaatuser/rapor" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Rapor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link
                      <?php if ($this->uri->segment('2') == 'asnaf' || $this->uri->segment('2') == 'program') {
                            echo 'active';
                        } ?>">

                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Rekap
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>distribusiuser/asnaf" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>Distribusi Asnaf</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>distribusiuser/program" class="nav-link">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>Distribusi Program</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>petauser" class="nav-link
                     <?php if ($this->uri->segment('1') == 'petauser') {
                            echo 'active';
                        } ?>">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                            Peta Distribusi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>bukuuser" class="nav-link
                     <?php if ($this->uri->segment('1') == 'bukuuser') {
                            echo 'active';
                        } ?>">
                        <i class="nav-icon far fa-bookmark"></i>
                        <p>
                            Panduan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->