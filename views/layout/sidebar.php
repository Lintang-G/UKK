<?php
if (!isset($_SESSION['user'])) return;

$role = $_SESSION['user']['role'];
$current_url = $_GET['url'] ?? 'dashboard';
?>

<script src="https://unpkg.com/@phosphor-icons/web"></script>

<div class="w-64 min-h-screen aero-nav flex flex-col justify-between px-4 py-6 border-r border-white/40 shadow-2xl">

    <div>
        <div class="flex items-center gap-2 font-bold text-sky-950 text-lg mb-8 px-2">
            <i class="ph-fill ph-wrench text-sky-600"></i>
            <span>Sistem peminjaman</span>
        </div>

        <nav class="flex flex-col gap-1 text-sm">
            
            <p class="text-[10px] uppercase tracking-widest text-sky-800/50 font-bold mb-1 ml-2">Utama</p>
            <a href="index.php" class="aero-sidebar-link <?= ($current_url == 'dashboard' || $current_url == '') ? 'active-link' : '' ?>">
                <i class="ph ph-chart-pie"></i> Dashboard
            </a>

            <div class="my-3 border-t border-white/20"></div>

            <p class="text-[10px] uppercase tracking-widest text-sky-800/50 font-bold mb-1 ml-2"><?= ucfirst($role) ?> Menu</p>

            <?php if ($role == 'admin'): ?>
                <a href="index.php?url=kategori" class="aero-sidebar-link <?= $current_url == 'kategori' ? 'active-link' : '' ?>">
                    <i class="ph ph-tag"></i> Kategori
                </a>
                <a href="index.php?url=alat" class="aero-sidebar-link <?= $current_url == 'alat' ? 'active-link' : '' ?>">
                    <i class="ph ph-cube"></i> Alat
                </a>
                <a href="index.php?url=user" class="aero-sidebar-link <?= $current_url == 'user' ? 'active-link' : '' ?>">
                    <i class="ph ph-users-three"></i> User Management
                </a>
                <a href="index.php?url=admin_peminjaman" class="aero-sidebar-link <?= $current_url == 'admin_peminjaman' ? 'active-link' : '' ?>">
                    <i class="ph ph-hand-grabbing"></i> Peminjaman
                </a>
                <a href="index.php?url=admin_pengembalian" class="aero-sidebar-link <?= $current_url == 'admin_pengembalian' ? 'active-link' : '' ?>">
                    <i class="ph ph-arrow-u-up-left"></i> Pengembalian
                </a>
                <a href="index.php?url=log_aktivitas" class="aero-sidebar-link <?= $current_url == 'log_aktivitas' ? 'active-link' : '' ?>">
                    <i class="ph ph-list-magnifying-glass"></i> Log Aktivitas
                </a>

            <?php elseif ($role == 'petugas'): ?>
                <a href="index.php?url=peminjaman_petugas" class="aero-sidebar-link <?= $current_url == 'peminjaman_petugas' ? 'active-link' : '' ?>">
                    <i class="ph ph-check-circle"></i> Persetujuan
                </a>
                <a href="index.php?url=pengembalian" class="aero-sidebar-link <?= $current_url == 'pengembalian' ? 'active-link' : '' ?>">
                    <i class="ph ph-backspace"></i> Pengembalian
                </a>
                <a href="index.php?url=peminjaman_laporan" class="aero-sidebar-link <?= $current_url == 'peminjaman_laporan' ? 'active-link' : '' ?>">
                    <i class="ph ph-file-text"></i> Laporan
                </a>

            <?php elseif ($role == 'peminjam'): ?>
                <a href="index.php?url=peminjaman" class="aero-sidebar-link <?= $current_url == 'peminjaman' ? 'active-link' : '' ?>">
                    <i class="ph ph-hand-coins"></i> Pinjam Alat
                </a>
                <a href="index.php?url=riwayat" class="aero-sidebar-link <?= $current_url == 'riwayat' ? 'active-link' : '' ?>">
                    <i class="ph ph-clock-counter-clockwise"></i> Riwayat
                </a>
            <?php endif; ?>

        </nav>
    </div>

    <div class="mt-auto pt-6 border-t border-white/20">
        <div class="flex items-center gap-3 px-2 mb-4">
            <div class="w-9 h-9 rounded-full bg-sky-500/20 border border-sky-400/50 flex items-center justify-center text-sky-900 font-bold text-xs shadow-inner flex-shrink-0">
                <?php 
                    $initial = isset($_SESSION['user']['username']) ? strtoupper(substr($_SESSION['user']['username'], 0, 1)) : 'U';
                    echo $initial;
                ?>
            </div>
            
            <div class="flex flex-col overflow-hidden">
                <span class="text-xs font-bold text-sky-950 truncate w-32">
                    <?= htmlspecialchars($_SESSION['user']['username'] ?? 'User') ?>
                </span>
                <span class="text-[10px] text-sky-800/60 uppercase tracking-tighter">
                    <?= htmlspecialchars($role) ?>
                </span>
            </div>
        </div>
        <a href="index.php?url=logout" class="aero-btn-red w-full text-center py-2 text-sm flex items-center justify-center gap-2">
            <i class="ph ph-sign-out"></i> Logout
        </a>
    </div>

</div>