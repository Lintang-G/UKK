<h2 class="aero-header">Data User</h2>
<br><br>
<a href="index.php?url=user_tambah" class="aero-btn-green">Tambah User</a>
<br><br>

<table class="aero-table w-full">
    <tr class="bg-gray-200 text-left">
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($users as $u): ?>
    <tr>
        <td class="p-2 border"><?= $u['id'] ?></td>
        <td class="p-2 border"><?= $u['name'] ?></td>
        <td class="p-2 border"><?= $u['email'] ?></td>
        <td class="p-2 border"><?= $u['role'] ?></td>
        <td class="p-2 border">
            <a href="index.php?url=user_hapus&id=<?= $u['id'] ?>" class="aero-btn-red">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
