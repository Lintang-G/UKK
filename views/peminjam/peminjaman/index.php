<h2 class="aero-header">Daftar Alat</h2>
<br><br>
<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
    <th>Nama Alat</th>
    <th>Kategori</th>
    <th>Stok</th>
    <th>Tanggal Kembali</th>
    <th>Aksi</th>
</tr>

<?php foreach ($alat as $a): ?>
<tr>
    <td class="p-2 border"><?= $a['nama_alat'] ?></td>
    <td class="p-2 border"><?= $a['nama_kategori'] ?></td>
    <td class="p-2 border"><?= $a['stok'] ?></td>
    
        <?php if ($a['stok'] > 0): ?>
            <form action="index.php?url=peminjaman_pinjam" method="POST" class="flex gap-2">
                <td class="p-2 border">
                <input class="aero-input" type="hidden" name="id" value="<?= $a['id'] ?>">

                <input 
                    type="date" 
                    name="tanggal_kembali" 
                    required
                    min="<?= date('Y-m-d') ?>"
                    class="aero-input">
                </td>
                <td class="p-2 border">

                <button class="aero-btn">
                    Pinjam
                </button>
                </td>
            </form>
        <?php else: ?>
            Stok habis
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>
