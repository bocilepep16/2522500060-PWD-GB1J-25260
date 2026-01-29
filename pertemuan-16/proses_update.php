<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    #redirect_ke('read.php');
  }

  #validasi cid wajib angka dan > 0
  $no = filter_input(INPUT_POST, 'nomor_anggota', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$no) {
    $_SESSION['flash_error'] = 'Nomor Anggota Tidak Valid.';
    redirect_ke('edit.php?nomor_anggota='. (int)$no);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  #$no  = bersihkan($_POST['txtNoAng']  ?? '');
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

  #Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

// if ($no === '') {
//   $errors[] = 'No wajib diisi.';
// }
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

// if (mb_strlen($no) < 10) {
//   $errors[] = 'No Anggota minimal 10 karakter.';
// }
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
      'nama'  => $nama,
      'email' => $email,
      'pesan' => $pesan
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_tamu 
                                SET cnama = ?, cemail = ?, cpesan = ? 
                                WHERE cid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old']);
    /*
      Redirect balik ke read.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = [
      'nama'  => $nama,
      'email' => $email,
      'pesan' => $pesan,
    ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit.php?nomor_anggota='. (int)$nomor_anggota);