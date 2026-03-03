<h2 class="aero-header">Tambah Alat</h2>

<form method="POST" action="index.php?url=alat_simpan">
    <input class="aero-input" type="text" name="nama_alat" placeholder="Nama Alat" required><br><br>

    <select name="kategori_id" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <input class="aero-input" type="number" name="stok" placeholder="Stok" required><br><br>
    <input class="aero-input" type="text" name="kondisi" placeholder="Kondisi" required><br><br>

    <button type="submit" class="aero-btn">Simpan</button>
</form>
