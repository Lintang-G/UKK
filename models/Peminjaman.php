<?php
class Peminjaman {

    public static function create($user, $alat, $tanggal_kembali) {
        global $conn;

        $cek = mysqli_query($conn, "
            SELECT id FROM peminjaman 
            WHERE user_id=$user 
            AND (status='menunggu' OR status='dipinjam')
        ");

        if (mysqli_num_rows($cek) > 0) {
            return "MASIH_PINJAM";
        }

        $q = mysqli_query($conn, "SELECT stok FROM alat WHERE id=$alat");
        $data = mysqli_fetch_assoc($q);

        if ($data['stok'] <= 0) {
            return "STOK_HABIS";
        }

        mysqli_query($conn, "
            INSERT INTO peminjaman 
            (user_id, alat_id, tanggal_pinjam, tanggal_kembali, status)
            VALUES 
            ($user, $alat, NOW(), '$tanggal_kembali', 'menunggu')
        ");

        return "OK";
    }


    public static function menunggu() {
        global $conn;
        $q = mysqli_query($conn, "
            SELECT peminjaman.*, users.name, alat.nama_alat
            FROM peminjaman
            JOIN users ON peminjaman.user_id = users.id
            JOIN alat ON peminjaman.alat_id = alat.id
            WHERE status='menunggu'
        ");
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function setujui($id) {
        global $conn;

        $q = mysqli_query($conn, "SELECT alat_id FROM peminjaman WHERE id=$id");
        $data = mysqli_fetch_assoc($q);

        Alat::kurangiStok($data['alat_id']);

        mysqli_query($conn, "
            UPDATE peminjaman SET status='dipinjam' WHERE id=$id
        ");
    }

    public static function sedangDipinjam() {
        global $conn;
        $q = mysqli_query($conn, "
            SELECT peminjaman.*, users.name, alat.nama_alat
            FROM peminjaman
            JOIN users ON peminjaman.user_id = users.id
            JOIN alat ON peminjaman.alat_id = alat.id
            WHERE status='dipinjam'
        ");
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function kembali($id) {
        global $conn;

        $today = date('Y-m-d');

        $q = mysqli_query($conn, "
            SELECT alat_id, tanggal_kembali 
            FROM peminjaman 
            WHERE id=$id
        ");
        $data = mysqli_fetch_assoc($q);

        $batas = new DateTime($data['tanggal_kembali']);
        $real  = new DateTime($today);

        $denda = 0;
        if ($real > $batas) {
            $selisih = $batas->diff($real)->days;
            $denda = $selisih * 5000;
        }

        Alat::tambahStok($data['alat_id']);

        mysqli_query($conn, "
            UPDATE peminjaman 
            SET 
                status='dikembalikan',
                tanggal_kembali_real='$today',
                denda=$denda
            WHERE id=$id
        ");
    }

    public static function riwayatUser($user_id) {
        global $conn;

        $q = mysqli_query($conn, "
            SELECT peminjaman.*, alat.nama_alat
            FROM peminjaman
            JOIN alat ON peminjaman.alat_id = alat.id
            WHERE peminjaman.user_id = $user_id
            ORDER BY peminjaman.id DESC
        ");

        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function detailResi($id) {
        global $conn;

        $q = mysqli_query($conn, "
            SELECT p.id, u.name, a.nama_alat, 
                   p.tanggal_pinjam, p.tanggal_kembali, 
                   p.tanggal_kembali_real, p.denda
            FROM peminjaman p
            JOIN users u ON p.user_id = u.id
            JOIN alat a ON p.alat_id = a.id
            WHERE p.id = $id
        ");

        return mysqli_fetch_assoc($q);
    }
        
    public static function laporan($dari, $sampai) {
        global $conn;

        $q = mysqli_query($conn, "
            SELECT p.*, u.name, a.nama_alat
            FROM peminjaman p
            JOIN users u ON p.user_id = u.id
            JOIN alat a ON p.alat_id = a.id
            WHERE DATE(p.tanggal_pinjam) BETWEEN '$dari' AND '$sampai'
            ORDER BY p.tanggal_pinjam ASC
        ");

        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

}
