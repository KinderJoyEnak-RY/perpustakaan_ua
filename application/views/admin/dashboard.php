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
    <!-- SweetAlert2 CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <a href="javascript:void(0)" onclick="confirmLogout()" class="nav-link">
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
                                        <i class="far fa-users nav-icon"></i>
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
                            <a href="javascript:void(0)" onclick="confirmLogout()" class="nav-link">
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a </li>
                                <li class="breadcrumb-item active">Dashboard Staff</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Info Boxes -->
                    <div class="row">
                        <!-- Stok Buku Info Box -->
                        <div class="col-lg-3 col-6">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fas fa-book"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Stok Buku</span>
                                    <span class="info-box-number"><?php echo $stok; ?></span>
                                </div>
                                <a href="<?php echo base_url('admin/data_buku'); ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Peminjaman Info Box -->
                        <div class="col-lg-3 col-6">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-hand-holding"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Dipinjam</span>
                                    <span class="info-box-number"><?php echo $total_peminjaman; ?></span>
                                </div>
                                <a href="<?php echo base_url('admin/data_peminjaman'); ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Pengembalian Info Box -->
                        <div class="col-lg-3 col-6">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-undo-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Dikembalikan</span>
                                    <span class="info-box-number"><?php echo $total_pengembalian; ?></span>
                                </div>
                                <a href="<?php echo base_url('admin/data_peminjaman'); ?>" class="small-box-footer">Lihat detail <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Data Anggota Info Box -->
                        <div class="col-lg-3 col-6">
                            <div class="info-box bg-primary">
                                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Data Anggota</span>
                                    <span class="info-box-number"><?php echo $users; ?></span>
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

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin logout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?php echo base_url('auth/logout'); ?>'; // URL untuk proses logout
                }
            })
        }
    </script>

</body>

</html>