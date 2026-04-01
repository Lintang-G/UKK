<?php if (isset($_GET['success'])): ?>
    <div class="aero-alert-success mb-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
        <?= htmlspecialchars($_GET['success']) ?>
    </div>
<?php endif; ?>
<?php if (isset($_GET['error'])): ?>
    <div class="aero-alert-error mb-4 p-3 bg-red-100 border border-red-400 text-red-800 rounded">
        <?= htmlspecialchars($_GET['error']) ?>
    </div>
<?php endif; ?>

<h2 class="aero-header">Data Peminjaman</h2>
<br>
<a href="index.php?url=admin_peminjaman_tambah" class="aero-btn-green">+ Tambah Peminjaman</a>
<br><br>

<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th class="p-2 border">ID</th>
        <th class="p-2 border">Peminjam</th>
        <th class="p-2 border">Alat</th>
        <th class="p-2 border">Tgl Pinjam</th>
        <th class="p-2 border">Tgl Kembali</th>
        <th class="p-2 border">Status</th>
        <th class="p-2 border">Aksi</th>
    </tr>

    <?php foreach ($peminjaman as $p): ?>
    <tr>
        <td class="p-2 border"><?= $p['id'] ?></td>
        <td class="p-2 border"><?= htmlspecialchars($p['name']) ?></td>
        <td class="p-2 border"><?= htmlspecialchars($p['nama_alat']) ?></td>
        <td class="p-2 border"><?= $p['tanggal_pinjam'] ?></td>
        <td class="p-2 border"><?= $p['tanggal_kembali'] ?></td>
        <td class="p-2 border">
            <?php
            $statusClass = match($p['status']) {
                'menunggu'     => 'bg-yellow-100 text-yellow-800',
                'dipinjam'     => 'bg-blue-100 text-blue-800',
                'dikembalikan' => 'bg-green-100 text-green-800',
                'selesai'      => 'bg-gray-100 text-gray-700',
                default        => ''
            };
            ?>
            <span class="px-2 py-1 rounded text-xs font-semibold <?= $statusClass ?>">
                <?= ucfirst($p['status']) ?>
            </span>
        </td>
        <td class="p-2 border flex gap-2">
            <a href="index.php?url=admin_peminjaman_edit&id=<?= $p['id'] ?>" class="aero-btn">Edit</a>
            <a href="index.php?url=admin_peminjaman_hapus&id=<?= $p['id'] ?>"
               class="aero-btn-red"
               onclick="return confirm('Yakin hapus peminjaman ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>

    <?php if (empty($peminjaman)): ?>
    <tr><td colspan="7" class="p-4 text-center text-gray-500">Belum ada data peminjaman.</td></tr>
    <?php endif; ?>
</table>
