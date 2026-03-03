<?php
class UserController extends Controller {

    public function index() {
        Auth::check();
        $data['users'] = User::all();
        $this->view('admin/user/index', $data);
    }

    public function tambah() {
        Auth::check();
        $this->view('admin/user/tambah');
    }

    public function simpan() {
        Auth::check();

        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $role     = $_POST['role'];

        User::create($name, $email, $password, $role);

        header("Location: index.php?url=user");
        exit;
    }

    public function hapus() {
        Auth::check();

        $id = $_GET['id'];
        User::delete($id);

        header("Location: index.php?url=user");
        exit;
    }
}
