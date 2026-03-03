<h2 class="aero-header">Pengembalian Alat</h2>
<br><br>
<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th>Peminjam</th>
        <th>Alat</th>
        <th>Tanggal Pinjam</th>
        <th>Batas Kembali</th>
        <th>Status</th>
        <th>Perkiraan Denda</th>
        <th>Aksi</th>
    </tr>

<?php foreach ($pinjam as $p): 
    $today = new DateTime();
    $batas = new DateTime($p['tanggal_kembali']);

    $telat = $today > $batas;
    $selisih = $telat ? $batas->diff($today)->days : 0;
    $denda = $selisih * 5000;
?>
<tr>
    <td class="p-2 border"><?= $p['name'] ?></td>
    <td class="p-2 border"><?= $p['nama_alat'] ?></td>
    <td class="p-2 border"><?= $p['tanggal_pinjam'] ?></td>
    <td class="p-2 border"><?= $p['tanggal_kembali'] ?></td>

    <td class="p-2 border">
        <?php if($telat): ?>
            <span class="text-red-600 font-bold">Terlambat</span>
        <?php else: ?>
            <span class="text-green-600">On Time</span>
        <?php endif; ?>
    </td>

    <td class="p-2 border">
        Rp <?= number_format($denda, 0, ',', '.') ?>
    </td>

    <td class="p-2 border">
        <a href="index.php?url=pengembalian_kembali&id=<?= $p['id'] ?>" 
           class="aero-btn-green">
            Terima Pengembalian
        </a>
    </td>
</tr>
<?php endforeach; ?>
</table>
