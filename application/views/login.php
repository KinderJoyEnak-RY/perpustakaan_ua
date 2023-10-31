<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIMPUS UA : Login</title>
	<link rel="icon" type="image/png" href="<?php echo base_url('uploads/img/logo.png'); ?>" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<!-- AdminLTE CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		/* Menambahkan Background */
		body {
			background: url('<?php echo base_url("uploads/img/library_background.jpg"); ?>') no-repeat center center fixed;
			background-size: cover;
			font-family: 'Arial', sans-serif;
		}

		/* Mengatur transparansi pada card utama */
		.card {
			background-color: rgba(255, 255, 255, 0.8) !important;
			border-radius: 15px;
		}

		/* Mengatur warna latar belakang dari elemen-elemen di dalam card */
		.card-body,
		.login-card-body,
		.card-header,
		.card-footer {
			background-color: transparent !important;
		}

		/* Mengatur transparansi pada input fields */
		.form-control {
			background-color: rgba(255, 255, 255, 0.5) !important;
			/* Semi-transparan */
			border: 1px solid rgba(0, 0, 0, 0.2);
			/* Border tipis dengan sedikit opacity */
		}

		/* Mengatur transparansi pada input group append (ikon di samping input) */
		.input-group-text {
			background-color: rgba(255, 255, 255, 0.5) !important;
			/* Semi-transparan */
			border-left: 0;
			/* Menghapus border kiri untuk menghindari double border */
		}

		/* Mengatur hover effect pada input fields */
		.form-control:hover,
		.form-control:focus {
			background-color: rgba(255, 255, 255, 0.7) !important;
			/* Sedikit lebih gelap saat di-hover atau di-focus */
		}

		/* Efek hover pada tombol */
		.btn-primary:hover {
			background-color: #0056b3;
		}

		.register-text {
			display: block;
			text-align: center;
			margin-top: 20px;
			/* Menambahkan jarak di atas teks */
			font-size: 0.9rem;
			/* Mengatur ukuran font */
		}

		.register-link {
			font-weight: 600;
			/* Membuat teks sedikit lebih tebal */
			color: #0056b3;
			/* Mengatur warna teks */
			transition: color 0.3s;
			/* Efek transisi saat di-hover */
		}

		.register-link:hover {
			color: #003a75;
			/* Mengubah warna saat di-hover */
			text-decoration: underline;
			/* Menambahkan garis bawah saat di-hover */
		}
	</style>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>Login</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Silakan login menggunakan akun yang sudah terdaftar</p>
				<?php if ($this->session->flashdata('error')) : ?>
					<div class="alert alert-danger">
						<?= $this->session->flashdata('error'); ?>
					</div>
				<?php endif; ?>

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<?= $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>
				<form action="<?php echo base_url('auth/do_login'); ?>" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Masukkan Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user-circle"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Ingat saya
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<p class="register-text">
					Belum punya akun? <a href="<?php echo base_url('auth/register'); ?>" class="register-link">Register</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</body>

</html>