<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Admin Dashboard Perpustakaan">
    <meta name="author" content="PerpusUA">
    <title>SIMPUS UA : Dashboard</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/img/logo.png'); ?>" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Name Display -->
                <li class="nav-item d-flex align-items-center mr-3">
                    <span class="brand-text font-weight-light"><?php echo $this->session->userdata('nama'); ?></span>
                </li>
                <!-- Logout Button -->
                <li class="nav-item">
                    <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <!-- Ganti src ke lokasi logo Anda -->
                <img src="<?= base_url('uploads/img/logo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIM PERPUS UA</span>
            </a>
            <!-- User Panel -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <!-- Tampilkan gambar profil pengguna -->
                    <img src="<?= base_url('uploads/img/profile.jpeg'); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <!-- Tampilkan nama pengguna dengan warna teks putih -->
                    <span class="brand-text font-weight-light" style="color: white;"><?php echo $this->session->userdata('nama'); ?></span>
                    <br>
                    <!-- Tampilkan peran pengguna dengan warna teks putih -->
                    <span class="brand-text font-weight-light" style="color: white;"><?php echo $this->session->userdata('role'); ?></span>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/data_buku'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Buku</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/data_anggota'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Anggota</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-exchange-alt"></i>
                                <p>
                                    Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/data_peminjaman'); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
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
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Cards -->
                    <div class="row">
                        <!-- Data Buku Card -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Stok Buku</h3>
                                    <p>Total: <?php echo $stok; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <a href="<?php echo base_url('admin/data_buku'); ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Peminjaman Card -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>Dipinjam</h3>
                                    <p>Total: <?php echo $total_peminjaman; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-hand-holding"></i>
                                </div>
                                <a href="<?php echo base_url('admin/data_peminjaman'); ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Pengembalian Card -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Dikembalikan</h3>
                                    <p>Total: <?php echo $total_pengembalian; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-undo-alt"></i>
                                </div>
                                <a href="<?php echo base_url('admin/data_peminjaman'); ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- Data User Card -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>Data Anggota</h3>
                                    <p>Total: <?php echo $users; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?php echo base_url('admin/data_anggota'); ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>&copy; 2023 <a href="#">PerpusUA</a>.</strong> All rights reserved.
        </footer>
        <!-- /.footer -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>

</html>