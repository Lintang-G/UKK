<h2 class="aero-header">Persetujuan Peminjaman</h2>
<br><br>
<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th>Nama Peminjam</th>
        <th>Alat</th>
        <th>Tanggal Pinjam</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($peminjaman as $p): ?>
    <tr>
        <td class="p-2 border"><?= $p['name'] ?></td>
        <td class="p-2 border"><?= $p['nama_alat'] ?></td>
        <td class="p-2 border"><?= $p['tanggal_pinjam'] ?></td>
        <td class="p-2 border">
            <a href="index.php?url=peminjaman_setujui&id=<?= $p['id'] ?>" class="aero-btn-green">
                Setujui
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
