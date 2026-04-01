<?php
require_once "../models/Peminjaman.php";
require_once "../models/Pengembalian.php";
require_once "../models/LogAktivitas.php";
require_once "../models/User.php";
require_once "../models/Alat.php";

class AdminPeminjamanController extends Controller {

    public function index() {
        Auth::check();
        Auth::role('admin');

        $data['peminjaman'] = Peminjaman::all();
        $this->view('admin/peminjaman/index', $data);
    }

    public function tambah() {
        Auth::check();
        Auth::role('admin');

        $data['users'] = User::all();
        $data['alat']  = Alat::all();
        $this->view('admin/peminjaman/tambah', $data);
    }

    public function simpan() {
        Auth::check();
        Auth::role('admin');

        $user_id         = $_POST['user_id'] ?? null;
        $alat_id         = $_POST['alat_id'] ?? null;
        $tanggal_pinjam  = $_POST['tanggal_pinjam'] ?? null;
        $tanggal_kembali = $_POST['tanggal_kembali'] ?? null;
        $status          = $_POST['status'] ?? 'menunggu';

        if (!$user_id || !$alat_id || !$tanggal_pinjam || !$tanggal_kembali) {
            header("Location: index.php?url=admin_peminjaman_tambah&error=Data tidak lengkap");
            exit;
        }

        Peminjaman::adminCreate($user_id, $alat_id, $tanggal_pinjam, $tanggal_kembali, $status);

        $admin_id = $_SESSION['user']['id'];
        LogAktivitas::catat($admin_id, "Admin menambah data peminjaman untuk user_id=$user_id, alat_id=$alat_id");

        header("Location: index.php?url=admin_peminjaman&success=Data peminjaman berhasil ditambah");
        exit;
    }

    public function edit() {
        Auth::check();
        Auth::role('admin');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?url=admin_peminjaman");
            exit;
        }

        $data['peminjaman'] = Peminjaman::findById($id);
        $data['users']      = User::all();
        $data['alat']       = Alat::all();
        $this->view('admin/peminjaman/edit', $data);
    }

    public function update() {
        Auth::check();
        Auth::role('admin');

        $id              = $_POST['id'] ?? null;
        $user_id         = $_POST['user_id'] ?? null;
        $alat_id         = $_POST['alat_id'] ?? null;
        $tanggal_pinjam  = $_POST['tanggal_pinjam'] ?? null;
        $tanggal_kembali = $_POST['tanggal_kembali'] ?? null;
        $status          = $_POST['status'] ?? 'menunggu';

        if (!$id || !$user_id || !$alat_id || !$tanggal_pinjam || !$tanggal_kembali) {
            header("Location: index.php?url=admin_peminjaman_edit&id=$id&error=Data tidak lengkap");
            exit;
        }

        Peminjaman::adminUpdate($id, $user_id, $alat_id, $tanggal_pinjam, $tanggal_kembali, $status);

        $admin_id = $_SESSION['user']['id'];
        LogAktivitas::catat($admin_id, "Admin mengubah data peminjaman id=$id");

        header("Location: index.php?url=admin_peminjaman&success=Data peminjaman berhasil diupdate");
        exit;
    }

    public function hapus() {
        Auth::check();
        Auth::role('admin');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?url=admin_peminjaman");
            exit;
        }

        Peminjaman::adminDelete($id);

        $admin_id = $_SESSION['user']['id'];
        LogAktivitas::catat($admin_id, "Admin menghapus data peminjaman id=$id");

        header("Location: index.php?url=admin_peminjaman&success=Data peminjaman berhasil dihapus");
        exit;
    }
}
