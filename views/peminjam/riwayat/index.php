<h2 class="aero-header">Riwayat Peminjaman Saya</h2>
<br><br>
<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th>Nama Alat</th>
        <th>Tanggal Pinjam</th>
        <th>Batas Kembali</th>
        <th>Tanggal Dikembalikan</th>
        <th>Status</th>
        <th>Denda</th>
    </tr>

<?php foreach ($riwayat as $r): ?>
<tr>
    <td class="p-2 border"><?= $r['nama_alat'] ?></td>
    <td class="p-2 border"><?= $r['tanggal_pinjam'] ?></td>
    <td class="p-2 border"><?= $r['tanggal_kembali'] ?></td>
    <td class="p-2 border"><?= $r['tanggal_kembali_real'] ?? '-' ?></td>
    <td class="p-2 border"><?= ucfirst($r['status']) ?></td>
    <td class="p-2 border">
        Rp <?= number_format($r['denda'] ?? 0, 0, ',', '.') ?>
    </td>
</tr>
<?php endforeach; ?>
</table>
