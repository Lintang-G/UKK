<?php if (isset($_GET['success'])): ?>
    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
        <?= htmlspecialchars($_GET['success']) ?>
    </div>
<?php endif; ?>
<?php if (isset($_GET['error'])): ?>
    <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-800 rounded">
        <?= htmlspecialchars($_GET['error']) ?>
    </div>
<?php endif; ?>

<h2 class="aero-header">Data Pengembalian</h2>
<br>
<a href="index.php?url=admin_pengembalian_tambah" class="aero-btn-green">+ Tambah Pengembalian</a>
<br><br>

<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th class="p-2 border">ID</th>
        <th class="p-2 border">Peminjam</th>
        <th class="p-2 border">Alat</th>
        <th class="p-2 border">Tgl Dikembalikan</th>
        <th class="p-2 border">Kondisi Kembali</th>
        <th class="p-2 border">Aksi</th>
    </tr>

    <?php foreach ($pengembalian as $pg): ?>
    <tr>
        <td class="p-2 border"><?= $pg['id'] ?></td>
        <td class="p-2 border"><?= htmlspecialchars($pg['nama_peminjam']) ?></td>
        <td class="p-2 border"><?= htmlspecialchars($pg['nama_alat']) ?></td>
        <td class="p-2 border"><?= $pg['tanggal_dikembalikan'] ?></td>
        <td class="p-2 border">
            <?php
            $kondisiClass = match(strtolower($pg['kondisi_kembali'])) {
                'baik'  => 'bg-green-100 text-green-800',
                'rusak' => 'bg-red-100 text-red-800',
                default => 'bg-yellow-100 text-yellow-800'
            };
            ?>
            <span class="px-2 py-1 rounded text-xs font-semibold <?= $kondisiClass ?>">
                <?= htmlspecialchars($pg['kondisi_kembali']) ?>
            </span>
        </td>
        <td class="p-2 border flex gap-2">
            <a href="index.php?url=admin_pengembalian_edit&id=<?= $pg['id'] ?>" class="aero-btn">Edit</a>
            <a href="index.php?url=admin_pengembalian_hapus&id=<?= $pg['id'] ?>"
               class="aero-btn-red"
               onclick="return confirm('Yakin hapus data pengembalian ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>

    <?php if (empty($pengembalian)): ?>
    <tr><td colspan="6" class="p-4 text-center text-gray-500">Belum ada data pengembalian.</td></tr>
    <?php endif; ?>
</table>
