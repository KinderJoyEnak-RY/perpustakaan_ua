<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kartu Anggota Perpus</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card-container {
            display: grid;
            grid-template-columns: 1fr 120px;
            grid-template-rows: auto;
            gap: 20px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 640px;
            width: 100%;
            box-sizing: border-box;
        }

        .card-header {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: auto 1fr auto;
            align-items: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 20px;
            position: relative;
            /* Untuk positioning absolut nama sekolah */
        }

        .logo {
            width: 60px;
            height: auto;
            margin-right: 15px;
        }

        .school-name {
            font-weight: bold;
            font-size: 1.4em;
            color: #007bff;
            text-align: center;
            /* Center the school name */
        }

        .title {
            grid-column: 1 / -1;
            text-align: center;
            font-size: 1.6em;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .card-content {
            grid-column: 1;
        }

        .profile-pic {
            grid-column: 2;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            justify-self: center;
        }

        .card-content p {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        .label {
            width: 100px;
            /* Adjust width as needed */
            display: inline-block;
            text-align: right;
            /* Right align the labels */
            margin-right: 10px;
            /* Space before the colon */
        }
    </style>
</head>

<body>
    <main class="card-container">
        <div class="card-header">
            <img src="<?= base_url('uploads/img/logo.png'); ?>" alt="Logo Sekolah" class="logo">
            <span class="school-name">SMP Unggulan Aisyiyah Bantul</span>
        </div>
        <div class="title">Kartu Anggota Perpustakaan</div>
        <div class="card-content">
            <p><span class="label">ID Anggota</span>: <?= $anggota['id'] ?></p>
            <p><span class="label">Nama</span>: <?= $anggota['nama'] ?></p>
            <p><span class="label">Kelas/Jabatan</span>: <?= $anggota['kelas'] ?></p>
            <p><span class="label">NIS</span>: <?= $anggota['nis'] ?></p>
            <p><span class="label">Telepon</span>: <?= $anggota['telefon'] ?></p>
            <p><span class="label">Email</span>: <?= $anggota['email'] ?></p>
            <p><span class="label">Role</span>: <?= $anggota['role'] ?></p>
        </div>
        <img src="<?= base_url('uploads/profil_anggota/' . $anggota['profil']); ?>" alt="Foto Profil" class="profile-pic">
    </main>
</body>

</html> -->


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kartu Anggota Perpustakaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <style>
        .title {
            text-align: center;
            margin: 20px 0;
            font-size: 1.5rem;
        }

        .card-content p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <main class="container">
        <div class="card-container" style="max-width: 500px; margin: auto; border: 1px solid #ccc; padding: 20px;">
            <div class="card-header" style="display: flex; align-items: center; margin-bottom: 20px;">
                <img src="<?= base_url('uploads/img/logo.png'); ?>" alt="Logo Sekolah" class="logo" style="height: 80px; margin-right: 20px;">
                <span class="school-name" style="font-weight: bold;">SMP Unggulan Aisyiyah Bantul</span>
            </div>
            <hr>
            <div class="title" style="text-align: center; margin: 20px 0; font-size: 1.5rem;">Kartu Anggota Perpustakaan</div>
            <div class="card-content" style="display: grid; grid-template-columns: 1fr 2fr; column-gap: 20px; align-items: start;">
                <img src="<?= base_url('uploads/profil_anggota/' . $anggota['profil']); ?>" alt="Foto Profil" class="profile-pic" style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; grid-row: 1 / span 6;">
                <div>
                    <p><span class="label">ID Anggota:</span> <?= $anggota['id'] ?></p>
                    <p><span class="label">Nama:</span> <?= $anggota['nama'] ?></p>
                    <p><span class="label">Kelas:</span> <?= $anggota['kelas'] ?></p>
                    <p><span class="label">NIS:</span> <?= $anggota['nis'] ?></p>
                    <p><span class="label">Telepon:</span> <?= $anggota['telefon'] ?></p>
                    <p><span class="label">Email:</span> <?= $anggota['email'] ?></p>
                    <p><span class="label">Role:</span> <?= $anggota['role'] ?></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>