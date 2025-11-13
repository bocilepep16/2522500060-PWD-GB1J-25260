<?php
session_start();
$sesemail = $_SESSION["txtEmail"] ?? "";
$sespesan = $_SESSION["txtPesan"] ?? "";
$sesnim = $_SESSION["sesnim"] ?? "";
$sesnama = $_SESSION["txtnamalengkap"] ?? "";  
$sestempatlahir = $_SESSION["txttempatlahir"] ?? "";
$sestanggallahir = $_SESSION["txttanggallahir"] ?? "";
$seshobi = $_SESSION["txthobi"] ?? "";
$sespasangan = $_SESSION["txtpasangan"] ?? "";
$sespekerjaan = $_SESSION["txtpekerjaan"] ?? "";
$sesnamaortu = $_SESSION["txtnamaortu"] ?? "";
$sesnamakakak = $_SESSION["txtnamakakak"] ?? "";
$sesnamaadik = $_SESSION["txtnamaadik"] ?? "";
?>
<!DOCTYPE html>
<html lang="en">

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
        <li><a href="#biodata">Biodata</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="biodata">
      <h2>Biodata Sederhana Mahasiswa</h2>
      <form action="proses.php" method="POST">

        <label for="txtNim"><span>Nim:</span>
          <input type="text" id="txtNim" name="txtNim" placeholder="Masukkan Nim" required autocomplete="nim">
        </label>

        <label for="txtNama"><span>Nama Lengkap:</span>
          <input type="Nama" id="txtNama" name="txtNama" placeholder="Masukkan Nama" required autocomplete="Nama">
        </label>

        <label for="txtTempat"><span>Tempat Lahir:</span>
          <textarea id="txtTempat" name="txtTempat" placeholder="Tulis tempat lahir anda..." required></textarea>
        </label>

         <label for="txtTanggal"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTanggal" name="txtTanggal" placeholder="Masukkan Tanggal Lahir Anda" required autocomplete="tanggal lahir">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="Hobi" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi Anda" required autocomplete="Hobi">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <textarea id="txtPasangan" name="txtPasangan" placeholder="Tulis pasangan anda" required></textarea>
        </label>

         <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan" required autocomplete="pekerjaan">
        </label>

        <label for="txtNamaOrtu"><span>Nama Orang Tua:</span>
          <input type="Nama" id="txtOrtu" name="txtOrtu" placeholder="Masukkan Nama Orang Tua" required autocomplete="Nama Orang Tua">
        </label>

        <label for="txtKakak"><span>Nama kakak:</span>
          <textarea id="txtkakak" name="txtkakak" placeholder="Tulis Nama Kakak" required></textarea>
        </label>

         <label for="txtAdik"><span>Nama Adik:</span>
          <textarea id="txtadik" name="txtadik" placeholder="Tulis Nama Adik" required></textarea>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
      
    <section id="about">
      <?php
          $nim = "2522500060;";
          $Nama_Lengkap = "Catherine Audreylia Diony;";
          $Tempat_Lahir = "Pangkalpinang";
          $Tanggal_Lahir = "30 Juni 2007";
          $hobi = "Memasak";
          $Pasangan = "tidak ada";
          $Pekerjaan = "mahasiswa";
          $Nama_orang_tua ="Bocil";
          $Nama_kakak = "Epep";
          $Nama_adik = "ratu";
      ?>
     <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong><?php echo $sesnim?></p>
      <p><strong>Nama Lengkap:</strong><?php echo $sesnama?></p>
      <p><strong>Tempat Lahir:</strong><?php echo $sestempatlahir?></p>
      <p><strong>Tanggal Lahir:</strong><?php echo $sestanggallahir?> </p>
      <p><strong>Hobi:</strong><?php echo $seshobi?> </p>
      <p><strong>Pasangan:</strong> <?php echo $sespasangan ?></p>
      <p><strong>Pekerjaan:</strong><?php echo $sespekerjaan?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $sesnamaortu?></p>
      <p><strong>Nama Kakak:</strong> <?php echo $sesnamakakak?></p>
      <p><strong>Nama Adik:</strong> <?php echo $sesnamaadik?></p>
    </section>


    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>