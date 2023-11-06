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
                                    <a href="<?php echo base_url('admin/data_anggota'); ?>" class="nav-link active">
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
                            <h1 class="m-0">Data Anggota</h1>
                        </div>
                    </div>
                    <div class="btn-group mb-3" role="group" aria-label="Button group">
                        <!-- <button class="btn btn-warning mr-2" data-toggle="modal" data-target="#modalTambahRak">
                            <i class="fas fa-archive"></i> Rak
                        </button>
                        <button class="btn btn-success mr-2" data-toggle="modal" data-target="#modalTambahKategori">
                            <i class="fas fa-tags"></i> Kategori
                        </button> -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAnggota">
                            <i class="fas fa-plus"></i> Tambah Anggota
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
                                    <th width="2%" class="text-center">Profil</th>
                                    <th width="10%" class="text-center">Nama</th>
                                    <th width="10%" class="text-center">Kelas</th>
                                    <th width="10%" class="text-center">NIS</th>
                                    <th width="10%" class="text-center">Telefon</th>
                                    <th width="10%" class="text-center">Email</th>
                                    <th width="10%" class="text-center">Role</th>
                                    <th width="10%" class="text-center">Barcode</th>
                                    <th width="10%"class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($users as $user) : ?>
								<!-- <pre> <?php print_r($user); ?> </pre> -->
								
                                    <tr>
                                        <td width="2%" class="text-center"><?php echo $no++; ?></td>
										<td>
                                            <img src="<?php echo base_url('uploads/profil_anggota/' . $user['profil']); ?>" width="40" alt="Profil" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/profil_anggota/' . $user['profil']); ?>">
                                        </td>
                                        <td width="10%"><?php echo $user['nama']; ?></td>
                                        <td width="10%"><?php echo $user['kelas']; ?></td>
                                        <td width="10%"><?php echo $user['nis']; ?></td>
                                        <td width="10%" ><?php echo $user['telefon']; ?></td>
                                        <td width="10%" ><?php echo $user['email']; ?></td>
                                        <td width="10%"><?php echo $user['role']; ?></td>
                                        <td width="10%" >
                                            <img src="<?php echo base_url('uploads/qrcodes/qranggota/' . $user['qr_code']); ?>" width="40" alt="QR Code" class="img-thumbnail qr-code-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="<?php echo base_url('uploads/qrcodes/qranggota/' . $user['qr_code']); ?>">
										</td>
                                        <td width="10%" class="text-center">
											<!-- <button class="btn btn-primary" onclick="openWindow('<?= base_url('admin/detail_anggota/' . $user['id']); ?>')">
                                            <i class="fa fa-print"></i> Cetak Kartu
                                            </button> -->
											<a href="javascript:void(0)" onclick="lihatAnggota(<?php echo $user['id']; ?>)" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" onclick="editAnggota(<?php echo $user['id']; ?>)" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="javascript:void(0)" onclick="deleteAnggota(<?php echo $user['id']; ?>)" title="Delete">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Tambah Anggota -->
                    <div class="modal fade" id="modalTambahAnggota" tabindex="-1" role="dialog" aria-labelledby="modalLabelTambahAnggota" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="mb-3" style="text-align: center;">Tambah Anggota Baru</h5>
                                    <form id="formTambahAnggota" action="javascript:void(0)" method="post" enctype="multipart/form-data">
										<div class="form-group">
                                            <label>Foto Profil</label>
                                            <input type="file" class="form-control" name="profil" id="profil">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control capitalize-input" name="nama" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input type="number" class="form-control" name="nis" id="nis">
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas" id="kelas">
												<option>-Pilih Kelas-</option>
        										<option value="VII">VII</option>
        										<option value="VIII">VIII</option>
       											<option value="IX">IX</option>
    										</select>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" id="username">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefon</label>
                                            <input type="number" class="form-control" name="telefon" id="telefon">
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="staff">Staff</option>
                                                <option value="anggota">Anggota</option>
                                            </select>
                                        </div>
                                        <button type="button" onclick="tambahAnggota()" class="btn btn-primary">Simpan</button>
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
                                    <h5 class="mb-3" style="text-align: center;">Edit Anggota</h5>
                                    <form id="formEditAnggota" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id">
										<div class="form-group">
                                            <label>Foto Profil</label>
                                            <input type="file" class="form-control" name="profil_edit" id="profil_edit">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control capitalize-input" name="nama_edit" id="nama_edit" required>
                                        </div>
										<div class="form-group">
                                            <label>NIS</label>
                                            <input type="text" class="form-control" name="nis_edit" id="nis_edit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas_edit" id="kelas_edit">
												<!-- Kalo kelasnya mau ditambah lewat sini yo el -->
												<option>-Pilih Kelas-</option>
        										<option value="X">X</option>
        										<option value="XI">XI</option>
       											<option value="XII">XII</option>
    										</select>
                                        </div>
										<div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username_edit" id="username_edit" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password_edit" id="password_edit" placeholder="Isikan password baru jika ingin mengganti password" required>
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
                                            <select class="form-control" name="role_edit" id="role_edit">
												<option value="Staff">Staff</option>
												<option value="Anggota">Anggota</option>
											</select>
                                        </div>
                                        <button type="button" onclick="updateAnggota()" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="modal fade" id="modalLihatAnggota" tabindex="-1" role="dialog" aria-labelledby="modalLabelLihatAnggota" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="mb-3" style="text-align: center;">Detail Anggota</h5>
                                    <form id="formEditAnggota" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id">

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama_lihat" id="nama_lihat" readonly>
                                        </div>
										<div class="form-group">
                                            <label>NIS</label>
                                            <input type="text" class="form-control" name="nis_lihat" id="nis_lihat" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input type="text" class="form-control" name="kelas_lihat" id="kelas_lihat" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username_lihat" id="username_lihat" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email_lihat" id="email_lihat" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Telefon</label>
                                            <input type="text" class="form-control" name="telefon_lihat" id="telefon_lihat" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Role</label>
                                            <input type="text" class="form-control" name="role_lihat" id="role_lihat" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Barcode Anggota</label>
									<center><img style="width:200px;" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl= Data Anggota Perpus <?= 'Nama : ' . $user['nama'] . ' NIS : ' . $user['nis'] . ' Kelas : ' .$user['kelas']; ?> &choe=UTF-8" title="QR" /></center>
                                        </div>
                                        <!-- <button type="button" onclick="updateAnggota()" class="btn btn-primary">Update</button> -->
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
                                    <img id="modalImage" src="" alt="Foto Profil" class="img-fluid">
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

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <!-- DataTables JS -->
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
		$('.qr-code-thumbnail').on('click', function() {
            var imageUrl = $(this).data('image');
            $('#imageModal').find('#modalImage').attr('src', imageUrl);
            $('#imageModal').modal('show');
        });
    </script>
    <script>

		function openWindow(url) {
   			 window.open(url, '_blank', 'width=600,height=600');
		}
		
		function tambahAnggota() {
			var formData = new FormData($('#formTambahAnggota')[0]);
			$.ajax({
				url: "<?php echo site_url('admin/tambah_anggota'); ?>",
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				success: function(data) {
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: 'Anggota berhasil ditambahkan!'
					}).then(function() {
						$('#modalTambahAnggota').modal('hide');
						location.reload();
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Gagal menambahkan Anggota'
					});
				}
			});
		}



        function deleteAnggota(id) {
			Swal.fire({
				title: 'Apakah Anda yakin ingin menghapus Anggota ini?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?php echo site_url('admin/delete_anggota/'); ?>" + id,
						type: "POST",
						success: function(data) {
							Swal.fire({
								title: 'Sukses',
								text: 'Anggota berhasil dihapus!',
								icon: 'success',
								showConfirmButton: false,
								timer: 1500
							}).then(() => {
								location.reload();
							});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							Swal.fire({
								title: 'Error',
								text: 'Gagal menghapus Anggota',
								icon: 'error'
							});
						}
					});
				}
			});
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
                    $('#password_edit').val('');
                    $('#email_edit').val(data.email);
                    $('#telefon_edit').val(data.telefon);
                    $('#role_edit').val(data.role);

                    $('#modalEditAnggota').modal('show');
                }
            });
        }

		function lihatAnggota(id) {
            $.ajax({
                url: "<?php echo site_url('admin/get_anggota_by_id/'); ?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nama_lihat').val(data.nama);
                    $('#nis_lihat').val(data.nis);
                    $('#kelas_lihat').val(data.kelas);
                    $('#username_lihat').val(data.username);
                    $('#email_lihat').val(data.email);
                    $('#telefon_lihat').val(data.telefon);
                    $('#role_lihat').val(data.role);

                    $('#modalLihatAnggota').modal('show');
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
					Swal.fire({
						icon: 'success',
						title: 'Sukses',
						text: 'Data anggota berhasil diperbarui!',
						showConfirmButton: false,
						timer: 1500,
					}).then(function () {
						$('#modalEditAnggota').modal('hide');
						location.reload();
					});
				},
				error: function(jqXHR, textStatus, errorThrown) {
					Swal.fire({
						icon: 'error',
						title: 'Warning!',
						text: 'Gagal memperbarui Anggota',
					});
				}
			});
		}

    </script>

</body>
</html>
