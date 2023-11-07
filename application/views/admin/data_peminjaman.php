<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Admin Dashboard Perpustakaan">
    <meta name="author" content="PerpusUA">
    <title>SIMPUS UA : Peminjaman</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    #modalImage {
        max-width: 100%;
        height: auto;
        margin: 0 auto;
        display: block;
    }
</style>

</head>


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
                    <i class="far fa-user"></i> <?php echo $this->session->userdata('nama'); ?>
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
                                <a href="<?php echo base_url('admin/data_peminjaman'); ?>" class="nav-link active">
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
                        <h1 class="m-0">Data Peminjaman</h1>
                    </div>
                </div>
                <div class="btn-group mb-3" role="group" aria-label="Button group">
                    <!-- <button class="btn btn-warning mr-2" data-toggle="modal" data-target="#modalTambahRak">
                            <i class="fas fa-archive"></i> Rak
                        </button>
                        <button class="btn btn-success mr-2" data-toggle="modal" data-target="#modalTambahKategori">
                            <i class="fas fa-tags"></i> Kategori
                        </button> -->
                    <button class="btn btn-danger mr-2" data-toggle="modal" data-target="#modalTambahDenda">
                        <i class="fas fa-archive"></i> Master Denda
                    </button>&nbsp;&nbsp;
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPinjam">
                        <i class="fas fa-plus"></i> Tambah Peminjaman
                    </button>

                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Cards -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="2%" class="text-center">No</th>
                                <th width="10%" class="text-center">Id Peminjaman</th>
                                <th width="10%" class="text-center">NIS Peminjam</th>
                                <th width="10%" class="text-center">ID Buku</th>
                                <th width="10%" class="text-center">Status Peminjaman</th>
                                <th width="10%" class="text-center">Tanggal Peminjaman</th>
                                <th width="10%" class="text-center">Lama Peminjaman</th>
                                <th width="10%" class="text-center">Tanggal Kembali</th>
                                <th width="10%" class="text-center">Tanggal Pengembalian</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($peminjaman as $pinjam) : ?>
                                <!-- <pre> <?php print_r($user); ?> </pre> -->
                                <?php
                                $status = '';
                                if ($pinjam['status'] == 1) {
                                    $status = 'Dipinjam';
                                } else {
                                    $status = "Dikembalikan";
                                }
                                ?>
                                <tr>
                                    <td width="2%" class="text-center"><?php echo $no++; ?></td>
                                    <td width="10%"><?php echo $pinjam['id_pinjam']; ?></td>
                                    <td width="10%"><?php echo $pinjam['nis']; ?></td>
                                    <td width="10%"><?php echo $pinjam['id_buku']; ?></td>
                                    <td width="10%"><?php echo $status; ?></td>
                                    <td width="10%"><?php echo $pinjam['tgl_pinjam']; ?></td>
                                    <td width="10%"><?php echo $pinjam['lama_pinjam']; ?></td>
                                    <td width="10%"><?php echo $pinjam['tgl_kembali']; ?></td>
                                    <td width="10%"><?php echo $pinjam['tgl_pengembalian']; ?></td>
                                    <td width="10%" class="text-center">
                                        <a href="javascript:void(0)" onclick="editAnggota(<?php echo $pinjam['id']; ?>)" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="javascript:void(0)" onclick="deletePeminjaman(<?php echo $pinjam['id']; ?>)" title="Delete">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Modal Tambah Peminjaman -->
                <div class="modal fade" id="modalTambahPinjam" tabindex="-1" role="dialog" aria-labelledby="modalLabelTambahPinjam" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="mb-3" style="text-align: center;">Tambah Peminjaman</h5>
                                <form id="formTambahPinjam" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>ID PEMINJAMAN</label>
                                        <input type="text" class="form-control" name="id_pinjam" id="id_pinjam" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIS PEMINJAM</label>
                                        <input type="text" class="form-control" name="nis" id="nis" required>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#nis").autocomplete({
                                                source: function(request, response) {
                                                    $.ajax({
                                                        url: "<?php echo base_url('nis/getAutocomplete'); ?>",
                                                        type: "GET",
                                                        data: {
                                                            term: request.term
                                                        },
                                                        dataType: "json",
                                                        success: function(data) {
                                                            response(data);
                                                        }
                                                    });
                                                },
                                                minLength: 1
                                            });
                                        });
                                    </script>
                                    <div class="form-group">
                                        <label>BUKU</label>
                                        <input type="hidden" class="form-control" name="id_buku" id="id_buku" required>
                                        <input type="text" class="form-control" name="judul" id="judul" required>
                                    </div>
                                    <div class="form-group">
                                        <label>TANGGAL PEMINJAMAN</label>
                                        <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" required>
                                    </div>
                                    <div class="form-group">
                                        <label>LAMA PEMINJAMAN</label>
                                        <input type="number" class="form-control" name="lama_pinjam" id="lama_pinjam" value="2" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>TANGGAL PENGEMBALIAN</label>
                                        <input type="date" class="form-control" name="tgl_pengembalian" id="tgl_pengembalian">
                                    </div>
                                    <button type="button" onclick="tambahPeminjaman()" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Denda -->
                <div class="modal fade small-modal" id="modalTambahDenda" tabindex="-1" role="dialog" aria-labelledby="modalLabelTambahDenda" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="mb-3">Master Data Denda</h5>
                                <table class="table table-hover table-bordered small-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Denda</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listDenda">
                                        <!-- Data Denda akan diisi di sini melalui JavaScript -->
                                    </tbody>
                                </table>
                                <!-- Form Tambah Denda -->
                                <h5 class="mt-4 mb-3">Tambah Denda Baru</h5>
                                <form id="formTambahDenda" action="javascript:void(0)" method="post">
                                    <div class="form-group">
                                        <label>Denda</label>
                                        <input type="text" class="form-control" name="harga_denda" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="status" required>

                                    </div>
                                    <button type="button" onclick="tambahDenda()" class="btn btn-success">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal Edit Buku -->
                <div class="modal fade" id="modalEditAnggota" tabindex="-1" role="dialog" aria-labelledby="modalLabelEditAnggota" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="mb-3">Edit Anggota</h5>
                                <form id="formEditAnggota" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id">

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama_edit" id="nama_edit" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" class="form-control" name="nis_edit" id="nis_edit" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" class="form-control" name="kelas_edit" id="kelas_edit" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username_edit" id="username_edit" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password_edit" id="password_edit" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email_edit" id="email_edit" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input type="text" class="form-control" name="telefon_edit" id="telefon_edit" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <input type="text" class="form-control" name="role_edit" id="role_edit" readonly>
                                    </div>
                                    <button type="button" onclick="updateAnggota()" class="btn btn-primary">Update</button>
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
</div>
<!-- ./wrapper -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "pageLength": 10
        });
    });

    $('#imageModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var imageUrl = button.data('image');
        var modal = $(this);
        modal.find('#modalImage').attr('src', imageUrl);
    });
