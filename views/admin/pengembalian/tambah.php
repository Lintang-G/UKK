<?php if (isset($_GET['error'])): ?>
    <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-800 rounded">
        <?= htmlspecialchars($_GET['error']) ?>
    </div>
<?php endif; ?>

<h2 class="aero-header">Tambah Pengembalian</h2>
<br>

<?php if (empty($peminjaman)): ?>
    <div class="p-4 bg-yellow-100 border border-yellow-400 text-yellow-800 rounded">
        Tidak ada peminjaman aktif yang perlu dikembalikan.
    </div>
    <br>
    <a href="index.php?url=admin_pengembalian" class="aero-btn-red">Kembali</a>
<?php else: ?>
<form method="POST" action="index.php?url=admin_pengembalian_simpan">
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Data Peminjaman</label>
        <select name="peminjaman_id" class="aero-input w-full" required>
            <option value="">-- Pilih Peminjaman --</option>
            <?php foreach ($peminjaman as $p): ?>
            <option value="<?= $p['id'] ?>">
                #<?= $p['id'] ?> - <?= htmlspecialchars($p['name']) ?> | <?= htmlspecialchars($p['nama_alat']) ?>
                (Batas: <?= $p['tanggal_kembali'] ?>)
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Dikembalikan</label>
        <input type="date" name="tanggal_dikembalikan" class="aero-input w-full"
               value="<?= date('Y-m-d') ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi Kembali</label>
        <select name="kondisi_kembali" class="aero-input w-full" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
            <option value="Hilang">Hilang</option>
        </select>
    </div>

    <div class="flex gap-2">
        <button type="submit" class="aero-btn">Simpan</button>
        <a href="index.php?url=admin_pengembalian" class="aero-btn-red">Batal</a>
    </div>
</form>
<?php endif; ?>
