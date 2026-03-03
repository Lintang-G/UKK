<?php
class Alat {

    public static function all() {
        global $conn;
        $q = mysqli_query($conn, "
            SELECT alat.*, kategori.nama_kategori 
            FROM alat
            JOIN kategori ON alat.kategori_id = kategori.id
        ");
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function create($nama, $kategori, $stok, $kondisi) {
        global $conn;
        mysqli_query($conn, "
            INSERT INTO alat (nama_alat, kategori_id, stok, kondisi)
            VALUES ('$nama', $kategori, $stok, '$kondisi')
        ");
    }

    // ⬇️ TAMBAHKAN INI
    public static function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM alat WHERE id=$id");
    }
    public static function kurangiStok($id) {
        global $conn;

        mysqli_query($conn, "
            UPDATE alat 
            SET stok = stok - 1 
            WHERE id=$id AND stok > 0
        ");
    }


    public static function tambahStok($id) {
        global $conn;
        mysqli_query($conn, "UPDATE alat SET stok = stok + 1 WHERE id=$id");
    }

}
