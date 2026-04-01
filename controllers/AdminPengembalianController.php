<?php
require_once "../models/Pengembalian.php";
require_once "../models/Peminjaman.php";
require_once "../models/LogAktivitas.php";

class AdminPengembalianController extends Controller {

    public function index() {
        Auth::check();
        Auth::role('admin');

        $data['pengembalian'] = Pengembalian::all();
        $this->view('admin/pengembalian/index', $data);
    }

    public function tambah() {
        Auth::check();
        Auth::role('admin');

        // Show only peminjaman that are currently dipinjam (not yet returned)
        $data['peminjaman'] = Peminjaman::sedangDipinjam();
        $this->view('admin/pengembalian/tambah', $data);
    }

    public function simpan() {
        Auth::check();
        Auth::role('admin');

        $peminjaman_id        = $_POST['peminjaman_id'] ?? null;
        $tanggal_dikembalikan = $_POST['tanggal_dikembalikan'] ?? null;
        $kondisi_kembali      = $_POST['kondisi_kembali'] ?? null;

        if (!$peminjaman_id || !$tanggal_dikembalikan || !$kondisi_kembali) {
            header("Location: index.php?url=admin_pengembalian_tambah&error=Data tidak lengkap");
            exit;
        }

        Pengembalian::adminCreate($peminjaman_id, $tanggal_dikembalikan, $kondisi_kembali);

        $admin_id = $_SESSION['user']['id'];
        LogAktivitas::catat($admin_id, "Admin menambah data pengembalian untuk peminjaman_id=$peminjaman_id");

        header("Location: index.php?url=admin_pengembalian&success=Data pengembalian berhasil ditambah");
        exit;
    }

    public function edit() {
        Auth::check();
        Auth::role('admin');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?url=admin_pengembalian");
            exit;
        }

        $data['pengembalian'] = Pengembalian::findById($id);
        $data['peminjaman']   = Peminjaman::all();
        $this->view('admin/pengembalian/edit', $data);
    }

    public function update() {
        Auth::check();
        Auth::role('admin');

        $id                   = $_POST['id'] ?? null;
        $peminjaman_id        = $_POST['peminjaman_id'] ?? null;
        $tanggal_dikembalikan = $_POST['tanggal_dikembalikan'] ?? null;
        $kondisi_kembali      = $_POST['kondisi_kembali'] ?? null;

        if (!$id || !$peminjaman_id || !$tanggal_dikembalikan || !$kondisi_kembali) {
            header("Location: index.php?url=admin_pengembalian_edit&id=$id&error=Data tidak lengkap");
            exit;
        }

        Pengembalian::adminUpdate($id, $peminjaman_id, $tanggal_dikembalikan, $kondisi_kembali);

        $admin_id = $_SESSION['user']['id'];
        LogAktivitas::catat($admin_id, "Admin mengubah data pengembalian id=$id");

        header("Location: index.php?url=admin_pengembalian&success=Data pengembalian berhasil diupdate");
        exit;
    }

    public function hapus() {
        Auth::check();
        Auth::role('admin');

        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?url=admin_pengembalian");
            exit;
        }

        Pengembalian::adminDelete($id);

        $admin_id = $_SESSION['user']['id'];
        LogAktivitas::catat($admin_id, "Admin menghapus data pengembalian id=$id");

        header("Location: index.php?url=admin_pengembalian&success=Data pengembalian berhasil dihapus");
        exit;
    }
}
