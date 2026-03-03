<?php
class AlatController extends Controller {

    public function index() {
        Auth::check();
        $data['alat'] = Alat::all();
        $this->view('admin/alat/index', $data);
    }

    public function tambah() {
        Auth::check();
        $data['kategori'] = Kategori::all();
        $this->view('admin/alat/tambah', $data);
    }

    public function simpan() {
        Auth::check();

        $nama     = $_POST['nama_alat'];
        $kategori = $_POST['kategori_id'];
        $stok     = $_POST['stok'];
        $kondisi  = $_POST['kondisi'];

        Alat::create($nama, $kategori, $stok, $kondisi);

        header("Location: index.php?url=alat");
        exit;
    }

    public function hapus() {
        Auth::check();

        $id = $_GET['id'];
        Alat::delete($id);

        header("Location: index.php?url=alat");
        exit;
    }
}
