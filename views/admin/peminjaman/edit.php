<?php if (isset($_GET['error'])): ?>
    <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-800 rounded">
        <?= htmlspecialchars($_GET['error']) ?>
    </div>
<?php endif; ?>

<h2 class="aero-header">Edit Peminjaman</h2>
<br>

<form method="POST" action="index.php?url=admin_peminjaman_update">
    <input type="hidden" name="id" value="<?= $peminjaman['id'] ?>">

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Peminjam</label>
        <select name="user_id" class="aero-input w-full" required>
            <option value="">-- Pilih User --</option>
            <?php foreach ($users as $u): ?>
                <?php if ($u['role'] === 'peminjam'): ?>
                <option value="<?= $u['id'] ?>" <?= $u['id'] == $peminjaman['user_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($u['name']) ?> (<?= $u['email'] ?>)
                </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Alat</label>
        <select name="alat_id" class="aero-input w-full" required>
            <option value="">-- Pilih Alat --</option>
            <?php foreach ($alat as $a): ?>
            <option value="<?= $a['id'] ?>" <?= $a['id'] == $peminjaman['alat_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($a['nama_alat']) ?> (Stok: <?= $a['stok'] ?>)
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="aero-input w-full"
               value="<?= date('Y-m-d', strtotime($peminjaman['tanggal_pinjam'])) ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" class="aero-input w-full"
               value="<?= $peminjaman['tanggal_kembali'] ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <select name="status" class="aero-input w-full" required>
            <?php foreach (['menunggu','dipinjam','dikembalikan','selesai'] as $s): ?>
            <option value="<?= $s ?>" <?= $peminjaman['status'] === $s ? 'selected' : '' ?>>
                <?= ucfirst($s) ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="flex gap-2">
        <button type="submit" class="aero-btn">Update</button>
        <a href="index.php?url=admin_peminjaman" class="aero-btn-red">Batal</a>
    </div>
</form>
