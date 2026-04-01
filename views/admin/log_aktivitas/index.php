<?php if (isset($_GET['success'])): ?>
    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-800 rounded">
        <?= htmlspecialchars($_GET['success']) ?>
    </div>
<?php endif; ?>

<div class="flex items-center justify-between mb-4">
    <h2 class="aero-header">Log Aktivitas</h2>
    <a href="index.php?url=log_aktivitas_hapus_semua"
       class="aero-btn-red text-sm"
       onclick="return confirm('Yakin hapus semua log aktivitas?')">
        Hapus Semua Log
    </a>
</div>
<br>

<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th class="p-2 border">ID</th>
        <th class="p-2 border">User</th>
        <th class="p-2 border">Role</th>
        <th class="p-2 border">Aktivitas</th>
        <th class="p-2 border">Waktu</th>
        <th class="p-2 border">Aksi</th>
    </tr>

    <?php foreach ($log as $l): ?>
    <tr>
        <td class="p-2 border"><?= $l['id'] ?></td>
        <td class="p-2 border font-medium"><?= htmlspecialchars($l['name']) ?></td>
        <td class="p-2 border">
            <?php
            $roleClass = match($l['role']) {
                'admin'    => 'bg-purple-100 text-purple-800',
                'petugas'  => 'bg-blue-100 text-blue-800',
                'peminjam' => 'bg-green-100 text-green-800',
                default    => ''
            };
            ?>
            <span class="px-2 py-1 rounded text-xs font-semibold <?= $roleClass ?>">
                <?= ucfirst($l['role']) ?>
            </span>
        </td>
        <td class="p-2 border"><?= htmlspecialchars($l['aktivitas']) ?></td>
        <td class="p-2 border text-sm text-gray-600"><?= $l['waktu'] ?></td>
        <td class="p-2 border">
            <a href="index.php?url=log_aktivitas_hapus&id=<?= $l['id'] ?>"
               class="aero-btn-red text-xs"
               onclick="return confirm('Hapus log ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>

    <?php if (empty($log)): ?>
    <tr><td colspan="6" class="p-4 text-center text-gray-500">Belum ada log aktivitas.</td></tr>
    <?php endif; ?>
</table>
