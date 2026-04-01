<?php
class LogAktivitas {

    public static function catat($user, $aktivitas) {
        global $conn;
        $aktivitas = mysqli_real_escape_string($conn, $aktivitas);
        mysqli_query($conn, "
            INSERT INTO log_aktivitas (user_id, aktivitas, waktu)
            VALUES ($user, '$aktivitas', NOW())
        ");
    }

    public static function all() {
        global $conn;
        $q = mysqli_query($conn, "
            SELECT l.*, u.name, u.role
            FROM log_aktivitas l
            JOIN users u ON l.user_id = u.id
            ORDER BY l.waktu DESC
        ");
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function hapus($id) {
        global $conn;
        $id = (int)$id;
        mysqli_query($conn, "DELETE FROM log_aktivitas WHERE id=$id");
    }

    public static function hapusSemua() {
        global $conn;
        mysqli_query($conn, "DELETE FROM log_aktivitas");
    }
}
