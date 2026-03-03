<?php
class KategoriController extends Controller {

    public function index() {
        Auth::check();
        $data['kategori'] = Kategori::all();
        $this->view('admin/kategori/index', $data);
    }

    public function tambah() {
        Auth::check();
        $this->view('admin/kategori/tambah');
    }

    public function simpan() {
        Auth::check();
        $nama = $_POST['nama_kategori'];
        Kategori::create($nama);
        header("Location: index.php?url=kategori");
        exit;
    }

    public function hapus() {
        Auth::check();
        $id = $_GET['id'];
        Kategori::delete($id);
        header("Location: index.php?url=kategori");
        exit;
    }
}
