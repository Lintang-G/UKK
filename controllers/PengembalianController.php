<?php
require_once "../models/Peminjaman.php";
require_once "../models/Alat.php";

class PengembalianController extends Controller {

    public function index() {
        Auth::check();
        $data['pinjam'] = Peminjaman::sedangDipinjam();
        $this->view('petugas/pengembalian/index', $data);
    }

    public function kembali() {
        $id = $_GET['id'];

        Peminjaman::kembali($id);

        header("Location: index.php?url=pengembalian");
        exit;
    }
}
