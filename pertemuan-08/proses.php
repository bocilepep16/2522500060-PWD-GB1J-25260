<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;
header("location: index.php");
?>

<?php
session_start();
$sesnim = $_POST["txtNim"];
$sesnama= $_POST["txtNama"];
$sestempat = $_POST["txtTempat"];
$sestanggal = $_POST["txtTanggal"];
$seshobi = $_POST["txtHobi"];
$sespasangan = $_POST["txtPasangan"];
$sespekerjaan = $_POST["txtPekerjaan"];
$sesnamaortu = $_POST["txtNamaOrtu"];
$seskakak = $_POST["txtKakak"];
$sesadik = $_POST["txtPesan"];

$_SESSION["sesnim"] = $sesnim;
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sestempat"] = $sestempat;
$_SESSION["sestanggal"] = $sestanggal;
$_SESSION["seshobi"] = $seshobi;
$_SESSION["sespasangan"] = $sespasangan;
$_SESSION["sespekerjaan"] = $sespekerjaan;
$_SESSION["sesnamaortu"] = $sesnamaortu;
$_SESSION["seskakak"] = $seskakak;
$_SESSION["sesadik"] = $sesadik;

header("location: index.php");
?>