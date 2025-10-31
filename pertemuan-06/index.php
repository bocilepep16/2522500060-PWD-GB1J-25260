<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Selamat Datang</h2>
            <p>Ini contoh paragraf HTML.</p>
            <?php 
            echo "Halo Dunia!<br>";
            echo "Nama Saya Catherine";
            ?>
        </section>
        <section id="about">
            <?php
            $nim = "2522500060";
            $nama = "Catherine Audreylia Diony";
            $tempatlahir = "Pangkalpinang";
            $tangallahhir = "30 Juni 2007";
            $hobi = "Olahraga & Menonton Drakor";
            $pasangan = "Belum ada";
            $pekerjaan = "Mahasiswa";
            $namaorangtua = "Bapak Bong Sui Kong dan Ibu Susanti";
            $namakakak = "Yohan dan Nicholas";
            $namaadik = "Calvin dan Justin";
            ?>
            <h2>Tentang Saya</h2>
            <p><strong>NIM:</strong> <?php echo $nim;?> </p>
            <p><strong>Nama Lengkap:</strong> <?php echo $nama;?> &#128526;</p>
            <p><strong>Tempat Lahir:</strong> <?php echo $tempatlahir;?> </p>
            <p><strong>Tanggal Lahir:</strong> <?php echo $tangallahhir;?> </p>
            <p><strong>Hobi:</strong> <?php echo $hobi;?> &#128512;</p>
            <p><strong>Pasangan:</strong> <?php echo $pasangan;?> &hearts;</p>
            <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan;?> &copy; 2025</p>
            <p><strong>Nama Orang Tua:</strong> <?php echo $namaorangtua;?> </p>
            <p><strong>Nama Kakak:</strong> <?php echo $namakakak;?></p>
            <p><strong>Nama Adik:</strong> <?php echo $namaadik;?></p>
        </section>
        <section id="contact">
            <h2>Kontak Saya</h2>
            <form action="" method="get">
                <label for="txtNama"><span>Nama:</span>
                    <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama" required
                        autocomplete="name">
                </label>

                <label for="txtEmail"><span>Email:</span>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required
                        autocomplete="email">
                </label>

                <label for="txtPesan"><span>Pesan Anda:</span>
                    <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
                    <small id="charCount">0/200 Karakter</small>
                </label>

                <button type="submit">kirim </button>
                <button type="reset">Batal </button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; &#9786; 2025 Catherine Audreylia Diony 2522500060</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>