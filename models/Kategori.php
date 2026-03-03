<?php
class Kategori {

    public static function all() {
        global $conn;
        $q = mysqli_query($conn, "SELECT * FROM kategori");
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function create($nama) {
        global $conn;
        mysqli_query($conn, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
    }

    public static function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM kategori WHERE id=$id");
    }
}
