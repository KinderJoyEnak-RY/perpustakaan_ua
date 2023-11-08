<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPUS UA : Register</title>
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

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Register</b></a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <h5 class="login-box-msg">Pendaftaran Akun</h5>
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
                <form action="<?php echo base_url('auth/register'); ?>" method="post" enctype="multipart/form-data">
                    <!-- Foto Profile -->
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="profil" id="profil">
                            <label class="custom-file-label" for="profil">Pilih foto profil</label>
                        </div>
                    </div>
                    <!-- Nama Lengkap -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <!-- NIS -->
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="nis" placeholder="NIS">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Kelas -->
                    <!-- Kelas -->
                    <div class="input-group mb-3">
                        <select class="form-control" name="kelas">
                            <option value="">Pilih Kelas</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                            <option value="GURU">GURU</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-chalkboard-teacher"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="telefon" placeholder="Telepon">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Username -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-circle"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat Password -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_repeat" placeholder="Repeat password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Role -->
                    <div class="input-group mb-3">
                        <select class="form-control" name="role">
                            <option value="anggota">Anggota</option>
                            <!-- <option value="staff">Staff</option> -->
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Daftar Akun</button>
                        </div>
                    </div>
                </form>
                <p class="register-text">
                    Sudah punya akun ? <a href="<?php echo base_url('auth/login'); ?>" class="text-center register-link">Login</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
            // Ketika file input berubah
            $('#profil').on('change', function() {
                // Mendapatkan nama file
                var fileName = $(this).val().split('\\').pop();
                // Mengganti teks pada label
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        });
    </script>
</body>

</html>