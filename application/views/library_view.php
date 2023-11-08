<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan SMP Unggulan Aisyiyah Bantul</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('uploads/img/logo.png'); ?>">
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

        .modal-content {
            font-size: 14px;
        }

        .info-icon {
            cursor: pointer;
            color: #007BFF;
            margin-left: 10px;
        }

        .modal-backdrop {
            z-index: -1;
        }

        .row.overflow-auto {
            scroll-behavior: smooth;
        }

        /* CSS untuk tombol kembali ke atas */
        #btnTop {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #343a40;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 50%;
            font-size: 18px;
        }

        #btnTop:hover {
            background-color: #555;
        }

        /* Pastikan semua card memiliki ukuran yang sama */
        .card {
            width: 230px;
            /* Atur lebar card */
            height: 540px;
            /* Atur tinggi card */
            margin: 0 auto;
            /* Tambahkan margin auto untuk centering jika diperlukan */
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            /* Gambar akan menutupi seluruh area yang ditentukan */
        }

        .card-title {
            font-size: 0.8em;
            /* Atur ukuran font judul buku lebih kecil */
        }

        /* Tambahkan kelas baru untuk mengontrol gambar sampul buku */
        .card-img-cover {
            width: 100%;
            /* Lebar gambar akan mengikuti lebar card */
            height: 300px;
            /* Atur tinggi gambar */
            object-fit: cover;
            /* Gambar akan dipaksa menutupi area yang ditentukan */
        }

        /* Tambahkan ini untuk memperbaiki tampilan pada ukuran layar yang lebih kecil */
        @media (max-width: 768px) {
            .card {
                width: 150px;
                /* Lebar card lebih kecil untuk layar yang lebih kecil */
                height: 300px;
                /* Tinggi card lebih kecil untuk layar yang lebih kecil */
            }

            .card-img-cover {
                height: 150px;
                /* Tinggi gambar lebih kecil untuk layar yang lebih kecil */
            }

            .card-title {
                font-size: 0.7em;
                /* Ukuran font judul lebih kecil untuk layar yang lebih kecil */
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
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
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#koleksi-buku">Koleksi Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-login" href="<?php echo site_url('auth/login'); ?>">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <!-- Header Section -->
        <header class="bg-primary text-white text-center py-5" data-aos="fade-down" data-aos-duration="1000" id="beranda">
            <h1>Selamat Datang di Perpustakaan</h1>
            <h2>SMP Unggulan Aisyiyah Bantul</h2>
        </header>

        <!-- Divider Line -->
        <hr style="margin: 0; border-color: #ccc;">
        <!-- Tentang Kami Section -->
        <section id="tentang-kami">
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
                        <p class="mb-4">
                            Terwujudnya Insan Islami yang Kaffah, Unggul dalam Kecerdasan dan Peduli Lingkungan serta Berwawasan Global.
                        </p>

                        <div id="hiddenContent" style="display: none;">
                            <h4 class="mb-3">Misi</h4>
                            <ol>
                                <li>Melaksanakan berbagai kegiatan keagamaan dan budaya islami sehingga menjadi sumber kearifan dalam bertindak di kehidupan sehari-hari secara kaffah, menuju tujuan Muhammadiyah yang berkemajuan.</li>
                                <li>Menciptakan budaya tertib ibadah untuk mendapat berkah dan hasil yang maksimal.</li>
                                <li>Melaksanakan kegiatan menuju sekolah Muhammadiyah/Aisyiyah sebagai lembaga kaderisasi.</li>
                                <li>Melaksanakan pelayanan pembelajaran dan bimbingan secara PAIKEM dengan mengintegrasikan PPK, literasi, ketrampilan 4C (Creative, Critical thinking, Communicative, Collaborative) dan HOTS (High Order Thinking Skill), penguatan enam profil pelajar pancasila, sehingga peserta didik dapat berkembang secara optimal, sesuai dengan potensi yang dimiliki.</li>
                                <li>Menumbuhkan semangat berprestasi kepada semua warga sekolah melalui pengembangan diri sesuai dengan bakat dan minat.</li>
                                <li>Menciptakan lingkungan sekolah yang sehat, bersih, rindang, aman dan nyaman serta bebas narkoba dan tanggap bencana.</li>
                                <li>Melaksanakan pembelajaran dengan memanfaatkan teknologi dan informasi.</li>
                                <li>Mengembangkan kemampuan bahasa daerah, bahasa Indonesia, dan bahasa asing.</li>
                            </ol>

                            <h4 class="mb-3">Indikator Visi</h4>
                            <ol>
                                <li>Terwujudnya kegiatan berbasis keislaman yang berkualitas/militan.</li>
                                <li>Terwujudnya kader Muhammadiyah/Aisyiyah, umat dan bangsa.</li>
                                <li>Terwujudnya prestasi akademik dan non akademik yang bermutu tinggi.</li>
                                <li>Terwujudnya kepedulian lingkungan yang sehat, bersih, rindang, aman, dan nyaman.</li>
                                <li>Terwujudnya kompetensi dalam bidang teknologi informasi dan bahasa yang handal.</li>
                            </ol>
                        </div>

                        <!-- Tombol Tampilkan Selengkapnya -->
                        <button id="showMoreBtn" class="btn btn-warning mt-3">Tampilkan Selengkapnya</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider Line -->
        <hr style="margin: 0; border-color: #ccc;">
        <!-- Koleksi Buku Section -->
        <section id="koleksi-buku">
            <div class="container mt-5" data-aos="fade-up" data-aos-duration="1500">
                <h3 class="text-center mb-4">Koleksi Buku</h3>
                <div class="row overflow-auto" style="white-space: nowrap; flex-wrap: nowrap;">
                    <?php foreach ($buku as $bk) : ?>
                        <div class="col-md-3 mb-4 d-flex align-items-stretch" style="display: inline-block;">
                            <div class="card">
                                <img src="<?php echo base_url('uploads/sampul/' . $bk['sampul']); ?>" alt="Sampul" class="card-img-top card-img-cover">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5 class="card-title text-center">
                                        <b><?php echo $bk['judul']; ?></b>
                                    </h5>
                                    <!-- Tempat QR Code -->
                                    <img src="<?php echo base_url('uploads/qrcodes/qrbuku/' . $bk['qr_code']); ?>" alt="QR Code" class="qr-code-img">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Divider Line -->
        <hr style="margin: 20; border-color: #ccc;">
        <!-- Kontak Section -->
        <section id="kontak">
            <div class="container py-5">
                <h3 class="text-center mb-4" data-aos="fade-down">Kontak Kami</h3>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <h5 class="mb-3">Kirim Pesan</h5>
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Anda" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email Anda" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Pesan Anda" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>

                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <h5 class="mb-3">Informasi Kontak</h5>
                        <p><strong>Alamat:</strong> Jl. Ir. H. Juanda No.103, Area Sawah, Trirenggo, Kec. Bantul, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55714</p>
                        <p><strong>Telepon:</strong> (0274) 368423</p>
                        <p><strong>Email:</strong> info@perpustakaansmpaisyiyahbantul.com</p>

                        <!-- Opsional: Peta Lokasi -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.9781771728844!2d110.3383693!3d-7.897348399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a558d18d77397%3A0xbfe476939b51fe7c!2sSMP%20Unggulan%20Aisyiyah%20Bantul!5e0!3m2!1sid!2sid!4v1698771531121!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <button id="btnTop" title="Kembali ke Atas">&#8679;</button>

    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        &copy; 2023 Perpustakaan UA Bantul - Semua Hak Cipta Dilindungi.
    </footer>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();

            // Fungsi untuk tombol kembali ke atas
            let btnTop = document.getElementById("btnTop");

            window.onscroll = function() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    btnTop.style.display = "block";
                } else {
                    btnTop.style.display = "none";
                }
            };

            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

            // Event listener untuk tombol btnTop
            document.getElementById("btnTop").addEventListener("click", function() {
                topFunction();
            });

            // Fungsi untuk menampilkan konten yang disembunyikan
            document.getElementById('showMoreBtn').addEventListener('click', function() {
                let hiddenContent = document.getElementById('hiddenContent');
                if (hiddenContent.style.display === 'none') {
                    hiddenContent.style.display = 'block';
                    this.textContent = 'Tampilkan Lebih Sedikit';
                } else {
                    hiddenContent.style.display = 'none';
                    this.textContent = 'Tampilkan Selengkapnya';
                }
            });

            let row = document.querySelector('.row.overflow-auto');
            let scrollingForward = true; // Variabel untuk menentukan arah scroll

            // Fungsi smooth scroll otomatis
            function smoothScroll(element, direction, distance) {
                let start = null;
                let step = direction * (distance / 4); // asumsi 10 frame untuk pergerakan

                function animate(timestamp) {
                    if (!start) start = timestamp;
                    let progress = timestamp - start;
                    element.scrollLeft += step;
                    if (progress < 10) {
                        window.requestAnimationFrame(animate);
                    }
                }
                window.requestAnimationFrame(animate);
            }

            // Opsional: Scroll otomatis
            let autoScroll = setInterval(function() {
                if (scrollingForward && row.scrollLeft >= (row.scrollWidth - row.clientWidth)) {
                    scrollingForward = false; // Ubah arah scroll
                } else if (!scrollingForward && row.scrollLeft <= 0) {
                    scrollingForward = true; // Ubah arah scroll
                }

                smoothScroll(row, scrollingForward ? 1 : -1, 10); // Jika scrollingForward true, arah 1 (kanan), jika false, arah -1 (kiri)
            }, 100);
        });
    </script>


</body>

</html>