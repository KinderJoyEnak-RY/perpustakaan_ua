<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Anggota Dashboard Perpustakaan">
    <meta name="author" content="PerpusUA">
    <title>SIMPUS UA : Dashboard Anggota</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/img/logo.png'); ?>" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- AdminLTE for dark mode -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/dark-mode.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<style>
	.capitalize-input {
        text-transform: capitalize;
    }
</style>

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
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <?php echo $this->session->userdata('nama'); ?> <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <?php echo $this->session->userdata('nama'); ?>
                                    </h3>
                                    <p class="text-sm"><?php echo $this->session->userdata('role'); ?></p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Anggota Dashboard</span>
            </a>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo base_url('anggota/dashboard'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('anggota/katalog_buku'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Katalog Buku</p>
                        </a>
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
                                <a href="<?php echo base_url('anggota/transaksi'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Peminjaman</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Katalog Buku</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>No</th>
                                                <th>Sampul</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Kategori</th>
                                                <th>Rak</th>
												<th>Stok</th>
                                                <th>QR Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Looping Data Buku dari Database -->
                                            <?php foreach ($buku as $index => $b) : ?>
                                                <tr>
                                                    <td><?php echo $index + 1; ?></td>
                                                    <td>
                                                        <img src="<?php echo base_url('uploads/sampul/' . $b['sampul']); ?>" alt="Sampul" class="img-thumbnail" style="width: 50px; height: 50px;" data-toggle="modal" data-target="#modalSampul<?php echo $index; ?>">
                                                    </td>
                                                    <td class="capitalize-input"><?php echo $b['judul']; ?></td>
                                                    <td class="capitalize-input"><?php echo $b['pengarang']; ?></td>
                                                    <td class="capitalize-input"><?php echo $b['penerbit']; ?></td>
                                                    <td class="capitalize-input"><?php echo $b['nama_kategori']; ?></td>
                                                    <td><?php echo $b['nama_rak']; ?></td>
													<td><?php echo $b['stok_buku']; ?></td>
                                                    <td>
														<center>
                                                        <img src="<?php echo base_url('uploads/qrcodes/qrbuku/' . $b['qr_code']); ?>" alt="QR Code" class="img-thumbnail" style="width: 50px; height: 50px;" data-toggle="modal" data-target="#modalQRCode<?php echo $index; ?>">
														</center>
                                                    </td>
                                                </tr>
                                                <!-- Modal Sampul -->
                                                <div class="modal fade" id="modalSampul<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSampulLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalSampulLabel">Sampul Buku</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?php echo base_url('uploads/sampul/' . $b['sampul']); ?>" alt="Sampul" class="img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal QR Code -->
                                                <div class="modal fade" id="modalQRCode<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="modalQRCodeLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalQRCodeLabel">QR Code</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
																<center>
                                                                <img src="<?php echo base_url('uploads/qrcodes/qrbuku/' . $b['qr_code']); ?>" alt="QR Code" class="img-fluid">
																</center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
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
    <!-- DataTables and its extensions -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 10
            });

            // Initialize modal popups
            $('[data-toggle="modal"]').on('click', function() {
                var targetModal = $(this).data('target');
                $(targetModal).modal('show');
            });
        });
    </script>
</body>

</html>
