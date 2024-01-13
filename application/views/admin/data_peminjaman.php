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
    <!-- Responsive extension for DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
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
                    <div id="message" style="display: none;" class="alert" role="alert"></div>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table id="tabelPeminjaman" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pinjam</th>
                                    <th>Nama Peminjam</th>
                                    <th>NIS</th>
                                    <th>Kelas</th>
                                    <th>Kontak</th>
                                    <th>Judul Buku</th>
                                    <th>ISBN</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Harus Kembali</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data dari database akan di-load disini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.content -->

            <!-- Modal Tambah Peminjaman -->
            <div class="modal fade" id="modalTambahPinjam" tabindex="-1" role="dialog" aria-labelledby="modalTambahPinjamLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahPinjamLabel">Tambah Peminjaman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('admin/tambah_peminjaman'); ?>" method="post">
                            <div class="modal-body">
                                <!-- Form fields -->
                                <div class="form-group">
                                    <label for="user_id">Nama Peminjam:</label>
                                    <select class="form-control" id="user_id" name="user_id" required>
                                        <!-- Opsi pengguna diambil dari database -->
                                        <?php foreach ($users as $user) : ?>
                                            <option value="<?php echo $user['id']; ?>"><?php echo $user['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Informasi tambahan pengguna -->
                                <div id="info-peminjam" style="display: none;">
                                    <div class="form-group">
                                        <label for="nis">NIS:</label>
                                        <input type="text" class="form-control" id="nis" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas:</label>
                                        <input type="text" class="form-control" id="kelas" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefon">Kontak:</label>
                                        <input type="text" class="form-control" id="telefon" readonly>
                                    </div>
                                </div>
                                <!-- Informasi buku -->
                                <div class="form-group">
                                    <label for="buku_id">Judul Buku:</label>
                                    <select class="form-control" id="buku_id" name="buku_id" required>
                                        <!-- Opsi buku diambil dari database -->
                                        <?php foreach ($buku as $book) : ?>
                                            <option value="<?php echo $book['id']; ?>"><?php echo $book['judul']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Informasi tambahan buku -->
                                <div id="info-buku" style="display: none;">
                                    <div class="form-group">
                                        <label for="nomor_isbn">ISBN:</label>
                                        <input type="text" class="form-control" id="nomor_isbn" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="pengarang">Pengarang:</label>
                                        <input type="text" class="form-control" id="pengarang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="penerbit">Penerbit:</label>
                                        <input type="text" class="form-control" id="penerbit" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok_buku">Stok Buku:</label>
                                        <input type="text" class="form-control" id="stok_buku" readonly>
                                    </div>
                                </div>
                                <!-- Tanggal pinjam dan harus kembali -->
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" onchange="validateDate()" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_harus_kembali">Tanggal Harus Kembali:</label>
                                    <input type="date" class="form-control" id="tanggal_harus_kembali" name="tanggal_harus_kembali" required>
                                </div>
                                <!-- Jumlah buku -->
                                <div class="form-group">
                                    <label for="jumlah_buku">Jumlah Pinjam Buku:</label>
                                    <input type="number" class="form-control" id="jumlah_buku" name="jumlah_buku" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Denda -->
            <div class="modal fade" id="modalTambahDenda" tabindex="-1" role="dialog" aria-labelledby="modalTambahDendaLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahDendaLabel">Master Denda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('admin/tambah_denda'); ?>" method="post">
                            <div class="modal-body">
                                <!-- Form fields -->
                                <div class="form-group">
                                    <label for="jumlah_denda">Jumlah Denda:</label>
                                    <input type="number" class="form-control" id="jumlah_denda" name="jumlah_denda" required>
                                </div>

                                <!-- Tabel Denda -->
                                <table class="table" id="tabelDenda">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Jumlah Denda</th>
                                            <th>Status Aktif</th>
                                            <th>Tanggal Dibuat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi tabel akan di-load menggunakan AJAX -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Update Denda</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive extension for DataTables -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

    <script>
        function validateDate() {
            var tanggalPinjam = $('#tanggal_pinjam').on('change', validateDate);
            if (tanggalPinjam) {
                var maxDate = new Date(tanggalPinjam);
                maxDate.setDate(maxDate.getDate() + 2); // Tambahkan 2 hari ke tanggal pinjam

                var dd = maxDate.getDate();
                var mm = maxDate.getMonth() + 1; // Januari adalah 0
                var yyyy = maxDate.getFullYear();

                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }

                maxDate = yyyy + '-' + mm + '-' + dd;
                $('#tanggal_harus_kembali').attr('min', tanggalPinjam); // Set minimum date sebagai tanggal pinjam
                $('#tanggal_harus_kembali').attr('max', maxDate); // Set maksimum date 2 hari dari tanggal pinjam
            }
        }

        $('#modalTambahPinjam').on('shown.bs.modal', function() {
            validateDate(); // Memastikan tanggal kembali sesuai dengan tanggal pinjam saat modal ditampilkan
        });


        $(document).ready(function() {
            // Ketika nama peminjam berubah
            $('#user_id').on('change', function() {
                var userId = $(this).val();
                if (userId) {
                    // Lakukan AJAX call ke server untuk mendapatkan informasi pengguna
                    $.ajax({
                        url: "<?php echo base_url('admin/get_user_info/'); ?>" + userId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Isi form dengan data yang didapat
                            $('#nis').val(data.nis);
                            $('#kelas').val(data.kelas);
                            $('#telefon').val(data.telefon);
                            $('#info-peminjam').show();
                        }
                    });
                } else {
                    $('#info-peminjam').hide();
                }
            });

            // Ketika judul buku berubah
            $('#buku_id').on('change', function() {
                var bukuId = $(this).val();
                if (bukuId) {
                    // Lakukan AJAX call ke server untuk mendapatkan informasi buku
                    $.ajax({
                        url: "<?php echo base_url('admin/get_buku_info/'); ?>" + bukuId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Isi form dengan data yang didapat
                            $('#nomor_isbn').val(data.nomor_isbn);
                            $('#pengarang').val(data.pengarang);
                            $('#penerbit').val(data.penerbit);
                            $('#stok_buku').val(data.stok_buku);
                            $('#info-buku').show();
                        }
                    });
                } else {
                    $('#info-buku').hide();
                }
            });

            var table = $('#tabelPeminjaman').DataTable({
                "processing": true,
                "serverSide": false,
                "data": <?php echo json_encode($peminjaman); ?>,
                "columns": [{
                        "data": null, // Kolom tambahan untuk nomor urutan
                        "searchable": false,
                        "orderable": false,
                        "render": function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1; // Menambahkan nomor urutan
                        }
                    },
                    {
                        "data": "id"
                    },
                    {
                        "data": "nama_peminjam"
                    },
                    {
                        "data": "nis"
                    },
                    {
                        "data": "kelas"
                    },
                    {
                        "data": "telefon"
                    },
                    {
                        "data": "judul_buku"
                    },
                    {
                        "data": "nomor_isbn"
                    },
                    {
                        "data": "tanggal_pinjam"
                    },
                    {
                        "data": "tanggal_harus_kembali"
                    },
                    {
                        "data": "tanggal_kembali",
                        "defaultContent": "", // Ini akan menampilkan string kosong jika data tidak ada
                        "render": function(data, type, row) {
                            return data ? data : '-'; // Jika data ada, tampilkan, jika tidak, tampilkan '-'
                        }
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row) {
                            // Mengecek status dari database
                            if (data === 'dikembalikan') {
                                return 'Dikembalikan';
                            } else {
                                return 'Dipinjam';
                            }
                        }
                    },
                    {
                        "data": "denda",
                        "render": function(data, type, row) {
                            // Data denda diambil dari server dan ditampilkan
                            return data ? 'Rp' + data : '-';
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            var kembaliButton = "<button class='btn btn-warning btn-sm btn-kembali' title='Kembalikan'><i class='fas fa-undo'></i></button>";
                            var hapusButton = "<button class='btn btn-danger btn-sm btn-hapus' data-id='" + row.id + "' title='Hapus'><i class='fas fa-trash'></i></button>";

                            // Cek jika status adalah 'dipinjam', tampilkan tombol 'Kembalikan' dan 'Hapus'
                            if (row.status === 'dipinjam') {
                                return kembaliButton + " " + hapusButton;
                            } else {
                                // Jika statusnya 'dikembalikan', tampilkan hanya tombol 'Hapus'
                                return hapusButton;
                            }
                        }
                    }
                ]
            });
            validateDate(); // Panggil ketika dokumen siap

            // Fungsi untuk memperbarui denda secara periodik
            function refreshDenda() {
                $.ajax({
                    url: "<?php echo base_url('admin/update_denda'); ?>",
                    type: 'POST',
                    dataType: 'json',
                    success: function(data) {
                        // Loop melalui semua data dan update kolom denda
                        data.forEach(function(item) {
                            // Cari baris berdasarkan ID peminjaman
                            var row = table.row(function(idx, data, node) {
                                return data.id == item.id;
                            });

                            // Update kolom denda jika baris ditemukan
                            if (row.length) {
                                table.cell(row, 11).data(item.denda).draw();
                            }
                        });
                    }
                });
            }

            // Set interval untuk refresh denda
            setInterval(refreshDenda, 60000); // Update denda setiap menit

            $('#tabelPeminjaman tbody').on('click', '.btn-kembali', function() {
                var btn = $(this); // Simpan referensi button yang diklik
                var data = table.row(btn.parents('tr')).data();
                var id = data.id; // mengasumsikan kolom ID adalah data yang pertama

                Swal.fire({
                    title: 'Apakah Anda yakin ingin mengembalikan buku ini?',
                    text: 'Pengembalian buku tidak dapat dibatalkan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, kembalikan!',
                    cancelButtonText: 'Batal'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?php echo base_url('admin/kembalikan_buku/'); ?>" + id,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id: id
                            },
                            beforeSend: function() {
                                btn.prop('disabled', true); // Disable button saat AJAX call dimulai
                            },
                            success: function(response) {
                                $('#message').removeClass('alert-success alert-danger');
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    });

                                    var currentDate = new Date().toISOString().slice(0, 10);
                                    var rowData = table.row(btn.parents('tr')).data();
                                    rowData.tanggal_kembali = currentDate;
                                    rowData.status = 'dikembalikan';
                                    rowData.denda = response.denda;

                                    table.row(btn.parents('tr')).data(rowData).invalidate().draw();

                                    btn.closest('tr').find('td:eq(11)').text(response.denda);
                                    btn.closest('tr').find('td').eq(12).html('-');
                                    btn.closest('tr').addClass('table-success');
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: response.message,
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                    btn.prop('disabled', false);
                                }
                            }
                        });
                    }
                });
            });



            $('#tabelPeminjaman tbody').on('click', '.btn-hapus', function() {
                var btn = $(this); // simpan referensi button yang diklik
                var dataId = btn.data('id'); // mengambil data-id dari tombol yang diklik

                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus data peminjaman ini?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Lakukan AJAX call untuk menghapus data
                        $.ajax({
                            url: "<?php echo base_url('admin/hapus_peminjaman/'); ?>" + dataId,
                            type: 'POST',
                            dataType: 'json',
                            success: function(response) {
                                // Response dari server setelah menghapus
                                Swal.fire({
                                    title: response.success ? 'Berhasil!' : 'Error!',
                                    text: response.message,
                                    icon: response.success ? 'success' : 'error',
                                    confirmButtonText: 'OK'
                                });

                                if (response.success) {
                                    table.row(btn.parents('tr')).remove().draw();
                                    location.reload();
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Terjadi kesalahan saat menghapus.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            });


            // Tambahkan script untuk load data denda pada modal open
            $('#modalTambahDenda').on('shown.bs.modal', function() {
                $.ajax({
                    url: "<?php echo base_url('admin/get_denda_json'); ?>",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var tableBody = $('#tabelDenda tbody');
                        tableBody.empty(); // Bersihkan isi tabel

                        $.each(data, function(i, item) {
                            var status = item.status_aktif === '1' ? 'Aktif' : 'Tidak Aktif';
                            tableBody.append(
                                '<tr>' +
                                '<td>' + item.id + '</td>' +
                                '<td>' + item.jumlah_denda + '</td>' +
                                '<td>' + status + '</td>' +
                                '<td>' + item.tanggal_dibuat + '</td>' +
                                '</tr>'
                            );
                        });
                    }
                });
            });
        });
    </script>


</body>

</html>