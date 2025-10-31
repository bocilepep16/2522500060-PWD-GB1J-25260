<!DOCTYPE html>
<html>
<head>
  <title>Belajar PHP Dasar</title>
</head>
<body>
  <h1><?php echo "Halo, Dunia PHP!"; ?></h1>
  <h2><?php echo "Selamat datang di PHP, Catherine Audreylia Diony!"; ?> </h2>
  <?php
$nama = "Catherine Audreylia Diony";
$umur = 18;
$tinggi = 1.54;
$aktif = true;
$hobi = ["Olahraga", "Menonton Drakor", "Musik"];
$mahasiswa = (object)[
"nim" => "2522500060",
"nama" => "Catherine Audreylia Diony",
"prodi" => "Sistem Informasi"
];
$nilai_akhir = NULL;
echo "<h2>Demo Tipe Data PHP</h2>";
echo "<pre>";
echo "String:\n";
var_dump($nama);
echo "\nInteger:\n";
var_dump($umur);
echo "\nFloat:\n";
var_dump($tinggi);
echo "\nBoolean:\n";
var_dump($aktif);
echo "\nArray:\n";
var_dump($hobi);
echo "\nObject:\n";
var_dump($mahasiswa);
echo "\nNULL:\n";
var_dump($nilai_akhir);
echo "</pre>";
?>

<?php
define("KAMPUS", "ISB Atma Luhur");
const ANGKATAN = 2025;

define("DOSEN_PENGAMPU", "Yohanes Setiawan Japriadi");
const MATAKULIAH = "Pemrograman Web Dasar";

echo "Kampus: " . KAMPUS . "<br>";
echo "Angkatan: " . ANGKATAN . "<br>";
echo "Dosen Pengampu: " . DOSEN_PENGAMPU . "<br>";
echo "Mata Kuliah: " . MATAKULIAH;
?>

<?php
// Ini komentar satu baris menggunakan dua garis miring (//)
// Biasanya digunakan untuk memberi penjelasan singkat pada kode

# Ini juga komentar satu baris menggunakan tanda pagar (#)
# Fungsinya sama seperti //, hanya berbeda gaya penulisan

/*
   Ini komentar lebih dari satu baris (multiline comment)
   Cocok digunakan untuk menjelaskan blok kode yang panjang
   atau memberi dokumentasi tambahan di dalam program.
*/
?>

<?php
$a = 10;
$b = 3;
echo $a + $b;
echo $a % $b;
?>

<?php
$a = 100;
$b = "100";
$c = 0;
$d = false;
echo "<h3>Perbandingan == dan ===</h3>";
echo "\$a == \$b : "; var_dump($a == $b);
echo "\$a === \$b : "; var_dump($a === $b);
echo "\$c == \$d : "; var_dump($c == $d);
echo "\$c === \$d : "; var_dump($c === $d);
?>

<?php
$nilai = 80;
if ($nilai >= 90) {
echo "A";
} elseif ($nilai >= 80) {
echo "B";
} else {
echo "C";
}
?>

<?php
$hari = "Senin";
switch ($hari) {
case "Senin": echo "Awal Minggu!"; break;
case "Jumat": echo "Hampir weekend!"; break;
default: echo "Hari biasa.";
}
?>

<?php
$hobi = ["Olahraga", "Menonton Drakor", "Musik"];
foreach ($hobi as $item) {
echo "Hobi: $item <br>";
}
?>

<?php
$hobi = ["Coding", "Memasak", "Musik", "Membaca", "Traveling"];
echo "<h3>Daftar Hobi Saya:</h3>";
for ($i = 0; $i < count($hobi); $i++) {
echo ($i + 1) . ". " . $hobi[$i] . "<br>";
}
echo "<hr>";
echo "<h4>Hasil print_r():</h4>";
echo "<pre>";
print_r($hobi);
echo "</pre>";
echo "<h4>Hasil var_dump():</h4>";
echo "<pre>";
var_dump($hobi);
echo "</pre>";
?>

<?php
for ($i=1; $i<=5; $i++) {
echo "Perulangan ke-$i <br>";
}
?>

<?php
$i = 1;
do {
echo "Iterasi ke-$i<br>";
$i++;
} while (1 == 1);
?>
</body>
</html>