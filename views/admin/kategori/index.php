<h2 class="aero-header">Data Kategori</h2>
<br><br>
<a href="index.php?url=kategori_tambah" class="aero-btn-green">Tambah Kategori</a>
<br><br>

<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($kategori as $k): ?>
    <tr>
        <td class="p-2 border"><?= $k['id'] ?></td>
        <td class="p-2 border"><?= $k['nama_kategori'] ?></td>
        <td class="p-2 border">
            <a href="index.php?url=kategori_hapus&id=<?= $k['id'] ?>" class="aero-btn-red">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
