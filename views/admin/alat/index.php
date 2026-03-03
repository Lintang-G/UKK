<h2 class="aero-header">Data Alat</h2>
<br><br>
<a href="index.php?url=alat_tambah" class="aero-btn-green">Tambah Alat</a>
<br><br>

<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th>ID</th>
        <th>Nama Alat</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Kondisi</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($alat as $a): ?>
    <tr>
        <td class="p-2 border"><?= $a['id'] ?></td>
        <td class="p-2 border"><?= $a['nama_alat'] ?></td>
        <td class="p-2 border"><?= $a['nama_kategori'] ?></td>
        <td class="p-2 border"><?= $a['stok'] ?></td>
        <td class="p-2 border"><?= $a['kondisi'] ?></td>
        <td class="p-2 border">
            <a href="index.php?url=alat_hapus&id=<?= $a['id'] ?>" class="aero-btn-red">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
