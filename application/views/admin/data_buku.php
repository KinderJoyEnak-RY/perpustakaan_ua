<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                <!-- User Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i> <?php echo $this->session->userdata('full_name'); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <?php echo $this->session->userdata('full_name'); ?>
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
                <span class="brand-text font-weight-light">Admin Dashboard</span>
            </a>

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
                            <a href="#" class="nav-link">
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
                                    <a href="#" class="nav-link">
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
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Peminjaman</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Denda</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Buku</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Transaksi</p>
                                    </a>
                                </li>
                            </ul>
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
                            <h1 class="m-0">Data Buku</h1>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalTambahRak">Rak</button>
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalTambahKategori">Kategori</button>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBuku">Tambah Buku</button>
                    </div>

                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Cards -->
                    <div class="row">
                        <table class="table table-bordered">
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
                                    <th class="text-center">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($buku as $bk) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <img src="<?php echo base_url('uploads/' . $bk['sampul']); ?>" width="40" alt="Sampul" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/' . $bk['sampul']); ?>">
                                        </td>
                                        <td><?php echo $bk['judul']; ?></td>
                                        <td><?php echo $bk['tahun_buku']; ?></td>
                                        <td><?php echo $bk['nomor_isbn']; ?></td>
                                        <td><?php echo $bk['pengarang']; ?></td>
                                        <td><?php echo $bk['penerbit']; ?></td>
                                        <td><?php echo $bk['rak_id']; ?></td>
                                        <td><?php echo $bk['kategori_id']; ?></td>
                                        <td><?php echo $bk['stok_buku']; ?></td>
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
                                    <h5 class="mb-3">Data Rak</h5>
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
                                            <input type="text" class="form-control" name="nama_rak" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi"></textarea>
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
                                    <h5 class="mb-3">Data Kategori</h5>
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
                                            <input type="text" class="form-control" name="nama_kategori" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi"></textarea>
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
                                    <h5 class="mb-3">Tambah Buku Baru</h5>
                                    <form id="formTambahBuku" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Sampul</label>
                                            <input type="file" class="form-control" name="sampul" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control" name="judul" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="text" class="form-control" name="tahun_buku" required>
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input type="text" class="form-control" name="nomor_isbn" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input type="text" class="form-control" name="pengarang" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input type="text" class="form-control" name="penerbit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Rak</label>
                                            <select class="form-control" name="rak" required>
                                                <!-- Data rak akan diisi di sini melalui JavaScript -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" required>
                                                <!-- Data kategori akan diisi di sini melalui JavaScript -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stok Buku</label>
                                            <input type="number" class="form-control" name="stok_buku" required>
                                        </div>
                                        <button type="button" onclick="tambahBuku()" class="btn btn-primary">Simpan</button>
                                    </form>
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

    <script>
        function tambahRak() {
            $.ajax({
                url: "<?php echo site_url('admin/tambah_rak'); ?>",
                type: "POST",
                data: $('#formTambahRak').serialize(),
                success: function(data) {
                    alert('Rak berhasil ditambahkan');
                    $('#modalTambahRak').modal('hide');
                    // Anda bisa menambahkan kode untuk refresh halaman atau update tabel
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal menambahkan rak');
                }
            });
        }

        function tambahKategori() {
            $.ajax({
                url: "<?php echo site_url('admin/tambah_kategori'); ?>",
                type: "POST",
                data: $('#formTambahKategori').serialize(),
                success: function(data) {
                    alert('Kategori berhasil ditambahkan');
                    $('#modalTambahKategori').modal('hide');
                    // Anda bisa menambahkan kode untuk refresh halaman atau update tabel
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal menambahkan kategori');
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
                success: function(data) {
                    alert('Buku berhasil ditambahkan');
                    $('#modalTambahBuku').modal('hide');
                    // Anda bisa menambahkan kode untuk refresh halaman atau update tabel
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal menambahkan buku');
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
            if (confirm('Apakah Anda yakin ingin menghapus rak ini?')) {
                $.ajax({
                    url: "<?php echo site_url('admin/delete_rak/'); ?>" + id,
                    type: "POST",
                    success: function(data) {
                        alert('Rak berhasil dihapus');
                        $('#modalTambahRak').modal('hide');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Gagal menghapus rak');
                    }
                });
            }
        }

        function deleteKategori(id) {
            if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                $.ajax({
                    url: "<?php echo site_url('admin/delete_kategori/'); ?>" + id,
                    type: "POST",
                    success: function(data) {
                        alert('Kategori berhasil dihapus');
                        $('#modalTambahKategori').modal('hide');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Gagal menghapus kategori');
                    }
                });
            }
        }
    </script>

</body>

</html>