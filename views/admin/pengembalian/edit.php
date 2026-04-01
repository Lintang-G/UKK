<?php if (isset($_GET['error'])): ?>
    <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-800 rounded">
        <?= htmlspecialchars($_GET['error']) ?>
    </div>
<?php endif; ?>

<h2 class="aero-header">Edit Pengembalian</h2>
<br>

<form method="POST" action="index.php?url=admin_pengembalian_update">
    <input type="hidden" name="id" value="<?= $pengembalian['id'] ?>">

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Data Peminjaman</label>
        <select name="peminjaman_id" class="aero-input w-full" required>
            <option value="">-- Pilih Peminjaman --</option>
            <?php foreach ($peminjaman as $p): ?>
            <option value="<?= $p['id'] ?>" <?= $p['id'] == $pengembalian['peminjaman_id'] ? 'selected' : '' ?>>
                #<?= $p['id'] ?> - <?= htmlspecialchars($p['name']) ?> | <?= htmlspecialchars($p['nama_alat']) ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Dikembalikan</label>
        <input type="date" name="tanggal_dikembalikan" class="aero-input w-full"
               value="<?= date('Y-m-d', strtotime($pengembalian['tanggal_dikembalikan'])) ?>" required>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi Kembali</label>
        <select name="kondisi_kembali" class="aero-input w-full" required>
            <option value="">-- Pilih Kondisi --</option>
            <?php foreach (['Baik', 'Rusak Ringan', 'Rusak Berat', 'Hilang'] as $k): ?>
            <option value="<?= $k ?>" <?= $pengembalian['kondisi_kembali'] === $k ? 'selected' : '' ?>>
                <?= $k ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="flex gap-2">
        <button type="submit" class="aero-btn">Update</button>
        <a href="index.php?url=admin_pengembalian" class="aero-btn-red">Batal</a>
    </div>
</form>
