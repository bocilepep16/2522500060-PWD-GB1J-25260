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
                <li><a href="#ipk">Nilai</a></li>
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
        <section id="ipk">
            <?php
            echo "<h2>Perhitungan Nilai Akhir, Grade, dan IPK</h2>";

            $namaMatkul1 = "Algoritma dan Struktur Data";
            $namaMatkul2 = "Agama";
            $namaMatkul3 = "Pengantar Basis Data";
            $namaMatkul4 = "Pengantar Teknologi Informasi";
            $namaMatkul5 = "Pemrograman Web Dasar";

            $sksMatkul1 = 4;
            $sksMatkul2 = 2;
            $sksMatkul3 = 2;
            $sksMatkul4 = 3;
            $sksMatkul5 = 3;

            $nilaiHadir1 = 90; $nilaiTugas1 = 60; $nilaiUTS1 = 80; $nilaiUAS1 = 70;
            $nilaiHadir2 = 70; $nilaiTugas2 = 50; $nilaiUTS2 = 60; $nilaiUAS2 = 80;
            $nilaiHadir3 = 85; $nilaiTugas3 = 70; $nilaiUTS3 = 80; $nilaiUAS3 = 90;
            $nilaiHadir4 = 80; $nilaiTugas4 = 60; $nilaiUTS4 = 65; $nilaiUAS4 = 70;
            $nilaiHadir5 = 69; $nilaiTugas5 = 80; $nilaiUTS5 = 90; $nilaiUAS5 = 100;

    function hitungGrade($nilai) {
        if ($nilai >= 91) return ["A", 4.00];
        elseif ($nilai >= 81) return ["A-", 3.70];
        elseif ($nilai >= 76) return ["B+", 3.30];
        elseif ($nilai >= 71) return ["B", 3.00];
        elseif ($nilai >= 66) return ["B-", 2.70];
        elseif ($nilai >= 61) return ["C+", 2.30];
        elseif ($nilai >= 56) return ["C", 2.00];
        elseif ($nilai >= 51) return ["C-", 1.70];
        elseif ($nilai >= 36) return ["D", 1.00];
        else return ["E", 0.00];
    }

    function nilaiAkhir($hadir, $tugas, $uts, $uas) {
        return (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
    }

        $mataKuliah = [
            [$namaMatkul1, $sksMatkul1, $nilaiHadir1, $nilaiTugas1, $nilaiUTS1, $nilaiUAS1],
            [$namaMatkul2, $sksMatkul2, $nilaiHadir2, $nilaiTugas2, $nilaiUTS2, $nilaiUAS2],
            [$namaMatkul3, $sksMatkul3, $nilaiHadir3, $nilaiTugas3, $nilaiUTS3, $nilaiUAS3],
            [$namaMatkul4, $sksMatkul4, $nilaiHadir4, $nilaiTugas4, $nilaiUTS4, $nilaiUAS4],
            [$namaMatkul5, $sksMatkul5, $nilaiHadir5, $nilaiTugas5, $nilaiUTS5, $nilaiUAS5],
        ];

    $totalBobot = 0;
    $totalSKS = 0;
    $i = 1;

    foreach ($mataKuliah as $mk) {
        list($nama, $sks, $hadir, $tugas, $uts, $uas) = $mk;

        $akhir = nilaiAkhir($hadir, $tugas, $uts, $uas);
        list($grade, $mutu) = hitungGrade($akhir);
        $bobot = $mutu * $sks;
        $status = ($grade == "D" || $grade == "E") ? "Gagal" : "Lulus";

            echo "<h3>Nama Mata Kuliah ke-$i : $nama</h3>";
            echo "SKS : $sks<br>";
            echo "Kehadiran : $hadir<br>";
            echo "Tugas : $tugas<br>";
            echo "UTS : $uts<br>";
            echo "UAS : $uas<br>";
            echo "Nilai Akhir : " . number_format($akhir, 2) . "<br>";
            echo "Grade : $grade<br>";
            echo "Angka Mutu : $mutu<br>";
            echo "Bobot : $bobot<br>";
            echo "Status : $status<br><hr>";
            $totalBobot += $bobot;
            $totalSKS += $sks;
            $i++;
    }   
        $IPK = $totalBobot / $totalSKS;

        echo "<h3>Total Bobot = $totalBobot</h3>";
        echo "<h3>Total SKS = $totalSKS</h3>";
        echo "<h3>IPK = " . number_format($IPK, 2) . "</h3>";
        ?>
        </section>

    </main>
    <footer>
        <p>&copy; &#9786; 2025 Catherine Audreylia Diony 2522500060</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>