<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<!-- AdminLTE CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="#"><b>Login</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>
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
						<input type="text" class="form-control" name="username" placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
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
									Remember Me
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
				<p class="mb-1">
					<a href="<?php echo base_url('auth/register'); ?>" class="text-center">Register a new membership</a>
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