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
}
