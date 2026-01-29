<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

/*
	ikuti cara penulisan proses.php untuk validasi, sanitasi, RPG, data old
	dan insert ke tbl_tamu termasuk flash message ke index.php#anggota
	bedanya, kali ini diterapkan untuk anggota dosen bukan tamu
*/

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
  $errors[] = 'No Anggota wajib diisi.';
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
