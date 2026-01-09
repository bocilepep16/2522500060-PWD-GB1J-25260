<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  /*
    Ambil nilai nim dari GET dan lakukan validasi untuk 
    mengecek nim harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya nim harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $nim = filter_input(INPUT_GET, 'nim', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
  /*
    Skrip di atas cara penulisan lamanya adalah:
    $nim = $_GET['nim'] ?? '';
    $nim = (int)$nim;

    Cara lama seperti di atas akan mengambil data mentah 
    kemudian validasi dilakukan secara terpisah, sehingga 
    rawan lupa validasi. Untuk input dari GET atau POST, 
    filter_input() lebih disarankan daripada $_GET atau $_POST.
  */

  /*
    Cek apakah $nim bernilai valid:
    Kalau $nim tidak valid, maka jangan lanjutkan proses, 
    kembalikan pengguna ke halaman awal (read.php) sembari 
    mengirim penanda error.
  */
  if (!$nim) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
  $stmt = mysqli_prepare($conn, "SELECT nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orangtua, nama_kakak, 	nama_adik
                                    FROM mahasiswa WHERE nim = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $nim);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$nim) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
  }

  #Nilai awal (prefill form)
  $nim  = $row['nim'] ?? '';
  $nama = $row['nama_lengkap'] ?? '';
  $tempat = $row['tempat_lahir'] ?? '';
  $tanggal  = $row['tanggal_lahir'] ?? '';
  $hobi = $row['hobi'] ?? '';
  $pasangan = $row['pasangan'] ?? '';
  $pekerjaan  = $row['pekerjaan'] ?? '';
  $ortu = $row['nama_orangtua'] ?? '';
  $kakak = $row['nama_kakak'] ?? '';
  $adik  = $row['nama_adik'] ?? '';

  #Ambil error dan nilai old input kalau ada
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old']);
  if (!empty($old)) {
    $nim  = $old['nim'] ?? $nim;
    $nama = $old['nama_lengkap'] ?? $nama;
    $tempat = $old['tempat_lahir'] ?? $tempat;
    $tanggal = $old['tanggal_lahir'] ?? $tanggal;
    $hobi = $old['hobi'] ?? $hobi;
    $pasangan = $old['pasangan'] ?? $pasangan;
    $pekerjaan  = $old['pekerjaan'] ?? $pekerjaan;
    $ortu = $old['nama_orangtua'] ?? $ortu;
    $tempat = $kakak['nama_kakak'] ?? $kakak;
    $nim  = $adik['nama_adik'] ?? $adik;
  }
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <section id="biodata">
        <h2>Edit Biodata Mahasiswa</h2>
        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
        <form action="proses_update.php" method="POST">

        <input type="text" name="nim" value="<?= (int)$nim; ?>" readonly>

        <label for="txtNmLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmLengkap" name="txtNmLengkap" 
          placeholder="Masukkan Nama Lengkap" required
           value="<?= !empty($nama) ? $nama : '' ?>">
        </label>

        <label for="txtT4Lhr"><span>Tempat Lahir:</span>
          <input type="text" id="txtT4Lhr" name="txtT4Lhr" 
          placeholder="Masukkan Tempat Lahir" required
          value="<?= !empty($tempat) ? $tempat : '' ?>">
        </label>

        <label for="txtTglLhr"><span>Tanggal Lahir:</span>
          <input type="date" id="txtTglLhr" name="txtTglLhr" 
          placeholder="Masukkan Tanggal Lahir" required
          value="<?= !empty($tanggal) ? $tanggal : '' ?>">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" 
          placeholder="Masukkan Hobi" required
          value="<?= !empty($hobi) ? $hobi : '' ?>">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" 
          placeholder="Masukkan Pasangan" required
          value="<?= !empty($pasangan) ? $pasangan : '' ?>">
        </label>

        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerja" 
          placeholder="Masukkan Pekerjaan" required
          value="<?= !empty($pekerjaan) ? $pekerjaan : '' ?>">
        </label>

        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtu" 
          placeholder="Masukkan Nama Orang Tua" required
          value="<?= !empty($ortu) ? $ortu : '' ?>">
        </label>

        <label for="txtNmKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNmKakak" name="txtNmKakak" 
          placeholder="Masukkan Nama Kakak" required
          value="<?= !empty($kakak) ? $kakak : '' ?>">
        </label>

        <label for="txtNmAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNmAdik" name="txtNmAdik" 
          placeholder="Masukkan Nama Adik" required
           value="<?= !empty($adik) ? $adik : '' ?>">
        </label>

          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
          <a href="read.php" class="reset">Kembali</a>
        </form>
      </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>