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
     $sesnama = $_POST["txtNama"];
     $sestempat = $_POST["txtTempat"];
     $sestanggal = $_POST["txtTanggal"];
     $seshobi = $_POST["txtHobi"];
     $sespasangan = $_POST["txtPasangan"];
     $sespekerjaan = $_POST["txtPekerjaan"];
     $sesortu = $_POST["txtOrtu"];
     $seskakak = $_POST["txtKakak"];
     $sesadik = $_POST["txtAdik"];

     $_SESSION["txtNim"] = $sesnim;
     $_SESSION["txtNama"] = $sesnama;
     $_SESSION["txtTempat"] = $sestempat;
     $_SESSION["txtTanggal"] = $sestanggal;
     $_SESSION["txtHobi"] = $seshobi;
     $_SESSION["txtPasangan"] = $sespasangan;
     $_SESSION["txtPekerjaan"] = $sespekerjaan;
     $_SESSION["txtOrtu"] = $sesortu;
     $_SESSION["txtKakak"] = $seskakak;
     $_SESSION["txtAdik"] = $sesadik;
     header("Location: index.php");
     exit();
     ?>