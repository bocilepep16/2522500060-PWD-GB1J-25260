<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM anggota ORDER BY nomor_anggota DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
?>

<?php
  $flash_sukses = $_SESSION['flash_sukses'] ?? ''; #jika query sukses
  $flash_error  = $_SESSION['flash_error'] ?? ''; #jika ada error
  #bersihkan session ini
  unset($_SESSION['flash_sukses'], $_SESSION['flash_error']); 
?>

<?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>Nomor Anggota</th>
    <th>Nama Anggota</th>
    <th>Jabatan Anggota</th>
    <th>Tanggal Jadi Anggota</th>
    <th>Kemampuan Anggota</th>
    <th>Gaji Anggota</th>
    <th>Nomor Wa</th>
    <th>Batalion Anggota</th>
    <th>Berat badan</th>
    <th>Tinggi badan</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?nomor_anggota=<?= (int)$row['nomor_anggota']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['nama_anggota']); ?>?')" href="proses_delete.php?nomor_anggota=<?= (int)$row['nomor_anggota']; ?>">Delete</a>
      </td>
      <td><?= htmlspecialchars($row['nomor_anggota']); ?></td>
      <td><?= htmlspecialchars($row['nama_anggota']); ?></td>
      <td><?= htmlspecialchars($row['jabatan_anggota']); ?></td>
      <td><?= htmlspecialchars($row['tanggal_jadi']); ?></td>
      <td><?= htmlspecialchars($row['kemampuan_anggota']); ?></td>
      <td><?= htmlspecialchars($row['gaji_anggota']); ?></td>
      <td><?= htmlspecialchars($row['nomor_wa']); ?></td>
      <td><?= htmlspecialchars($row['batalion_anggota']); ?></td>
      <td><?= htmlspecialchars($row['berat_badan']); ?></td>
      <td><?= htmlspecialchars($row['tinggi_badan']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>