<h2 class="aero-header">Tambah User</h2>

<form method="POST" action="index.php?url=user_simpan">
    <input class="aero-input" type="text" name="name" placeholder="Nama" required><br><br>
    <input class="aero-input" type="email" name="email" placeholder="Email" required><br><br>
    <input class="aero-input" type="password" name="password" placeholder="Password" required><br><br>

    <select name="role" required>
        <option value="">-- Pilih Role --</option>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="peminjam">Peminjam</option>
    </select><br><br>

    <button type="submit" class="aero-btn">Simpan</button>
</form>
