<?php
class Pengembalian {

    public static function create($peminjaman, $kondisi) {
        global $conn;

        mysqli_query($conn, "
            INSERT INTO pengembalian (peminjaman_id, tanggal_dikembalikan, kondisi_kembali)
            VALUES ($peminjaman, NOW(), '$kondisi')
        ");

        mysqli_query($conn, "
            UPDATE peminjaman SET status='selesai' WHERE id=$peminjaman
        ");
    }

    // ============ ADMIN METHODS ============

    public static function all() {
        global $conn;
        $q = mysqli_query($conn, "
            SELECT pg.*, p.tanggal_pinjam, p.tanggal_kembali, p.status,
                   u.name AS nama_peminjam, a.nama_alat
            FROM pengembalian pg
            JOIN peminjaman p ON pg.peminjaman_id = p.id
            JOIN users u ON p.user_id = u.id
            JOIN alat a ON p.alat_id = a.id
            ORDER BY pg.id DESC
        ");
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function findById($id) {
        global $conn;
        $id = (int)$id;
        $q = mysqli_query($conn, "
            SELECT pg.*, p.tanggal_pinjam, p.tanggal_kembali, p.status,
                   u.name AS nama_peminjam, a.nama_alat
            FROM pengembalian pg
            JOIN peminjaman p ON pg.peminjaman_id = p.id
            JOIN users u ON p.user_id = u.id
            JOIN alat a ON p.alat_id = a.id
            WHERE pg.id = $id
        ");
        return mysqli_fetch_assoc($q);
    }

    public static function adminCreate($peminjaman_id, $tanggal_dikembalikan, $kondisi_kembali) {
        global $conn;
        $peminjaman_id        = (int)$peminjaman_id;
        $tanggal_dikembalikan = mysqli_real_escape_string($conn, $tanggal_dikembalikan);
        $kondisi_kembali      = mysqli_real_escape_string($conn, $kondisi_kembali);
        mysqli_query($conn, "
            INSERT INTO pengembalian (peminjaman_id, tanggal_dikembalikan, kondisi_kembali)
            VALUES ($peminjaman_id, '$tanggal_dikembalikan', '$kondisi_kembali')
        ");
        mysqli_query($conn, "UPDATE peminjaman SET status='dikembalikan' WHERE id=$peminjaman_id");
        return mysqli_insert_id($conn);
    }

    public static function adminUpdate($id, $peminjaman_id, $tanggal_dikembalikan, $kondisi_kembali) {
        global $conn;
        $id                   = (int)$id;
        $peminjaman_id        = (int)$peminjaman_id;
        $tanggal_dikembalikan = mysqli_real_escape_string($conn, $tanggal_dikembalikan);
        $kondisi_kembali      = mysqli_real_escape_string($conn, $kondisi_kembali);
        mysqli_query($conn, "
            UPDATE pengembalian
            SET peminjaman_id=$peminjaman_id,
                tanggal_dikembalikan='$tanggal_dikembalikan',
                kondisi_kembali='$kondisi_kembali'
            WHERE id=$id
        ");
    }

    public static function adminDelete($id) {
        global $conn;
        $id = (int)$id;
        mysqli_query($conn, "DELETE FROM pengembalian WHERE id=$id");
    }
}
