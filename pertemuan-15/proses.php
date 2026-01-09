<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#about');
}

#ambil dan bersihkan nilai dari form
$nim  = bersihkan($_POST['txtNim']  ?? '');
$nama = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat = bersihkan($_POST['txtT4Lhr'] ?? '');
$tanggal = bersihkan($_POST['txtTglLhr'] ?? '');
$hobi  = bersihkan($_POST['txtHobi']  ?? '');
$pasangan = bersihkan($_POST['txtPasangan'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$ortu = bersihkan($_POST['txtNmOrtu'] ?? '');
$kakak = bersihkan($_POST['txtNmKakak'] ?? '');
$adik = bersihkan($_POST['txtNmAdik'] ?? '');


#Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

if ($nim === '') {
  $errors[] = 'Nim wajib diisi.';
}
if ($nama === '') {
  $errors[] = 'nama wajib diisi.';
}
if ($tempat === '') {
  $errors[] = 'tempatlahir wajib diisi.';
}
if ($tanggal === '') {
  $errors[] = 'tanggallahir wajib diisi.';
}
if ($hobi === '') {
  $errors[] = 'hobi wajib diisi.';
}
if ($pasangan === '') {
  $errors[] = 'Pasangan wajib diisi.';
}
if ($pekerjaan === '') {
  $errors[] = 'pekerjaan wajib diisi.';
}
if ($ortu === '') {
  $errors[] = 'nama ortu wajib diisi.';
}
if ($kakak === '') {
  $errors[] = 'Nama kakak wajib diisi.';
}
if ($adik === '') {
  $errors[] = 'nama adik wajib diisi.';
}

if (mb_strlen($nim) < 10) {
  $errors[] = 'Nim minimal 10 karakter.';
}
if (mb_strlen($nama) > 25) {
  $errors[] = 'nama maksimal 25 karakter.';
}
if (mb_strlen($tempat) < 10) {
  $errors[] = 'tempat minimal 10 karakter.';
}
if (mb_strlen($hobi) < 5) {
  $errors[] = 'hobi minimal 5 karakter.';
}
if (mb_strlen($pasangan) > 10) {
  $errors[] = 'pasangan maksimal 10 karakter.';
}
if (mb_strlen($pekerjaan) < 5) {
  $errors[] = 'pekerjaan minimal 5 karakter.';
}
if (mb_strlen($ortu) < 5) {
  $errors[] = 'namaortu minimal 5 karakter.';
}
if (mb_strlen($kakak) < 5) {
  $errors[] = 'Namakakak minimal 5 karakter.';
}
if (mb_strlen($adik) < 5) {
  $errors[] = 'namaadik minimal 5 karakter.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['old'] = [
    'nim'  => $nim,
    'nama' => $nama,
    'tempat' => $tempat,
    'tanggal' => $tanggal,
    'hobi'  => $hobi,
    'pasangan' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'ortu' => $ortu,
    'kakak'  => $kakak,
    'adik' => $adik,
  ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#about');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO mahasiswa (nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orangtua, nama_kakak, 	nama_adik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $nama, $tempat, $tanggal, $hobi, $pasangan, $pekerjaan, $ortu, $kakak, $adik);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#biodata'); #pola PRG: kembali ke form / halaman home
} else { #jika gagal, simpan kembali old value dan tampilkan error umum
  $_SESSION['old'] = [
    'nim'  => $nim,
    'nama' => $nama,
    'tempat' => $tempat,
    'tanggal' => $tanggal,
    'hobi'  => $hobi,
    'pasangan' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'ortu' => $ortu,
    'kakak'  => $kakak,
    'adik' => $adik,
  ];
  $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#about');
}
#tutup statement
mysqli_stmt_close($stmt);

$arrBiodata = [
  "nim" => $_POST["txtNim"] ?? "",
  "nama" => $_POST["txtNmLengkap"] ?? "",
  "tempat" => $_POST["txtT4Lhr"] ?? "",
  "tanggal" => $_POST["txtTglLhr"] ?? "",
  "hobi" => $_POST["txtHobi"] ?? "",
  "pasangan" => $_POST["txtPasangan"] ?? "",
  "pekerjaan" => $_POST["txtKerja"] ?? "",
  "ortu" => $_POST["txtNmOrtu"] ?? "",
  "kakak" => $_POST["txtNmKakak"] ?? "",
  "adik" => $_POST["txtNmAdik"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#biodata");
