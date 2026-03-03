<?php
class AuthController extends Controller {

    public function login() {
        $this->view("auth/login");
    }

    public function loginProcess() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::findByEmail($email);

        if ($user && $password == $user['password']) {
            $_SESSION['user'] = $user;

            // redirect sesuai role
            if ($user['role'] == 'admin') {
                header("Location: index.php?url=dashboard_admin");
            } elseif ($user['role'] == 'petugas') {
                header("Location: index.php?url=dashboard_petugas");
            } else {
                header("Location: index.php?url=dashboard_peminjam");
            }
            exit;

        }

        echo "Email atau password salah";
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?url=login");
        exit;
    }
}
