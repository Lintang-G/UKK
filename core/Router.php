<?php
$url = $_GET['url'] ?? '';
if (!isset($_SESSION['user']) && $url != 'login' && $url != 'loginProcess') {
    header("Location: index.php?url=login");
    exit;
}


switch ($url) {

    case 'login':
        (new AuthController)->login();
        break;

    case 'loginProcess':
        (new AuthController)->loginProcess();
        break;

    case 'logout':
        (new AuthController)->logout();
        break;

    case 'admin':
        echo "Halaman Admin";
        break;

    case 'petugas':
        echo "Halaman Petugas";
        break;

    case 'peminjaman':
        require_once "../controllers/PeminjamanController.php";
        (new PeminjamanController)->index();
        break;

    case 'kategori':
        require_once "../controllers/KategoriController.php";
        require_once "../models/Kategori.php";
        (new KategoriController)->index();
        break;

    case 'kategori_tambah':
        require_once "../controllers/KategoriController.php";
        (new KategoriController)->tambah();
        break;

    case 'kategori_simpan':
        require_once "../controllers/KategoriController.php";
        (new KategoriController)->simpan();
        break;

    case 'kategori_hapus':
        require_once "../controllers/KategoriController.php";
        (new KategoriController)->hapus();
        break;

    case 'alat':
        require_once "../controllers/AlatController.php";
        (new AlatController)->index();
        break;

    case 'alat_tambah':
        require_once "../controllers/AlatController.php";
        (new AlatController)->tambah();
        break;

    case 'alat_simpan':
        require_once "../controllers/AlatController.php";
        (new AlatController)->simpan();
        break;

    case 'alat_hapus':
        require_once "../controllers/AlatController.php";
        (new AlatController)->hapus();
        break;

    case 'user':
        require_once "../controllers/UserController.php";
        (new UserController)->index();
        break;

    case 'user_tambah':
        require_once "../controllers/UserController.php";
        (new UserController)->tambah();
        break;

    case 'user_simpan':
        require_once "../controllers/UserController.php";
        (new UserController)->simpan();
        break;

    case 'user_hapus':
        require_once "../controllers/UserController.php";
        (new UserController)->hapus();
        break;

    case 'peminjaman_peminjam':
        require_once "../controllers/PeminjamanController.php";
        (new PeminjamanController)->peminjam();
        break;

    case 'peminjaman_pinjam':
        require_once "../controllers/PeminjamanController.php";
        (new PeminjamanController)->pinjam();
        break;
    
    case 'peminjaman_petugas':
        $controller = new PeminjamanController();
        $controller->petugas();   // ✅ BENAR
        break;
        
    case 'peminjaman_setujui':
        $controller = new PeminjamanController();
        $controller->setujui();
        break;
    
    case 'pengembalian':
        require_once "../controllers/PengembalianController.php";
        (new PengembalianController)->index();
        break;

    case 'pengembalian_kembali':
        require_once "../controllers/PengembalianController.php";
        (new PengembalianController)->kembali();
        break;
    
    case 'riwayat':
        require_once "../controllers/PeminjamanController.php";
        (new PeminjamanController)->riwayat();
        break;

    case 'dashboard_admin':
        require_once "../core/Controller.php";
        (new Controller)->view('admin/dashboard');
        break;

    case 'dashboard_petugas':
        require_once "../core/Controller.php";
        (new Controller)->view('petugas/dashboard');
        break;

    case 'dashboard_peminjam':
        require_once "../core/Controller.php";
        (new Controller)->view('peminjam/dashboard');
        break;


    case '':
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?url=login");
            exit;
        }

        $role = $_SESSION['user']['role'];

        if ($role == 'admin') {
            header("Location: index.php?url=dashboard_admin");
        } elseif ($role == 'petugas') {
            header("Location: index.php?url=dashboard_petugas");
        } else {
            header("Location: index.php?url=dashboard_peminjam");
        }
        exit;


    case 'resi':
        require_once "../controllers/PeminjamanController.php";
        (new PeminjamanController)->cetakResi();
        break;

    case 'peminjaman_laporan':
        require_once "../controllers/PeminjamanController.php";
        (new PeminjamanController)->laporan();
        break;

    case 'peminjaman_cetakLaporan':
        require_once "../controllers/PeminjamanController.php";
        (new PeminjamanController)->cetakLaporan();
        break;





        
    default:
        echo "404";
}