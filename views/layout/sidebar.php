<?php
if (!isset($_SESSION['user'])) return;

$role = $_SESSION['user']['role'];
// Get current URL to highlight active link
$current_url = $_GET['url'] ?? 'dashboard';
?>

<script src="https://unpkg.com/@phosphor-icons/web"></script>

<div class="w-64 min-h-screen flex flex-col bg-white/20 backdrop-blur-lg border-r border-white/30 shadow-xl">

    <div class="p-6">
        <div class="flex items-center gap-3 px-2 py-3 bg-white/30 rounded-xl border border-white/40 shadow-sm">
            <div class="p-2 bg-sky-500 rounded-lg shadow-inner">
                <i class="ph-fill ph-wrench text-white text-xl"></i>
            </div>
            <span class="font-bold text-sky-900 leading-tight">
                Aero<span class="font-light">Tools</span>
            </span>
        </div>
    </div>

    <nav class="flex-1 px-4 flex flex-col gap-y-1">
        <p class="px-4 text-[10px] font-bold uppercase tracking-widest text-sky-800/60 mt-4 mb-2">Main Menu</p>
        
        <a href="index.php" class="aero-sidebar-link group <?= ($current_url == 'dashboard' || $current_url == '') ? 'active-link' : '' ?>">
            <i class="ph ph-house text-lg"></i>
            <span>Dashboard</span>
        </a>

        <div class="my-4 border-t border-white/20"></div>
        
        <p class="px-4 text-[10px] font-bold uppercase tracking-widest text-sky-800/60 mb-2"><?= ucfirst($role) ?> Panel</p>

        <div class="flex flex-col gap-y-1">
            <?php if ($role == 'admin'): ?>
                <a href="index.php?url=kategori" class="aero-sidebar-link <?= $current_url == 'kategori' ? 'active-link' : '' ?>">
                    <i class="ph ph-squares-four text-lg"></i> <span>Kategori</span>
                </a>
                <a href="index.php?url=alat" class="aero-sidebar-link <?= $current_url == 'alat' ? 'active-link' : '' ?>">
                    <i class="ph ph-package text-lg"></i> <span>Alat</span>
                </a>
                <a href="index.php?url=user" class="aero-sidebar-link <?= $current_url == 'user' ? 'active-link' : '' ?>">
                    <i class="ph ph-users text-lg"></i> <span>Management User</span>
                </a>

            <?php elseif ($role == 'petugas'): ?>
                <a href="index.php?url=peminjaman_petugas" class="aero-sidebar-link <?= $current_url == 'peminjaman_petugas' ? 'active-link' : '' ?>">
                    <i class="ph ph-check-square text-lg"></i> <span>Persetujuan</span>
                </a>
                <a href="index.php?url=pengembalian" class="aero-sidebar-link <?= $current_url == 'pengembalian' ? 'active-link' : '' ?>">
                    <i class="ph ph-arrow-u-up-left text-lg"></i> <span>Pengembalian</span>
                </a>
                <a href="index.php?url=peminjaman_laporan" class="aero-sidebar-link <?= $current_url == 'peminjaman_laporan' ? 'active-link' : '' ?>">
                    <i class="ph ph-file-text text-lg"></i> <span>Laporan</span>
                </a>

            <?php elseif ($role == 'peminjam'): ?>
                <a href="index.php?url=peminjaman" class="aero-sidebar-link <?= $current_url == 'peminjaman' ? 'active-link' : '' ?>">
                    <i class="ph ph-hand-grabbing text-lg"></i> <span>Pinjam Alat</span>
                </a>
                <a href="index.php?url=riwayat" class="aero-sidebar-link <?= $current_url == 'riwayat' ? 'active-link' : '' ?>">
                    <i class="ph ph-clock-counter-clockwise text-lg"></i> <span>Riwayat Pinjam</span>
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="p-4 mt-auto">
        <div class="bg-white/30 p-3 rounded-2xl border border-white/40 shadow-sm backdrop-blur-md">
            <div class="flex items-center gap-3 mb-3 px-1">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-sky-400 to-blue-600 flex items-center justify-center text-white font-bold text-sm shadow-lg border border-white/50">
                    <?= strtoupper(substr($_SESSION['user']['username'] ?? 'U', 0, 1)) ?>
                </div>
                
                <div class="flex flex-col overflow-hidden">
                    <span class="text-xs font-bold text-sky-900 truncate">
                        <?= htmlspecialchars($_SESSION['user']['username'] ?? 'User') ?>
                    </span>
                    <span class="text-[10px] text-sky-700/70 capitalize flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        <?= htmlspecialchars($role) ?>
                    </span>
                </div>
            </div>

            <a href="index.php?url=logout" 
            class="flex items-center justify-center gap-2 w-full py-2.5 px-4 bg-red-500/20 hover:bg-red-500 text-red-700 hover:text-white border border-red-500/30 rounded-xl text-sm font-semibold transition-all duration-300 shadow-sm group">
                <i class="ph ph-sign-out text-lg group-hover:translate-x-1 transition-transform"></i>
                <span>Keluar Sistem</span>
            </a>
        </div>
    </div>
</div>