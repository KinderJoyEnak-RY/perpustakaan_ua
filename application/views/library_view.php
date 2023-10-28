<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan SMP Unggulan Aisyiyah Bantul</title>
	<link rel="icon" type="image/png" href="<?php echo base_url('uploads/img/logo.png'); ?>" />
	<img src="<?php echo base_url('uploads/img/logo.png'); ?>" alt="Logo Perpustakaan SMP" height="40">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1,
        h2,
        h3 {
            font-family: 'Roboto Slab', serif;
        }

        nav {
            border-bottom: 1px solid #ccc;
        }

        .btn-login {
            background-color: #343a40;
            color: #ffffff;
            border: none;
        }

        .bg-primary {
            background: url('<?php echo base_url("uploads/img/library_background.jpg"); ?>') no-repeat center center;
            background-size: cover;
        }

        .card {
            transition: transform .2s;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('uploads/img/logo.png'); ?>" alt="Logo Perpustakaan SMP" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Koleksi Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-login" href="<?php echo site_url('auth/login'); ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <header class="bg-primary text-white text-center py-5" data-aos="fade-down" data-aos-duration="1000">
            <h1>Selamat Datang di Perpustakaan</h1>
            <h2>SMP Unggulan Aisyiyah Bantul</h2>
        </header>

        <!-- Tentang Kami Section -->
        <section style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
            <div class="container py-5">
                <h3 class="text-center mb-4" data-aos="fade-down">Tentang Kami</h3>

                <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-8 text-center">
                        <img src="<?php echo base_url('uploads/img/logo.png'); ?>" alt="Logo Perpustakaan" class="img-fluid rounded shadow-lg mb-4" style="width: 40%;">
                    </div>
                </div>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="col-md-8 text-center">
                        <h4 class="mb-3">Visi</h4>
                        <p class="mb-4">Terwujudnya Insan Islami yang Kaffah, Unggul dalam Kecerdasan dan Peduli Lingkungan serta Berwawasan Global.</p>

                        <h4 class="mb-3">Misi</h4>
                        <p class="mb-4">Melaksanakan berbagai kegiatan keagamaan dan budaya islami sehingga menjadi sumber kearifan dalam bertindak di kehidupan sehari-hari secara kaffah, menuju tujuan Muhammadiyah yang berkemajuan
                            Menciptakan budaya tertib ibadah untuk mendapat berkah dan hasil yang maksimal
                            Melaksanakan kegiatan menuju sekolah Muhammadiyah/Aisyiyah sebagai lembaga kaderisasi
                            Melaksanakan pelayanan pembelajaran dan bimbingan secara PAIKEM dengan mengintegrasikan PPK, literasi, ketrampilan 4C (Creative, Critical thinking, Communicative, Collaborative) dan HOTS (High Order Thinking Skill), penguatan enam profil pelajar pancasila,sehingga peserta didik dapat berkembang secara optimal, sesuai dengan potensi yang dimiliki
                            Menumbuhkan semangat berprestasi kepada semua warga sekolah melalui pengembangan diri sesuai dengan bakat dan minat
                            Menciptakan lingkungan sekolah yang sehat, bersih, rindang, aman dan nyaman serta bebas narkoba dan tanggap bencana
                            Melaksanakan pembelajaran dengan memanfaatkan teknologi dan informasi
                            Mengembangkan kemampuan bahasa daerah, bahasa Indonesia, dan bahasa asing.</p>

                        <h4 class="mb-3">Indikator Visi</h4>
                        <p>1. Terwujudnya kegiatan berbasis keislaman yang berkualitas/militan <br>
                            2. Terwujudnya kader Muhammadiyah/Aisyiyah, umat dan bangsa <br>
                            3. Terwujudnya prestasi akademik dan non akademik yang bermutu tinggi <br>
                            4. Terwujudnya kepedulian lingkungan yang sehat, bersih, rindang, aman, dan nyaman <br>
                            5. Terwujudnya kompetensi dalam bidang teknologi informasi dan bahasa yang handal</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Koleksi Buku Section -->
        <div class="container mt-5" data-aos="fade-up" data-aos-duration="1500">
            <h3 class="text-center mb-4">Koleksi Buku</h3>
            <div class="row">
                <?php foreach ($buku as $bk) : ?>
                    <div class="col-md-3 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <img src="<?php echo base_url('uploads/' . $bk['sampul']); ?>" alt="Sampul" class="card-img-top">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $bk['judul']; ?></h5>
                                <p class="card-text flex-fill">
                                    <strong>Tahun:</strong> <?php echo $bk['tahun_buku']; ?><br>
                                    <strong>ISBN:</strong> <?php echo $bk['nomor_isbn']; ?><br>
                                    <strong>Pengarang:</strong> <?php echo $bk['pengarang']; ?><br>
                                    <strong>Penerbit:</strong> <?php echo $bk['penerbit']; ?><br>
                                    <strong>Rak:</strong> <?php echo $bk['nama_rak']; ?><br>
                                    <strong>Kategori:</strong> <?php echo $bk['nama_kategori']; ?><br>
                                    <strong>Stok:</strong> <?php echo $bk['stok_buku']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        &copy; 2023 Perpustakaan SMP Unggulan Aisyiyah Bantul - Semua Hak Cipta Dilindungi.
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