</script>
<script>
    function tambahDenda() {
        $.ajax({
            url: "<?php echo site_url('admin/tambah_denda'); ?>",
            type: "POST",
            data: $('#formTambahDenda').serialize(),
            success: function(data) {
                Swal.fire({
                    title: 'Sukses',
                    text: 'Denda berhasil ditambahkan!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    $('#modalTambahDenda').modal('hide');
                    location.reload();
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    title: 'Error',
                    text: 'Gagal menambahkan Denda',
                    icon: 'error'
                });
            }
        });
    }

    $('#modalTambahDenda').on('show.bs.modal', function(e) {
        $.ajax({
            url: "<?php echo site_url('admin/get_all_denda'); ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    var statusDenda = data[i].status == 1 ? "Aktif" : "Tidak Aktif";
                    html += '<tr><td>' + data[i].harga_denda + '</td><td>' + statusDenda + '</td><td class="text-center"><a href="javascript:void(0)" onclick="deleteDenda(' + data[i].id + ')"><i class="fas fa-trash-alt text-danger"></i></a></td></tr>';
                }
                $('#listDenda').html(html);
            }
        });
    });

    function deleteDenda(id) {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menghapus denda ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo site_url('admin/delete_denda/'); ?>" + id,
                    type: "POST",
                    success: function(data) {
                        Swal.fire({
                            title: 'Sukses',
                            text: 'Denda berhasil dihapus',
                            icon: 'success',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#modalTambahDenda').modal('hide');
                                location.reload();
                            }
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Gagal menghapus Denda',
                            icon: 'error',
                        });
                    }
                });
            }
        });
    }

    // ini buat nyeting tanggalnya yo el tak buat max 2 hari
    var tglPinjamInput = document.getElementById("tgl_pinjam");
    var tglPengembalianInput = document.getElementById("tgl_pengembalian");
    var harinini = new Date();
    var formattedDate = harinini.toISOString().slice(0, 10);
    tglPinjamInput.value = formattedDate;
    harinini.setDate(harinini.getDate() + 1);
    formattedDate = harinini.toISOString().slice(0, 10);
    tglPengembalianInput.value = formattedDate;

    function tambahPeminjaman() {

        var formData = new FormData($('#formTambahPinjam')[0]);
        $.ajax({
            url: "<?php echo site_url('admin/tambah_peminjaman'); ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                alert('Peminjaman berhasil ditambahkan');
                $('#modalTambahPinjam').modal('hide');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal menambahkan Peminjaman');
            }
        });
    }


    function deletePeminjaman(id) {
        if (confirm('Apakah Anda yakin ingin menghapus Anggota ini?')) {
            $.ajax({
                url: "<?php echo site_url('admin/delete_anggota/'); ?>" + id,
                type: "POST",
                success: function(data) {
                    popalert('Anggota berhasil dihapus');
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    popalert('Gagal menghapus Anggota');
                }
            });
        }
    }

    function editAnggota(id) {
        $.ajax({
            url: "<?php echo site_url('admin/get_anggota_by_id/'); ?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#id').val(data.id);
                $('#nama_edit').val(data.nama);
                $('#nis_edit').val(data.nis);
                $('#kelas_edit').val(data.kelas);
                $('#username_edit').val(data.username);
                $('#password_edit').val(data.password);
                $('#email_edit').val(data.email);
                $('#telefon_edit').val(data.telefon);
                $('#role_edit').val(data.role);

                $('#modalEditAnggota').modal('show');
            }
        });
    }

    function updateAnggota() {
        var formData = new FormData($('#formEditAnggota')[0]);
        $.ajax({
            url: "<?php echo site_url('admin/update_anggota'); ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                popalert('Data anggota berhasil diperbarui');
                // console.log(data);
                $('#modalEditAnggota').modal('hide');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                popalert('Gagal memperbarui Anggota');
            }
        });
    }
</script>

</body>

</html>