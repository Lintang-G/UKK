<?php
require_once "../models/LogAktivitas.php";

class LogAktivitasController extends Controller {

    public function index() {
        Auth::check();
        Auth::role('admin');

        $data['log'] = LogAktivitas::all();
        $this->view('admin/log_aktivitas/index', $data);
    }

    public function hapus() {
        Auth::check();
        Auth::role('admin');

        $id = $_GET['id'] ?? null;
        if ($id) {
            LogAktivitas::hapus($id);
        }

        header("Location: index.php?url=log_aktivitas&success=Log berhasil dihapus");
        exit;
    }

    public function hapusSemua() {
        Auth::check();
        Auth::role('admin');

        LogAktivitas::hapusSemua();

        header("Location: index.php?url=log_aktivitas&success=Semua log berhasil dihapus");
        exit;
    }
}
