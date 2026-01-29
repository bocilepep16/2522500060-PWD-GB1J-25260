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
$no  = bersihkan($_POST['txtNoAng']  ?? '');
$nama = bersihkan($_POST['txtNmAng'] ?? '');
$jabatan = bersihkan($_POST['txtJabAng'] ?? '');
$tanggal = bersihkan($_POST['txtTglJadi'] ?? '');
$skill  = bersihkan($_POST['txtSkill']  ?? '');
$gaji = bersihkan($_POST['txtGaji'] ?? '');
$nowa = bersihkan($_POST['txtNoWA'] ?? '');
$batalion = bersihkan($_POST['txBatalion'] ?? '');
$bb = bersihkan($_POST['txtBB'] ?? '');
$tb = bersihkan($_POST['txtTB'] ?? '');

#Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

if ($no === '') {
  $errors[] = 'No wajib diisi.';
}
if ($nama === '') {
  $errors[] = 'nama wajib diisi.';
}
if ($jabatan === '') {
  $errors[] = 'jabatan wajib diisi.';
}
if ($tanggal === '') {
  $errors[] = 'tanggal wajib diisi.';
}
if ($skill === '') {
  $errors[] = 'Kemampuan wajib diisi.';
}
if ($gaji === '') {
  $errors[] = 'Gaji wajib diisi.';
}
if ($nowa === '') {
  $errors[] = 'No wa wajib diisi.';
}
if ($batalion === '') {
  $errors[] = 'Batalion anggota wajib diisi.';
}
if ($bb === '') {
  $errors[] = 'Berat badan wajib diisi.';
}
if ($tb === '') {
  $errors[] = 'Tinggi Badan wajib diisi.';
}

if (mb_strlen($no) < 10) {
  $errors[] = 'No Anggota minimal 10 karakter.';
}
if (mb_strlen($nama) > 25) {
  $errors[] = 'nama maksimal 25 karakter.';
}
if (mb_strlen($jabatan) < 10) {
  $errors[] = 'Jabatan minimal 10 karakter.';
}
if (mb_strlen($tanggal) < 5) {
  $errors[] = 'tanggal minimal 5 karakter.';
}
if (mb_strlen($skill) > 15) {
  $errors[] = 'skill maksimal 15 karakter.';
}
if (mb_strlen($gaji) < 10) {
  $errors[] = 'gaji minimal 10 karakter.';
}
if (mb_strlen($nowa) < 12) {
  $errors[] = 'nowa minimal 12 karakter.';
}
if (mb_strlen($batalion) < 10) {
  $errors[] = 'batalion minimal 10 karakter.';
}
if (mb_strlen($bb) > 3) {
  $errors[] = 'beratbadan maksimal 3 karakter.';
}
if (mb_strlen($tb) > 3) {
  $errors[] = 'tinggi badan maksimal 3 karakter.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['old'] = [
    'nomor_anggota'  => $no,
    'nama_anggota' => $nama,
    'jabatan_anggota' => $jabatan,
    'tanggal_jadi' => $tanggal,
    'kemampuan_anggota'  => $skill,
    'gaji_anggota' => $gaji,
    'nomor_wa' => $nowa,
    'batalion_anggota' => $batalion,
    'berat_badan'  => $bb,
    'tinggi_badan' => $tb,
  ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#anggota');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO anggota (nomor_anggota, nama_anggota, jabatan_anggota, tanggal_jadi, kemampuan_anggota, gaji_anggota, nomor_wa, batalion_anggota, tinggi_badan, 	berat_badan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#anggota');
}

$arrAnggota = [
  "noang" => $_POST["txtNoAng"] ?? "",
  "nama" => $_POST["txtNmAng"] ?? "",
  "jabatan" => $_POST["txtJabAng"] ?? "",
  "tanggal" => $_POST["txtTglJadi"] ?? "",
  "skill" => $_POST["txtSkill"] ?? "",
  "gaji" => $_POST["txtGaji"] ?? "",
  "nowa" => $_POST["txtNoWA"] ?? "",
  "batalion" => $_POST["txBatalion"] ?? "",
  "bb" => $_POST["txtBB"] ?? "",
  "tb" => $_POST["txtTB"] ?? ""
];
$_SESSION["anggota"] = $arrAnggota;

header("location: index.php#anggota");
