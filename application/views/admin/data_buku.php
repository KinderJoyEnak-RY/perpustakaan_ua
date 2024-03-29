<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Admin Dashboard Perpustakaan">
    <meta name="author" content="PerpusUA">
    <title>SIMPUS UA : Master Data Buku</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/img/logo.png'); ?>" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    .small-table {
        width: 100%;
        margin: 0 auto;
    }

    .small-table th,
    .small-table td {
        font-size: 0.8rem;
    }

    .small-modal h5 {
        font-size: 1rem;
    }

    .small-modal label {
        font-size: 0.8rem;
    }

    .small-modal .form-control {
        font-size: 0.8rem;
    }

    .capitalize-input {
        text-transform: capitalize;
    }

    #modalImage {
        max-width: 100%;
        height: auto;
        margin: 0 auto;
        display: block;
    }
</style>

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
                            <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/data_buku'); ?>" class="nav-link active">
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Master Data</h1>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Master Data</a </li>
                                <li class="breadcrumb-item active">Data Buku</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Button group">
                        <button class="btn btn-warning mr-2" data-toggle="modal" data-target="#modalTambahRak">
                            <i class="fas fa-archive"></i>Master Rak
                        </button>
                        <button class="btn btn-success mr-2" data-toggle="modal" data-target="#modalTambahKategori">
                            <i class="fas fa-tags"></i>Master Kategori
                        </button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBuku">
                            <i class="fas fa-plus"></i> Tambah Buku
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- Cards -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">sampul</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">ISBN</th>
                                    <th class="text-center">Pengarang</th>
                                    <th class="text-center">Penerbit</th>
                                    <th class="text-center">Rak</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Stok Buku</th>
                                    <th class="text-center">Barcode</th>
                                    <th class="text-center">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($buku as $bk) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <img src="<?php echo base_url('uploads/sampul/' . $bk['sampul']); ?>" width="40" alt="Sampul" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/sampul/' . $bk['sampul']); ?>">
                                        </td>
                                        <td class="capitalize-input"><?php echo $bk['judul']; ?></td>
                                        <td><?php echo $bk['tahun_buku']; ?></td>
                                        <td><?php echo $bk['nomor_isbn']; ?></td>
                                        <td class="capitalize-input"><?php echo $bk['pengarang']; ?></td>
                                        <td class="capitalize-input"><?php echo $bk['penerbit']; ?></td>
                                        <td><?php echo $bk['nama_rak']; ?></td>
                                        <td><?php echo $bk['nama_kategori']; ?></td>
                                        <td><?php echo $bk['stok_buku']; ?></td>
                                        <td>
                                            <img src="<?php echo base_url('uploads/qrcodes/qrbuku/' . $bk['qr_code']); ?>" width="40" alt="QR Code" class="img-thumbnail qr-code-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/qrcodes/qrbuku/' . $bk['qr_code']); ?>">
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" onclick="editBuku(<?php echo $bk['id']; ?>)" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" onclick="deleteBuku(<?php echo $bk['id']; ?>)" title="Delete">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Tambah Rak -->
                    <div class="modal fade small-modal" id="modalTambahRak" tabindex="-1" role="dialog" aria-labelledby="modalLabelTambahRak" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="mb-3">Master Data Rak</h5>
                                    <table class="table table-hover table-bordered small-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Rak</th>
                                                <th class="text-center">Deskripsi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listRak">
                                            <!-- Data rak akan diisi di sini melalui JavaScript -->
                                        </tbody>
                                    </table>
                                    <!-- Form Tambah Rak -->
                                    <h5 class="mt-4 mb-3">Tambah Rak Baru</h5>
                                    <form id="formTambahRak" action="javascript:void(0)" method="post">
                                        <div class="form-group">
                                            <label>Rak</label>
                                            <input type="text" class="form-control capitalize-input" name="nama_rak" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control capitalize-input" name="deskripsi"></textarea>
                                        </div>
                                        <button type="button" onclick="tambahRak()" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Kategori -->
                    <div class="modal fade small-modal" id="modalTambahKategori" tabindex="-1" role="dialog" aria-labelledby="modalLabelTambahKategori" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="mb-3">Master Data Kategori</h5>
                                    <table class="table table-hover table-bordered small-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Deskripsi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listKategori">
                                            <!-- Data kategori akan diisi di sini melalui JavaScript -->
                                        </tbody>
                                    </table>
                                    <!-- Form Tambah Kategori -->
                                    <h5 class="mt-4 mb-3">Tambah Kategori Baru</h5>
                                    <form id="formTambahKategori" action="javascript:void(0)" method="post">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" class="form-control capitalize-input" name="nama_kategori" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control capitalize-input" name="deskripsi"></textarea>
                                        </div>
                                        <button type="button" onclick="tambahKategori()" class="btn btn-success">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Buku -->
                    <div class="modal fade" id="modalTambahBuku" tabindex="-1" role="dialog" aria-labelledby="modalLabelTambahBuku" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="mb-3" style="text-align: center;">Tambah Buku Baru</h5>
                                    <form id="formTambahBuku" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Sampul</label>
                                            <input type="file" class="form-control" name="sampul" id="sampul">
                                        </div>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control capitalize-input" name="judul" id="judul">
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" class="form-control" name="tahun_buku" id="tahun_buku">
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input type="text" class="form-control" name="nomor_isbn" id="nomor_isbn">
                                        </div>
                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input type="text" class="form-control capitalize-input" name="pengarang" id="pengarang">
                                        </div>
                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input type="text" class="form-control capitalize-input" name="penerbit" id="penerbit">
                                        </div>
                                        <div class="form-group">
                                            <label>Rak</label>
                                            <select class="form-control" name="rak" id="rak">
                                                <!-- Data rak akan diisi di sini melalui JavaScript -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" id="kategori">
                                                <!-- Data kategori akan diisi di sini melalui JavaScript -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok Buku</label>
                                            <input type="number" class="form-control" name="stok_buku" id="stok_buku">
                                        </div>
                                        <button type="button" onclick="tambahBuku()" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit Buku -->
                    <div class="modal fade" id="modalEditBuku" tabindex="-1" role="dialog" aria-labelledby="modalLabelEditBuku" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="mb-3">Edit Buku</h5>
                                    <form id="formEditBuku" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_buku" id="id_buku">
                                        <div class="form-group">
                                            <label>Sampul</label>
                                            <input type="file" class="form-control" name="sampul_edit" id="sampul_edit">
                                        </div>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control capitalize-input" name="judul_edit" id="judul_edit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" class="form-control" name="tahun_buku_edit" id="tahun_buku_edit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input type="text" class="form-control" name="nomor_isbn_edit" id="nomor_isbn_edit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input type="text" class="form-control capitalize-input" name="pengarang_edit" id="pengarang_edit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input type="text" class="form-control capitalize-input" name="penerbit_edit" id="penerbit_edit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Rak</label>
                                            <select class="form-control" name="rak_edit" id="rak_edit" required>
                                                <!-- Data rak akan diisi di sini melalui JavaScript -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori_edit" id="kategori_edit" required>
                                                <!-- Data kategori akan diisi di sini melalui JavaScript -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok Buku</label>
                                            <input type="number" class="form-control" name="stok_buku_edit" id="stok_buku_edit" required>
                                        </div>
                                        <button type="button" onclick="updateBuku()" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Image Viewer -->
                    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img id="modalImage" src="" alt="Sampul Buku" class="img-fluid">
                                </div>
                                <div class="modal-footer">
                                    <a href="#" id="downloadImage" download class="btn btn-success">Download</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
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
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "pageLength": 10
            });

            $('.qr-code-thumbnail').click(function() {
                var imageUrl = $(this).data('image');
                var imageExtension = imageUrl.split('.').pop().split(/\#|\?/)[0];
                var imageName = "download." + imageExtension;

                if (imageExtension !== 'jpg' && imageExtension !== 'png') {
                    imageName = "download.png";
                }

                $('#modalImage').attr('src', imageUrl);
                $('#downloadImage').attr('href', imageUrl).attr('download', imageName);
                $('#imageModal').modal('show');
            });
        });

        $('.qr-code-thumbnail').on('click', function() {
            var imageUrl = $(this).data('image');
            $('#imageModal').find('#modalImage').attr('src', imageUrl);
            $('#imageModal').modal('show');
        });
    </script>
    <script>
        function tambahRak() {
            $.ajax({
                url: "<?php echo site_url('admin/tambah_rak'); ?>",
                type: "POST",
                data: $('#formTambahRak').serialize(),
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Rak berhasil ditambahkan!',
                        showConfirmButton: false,
                        timer: 1500,
                        didClose: function() {
                            $('#modalTambahRak').modal('hide');
                            setTimeout(function() {

                            }, 1000);
                            location.reload();
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning!',
                        text: 'Gagal menambahkan rak: ' + textStatus
                    });
                }
            });
        }


        function tambahKategori() {
            $.ajax({
                url: "<?php echo site_url('admin/tambah_kategori'); ?>",
                type: "POST",
                data: $('#formTambahKategori').serialize(),
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Kategori berhasil ditambahkan!',
                        showConfirmButton: false,
                        timer: 1500,
                        didClose: function() {
                            $('#modalTambahKategori').modal('hide');
                            setTimeout(function() {

                            }, 1000);
                            location.reload();
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning!',
                        text: 'Gagal menambahkan kategori'
                    });
                }
            });
        }


        function tambahBuku() {
            var formData = new FormData($('#formTambahBuku')[0]);
            $.ajax({
                url: "<?php echo site_url('admin/tambah_buku'); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Buku berhasil ditambahkan!',
                            showConfirmButton: false,
                            timer: 1500,
                            didClose: function() {
                                $('#modalTambahBuku').modal('hide');
                                setTimeout(function() {

                                }, 1000);
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning!',
                            text: response.message
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning!',
                        text: 'Gagal menambahkan buku: ' + textStatus
                    });
                }
            });
        }



        $('#modalTambahRak').on('show.bs.modal', function(e) {
            $.ajax({
                url: "<?php echo site_url('admin/get_all_rak'); ?>",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr><td>' + data[i].nama_rak + '</td><td>' + data[i].deskripsi + '</td><td class="text-center"><a href="javascript:void(0)" onclick="deleteRak(' + data[i].id + ')"><i class="fas fa-trash-alt text-danger"></i></a></td></tr>';
                    }
                    $('#listRak').html(html);
                }
            });
        });

        $('#modalTambahKategori').on('show.bs.modal', function(e) {
            $.ajax({
                url: "<?php echo site_url('admin/get_all_kategori'); ?>",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr><td>' + data[i].nama_kategori + '</td><td>' + data[i].deskripsi + '</td><td class="text-center"><a href="javascript:void(0)" onclick="deleteKategori(' + data[i].id + ')"><i class="fas fa-trash-alt text-danger"></i></a></td></tr>';
                    }
                    $('#listKategori').html(html);
                }
            });
        });
        $('#modalTambahBuku').on('show.bs.modal', function(e) {
            $.ajax({
                url: "<?php echo site_url('admin/get_all_rak'); ?>",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].nama_rak + ' - ' + data[i].deskripsi + '</option>';
                    }
                    $('select[name="rak"]').html(html);
                }
            });

            $.ajax({
                url: "<?php echo site_url('admin/get_all_kategori'); ?>",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id + '">' + data[i].nama_kategori + '</option>';
                    }
                    $('select[name="kategori"]').html(html);
                }
            });
        });

        function deleteRak(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus rak ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo site_url('admin/delete_rak/'); ?>" + id,
                        type: "POST",
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Rak berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500,
                                didClose: () => {
                                    $('#modalTambahRak').modal('hide');
                                    location.reload();
                                }
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Warning!',
                                text: 'Gagal menghapus rak: ' + textStatus
                            });
                        }
                    });
                }
            });
        }


        function deleteKategori(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus kategori ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo site_url('admin/delete_kategori/'); ?>" + id,
                        type: "POST",
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Kategori berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500,
                                didClose: () => {
                                    $('#modalTambahKategori').modal('hide');
                                    location.reload();
                                }
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Warning!',
                                text: 'Gagal menghapus kategori: ' + textStatus
                            });
                        }
                    });
                }
            });
        }

        function deleteBuku(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus buku ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo site_url('admin/delete_buku/'); ?>" + id,
                        type: "POST",
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Buku berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            location.reload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Warning!',
                                text: 'Gagal menghapus buku: ' + textStatus
                            });
                        }
                    });
                }
            });
        }

        function editBuku(id) {
            $.ajax({
                url: "<?php echo site_url('admin/get_buku_by_id/'); ?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#id_buku').val(data.id);
                    $('#judul_edit').val(data.judul);
                    $('#tahun_buku_edit').val(data.tahun_buku);
                    $('#nomor_isbn_edit').val(data.nomor_isbn);
                    $('#pengarang_edit').val(data.pengarang);
                    $('#penerbit_edit').val(data.penerbit);
                    $('#stok_buku_edit').val(data.stok_buku);

                    // Load Rak data
                    $.ajax({
                        url: "<?php echo site_url('admin/get_all_rak'); ?>",
                        type: "GET",
                        dataType: "JSON",
                        success: function(rakData) {
                            var rakHtml = '';
                            for (var i = 0; i < rakData.length; i++) {
                                rakHtml += '<option value="' + rakData[i].id + '">' + rakData[i].nama_rak + ' - ' + rakData[i].deskripsi + '</option>';
                            }
                            $('#rak_edit').html(rakHtml);
                            $('#rak_edit').val(data.rak_id); // Set selected value
                        }
                    });

                    // Load Kategori data
                    $.ajax({
                        url: "<?php echo site_url('admin/get_all_kategori'); ?>",
                        type: "GET",
                        dataType: "JSON",
                        success: function(kategoriData) {
                            var kategoriHtml = '';
                            for (var i = 0; i < kategoriData.length; i++) {
                                kategoriHtml += '<option value="' + kategoriData[i].id + '">' + kategoriData[i].nama_kategori + '</option>';
                            }
                            $('#kategori_edit').html(kategoriHtml);
                            $('#kategori_edit').val(data.kategori_id); // Set selected value
                        }
                    });

                    $('#modalEditBuku').modal('show');
                }
            });
        }

        function detailbuku() {
            $('#modalLiatBuku').on('show.bs.modal', function(e) {
                $.ajax({
                    url: "<?php echo site_url('admin/get_all_buku'); ?>",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        var html = '';
                        for (var i = 0; i < data.length; i++) {
                            html += '<tr><td>' + data[i].judul + '</td><td>' + data[i].tahun_buku + '</td><td>' + data[i].nomor_isbn + '</td><td>' + data[i].pengarang + '</td><td>' + data[i].penerbit + '</td><td>' + data[i].rak_id + '</td><td>' + data[i].kategori_id + '</td><td>' + data[i].stok_buku + '</td><td class="text-center"><a href="javascript:void(0)" onclick="deleteKategori(' + data[i].id + ')"><i class="fas fa-trash-alt text-danger"></i></a></td></tr>';
                        }
                        $('#listBuku').html(html);
                    }
                });
            });
        }

        function updateBuku() {
            var formData = new FormData($('#formEditBuku')[0]);
            // console.log("Data yang dikirim:", formData);
            $.ajax({
                url: "<?php echo site_url('admin/update_buku'); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Data Buku berhasil diperbarui!',
                        showConfirmButton: true,
                        timer: 1500,
                    }).then(function() {
                        $('#modalEditBuku').modal('hide');
                        location.reload();
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning!',
                        text: 'Gagal memperbarui Buku',
                    });
                }
            });
        }
    </script>

</body>

</html>