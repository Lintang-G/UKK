<?php
if (!isset($_SESSION['user'])) {
    return; // jangan tampilkan navbar kalau belum login
}

$role = $_SESSION['user']['role'];
?>

<nav class="aero-nav text-gray px-6 py-4 shadow">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <div class="font-semibold text-lg">
            Sistem Peminjaman Alat
        </div>

        <div class="space-x-4 text-sm">
            <a href="index.php" class="hover:underline">Dashboard</a>

            <?php if ($role == 'admin'): ?>
                <a href="index.php?url=kategori" class="hover:underline">Kategori</a>
                <a href="index.php?url=alat" class="hover:underline">Alat</a>
                <a href="index.php?url=user" class="hover:underline">User</a>

            <?php elseif ($role == 'petugas'): ?>
                <a href="index.php?url=peminjaman_petugas" class="hover:underline">Persetujuan</a>
                <a href="index.php?url=pengembalian" class="hover:underline">Pengembalian</a>
                <a href="index.php?url=peminjaman_laporan">Laporan</a>

            <?php elseif ($role == 'peminjam'): ?>
                <a href="index.php?url=peminjaman" class="hover:underline">Pinjam</a>
                <a href="index.php?url=riwayat" class="hover:underline">Riwayat</a>
            <?php endif; ?>

            <a href="index.php?url=logout" class="aero-btn-red">
                Logout
            </a>
        </div>
    </div>
</nav>
