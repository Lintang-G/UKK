<?php
class Log {

    public static function catat($user, $aktivitas) {
        global $conn;
        mysqli_query($conn, "
            INSERT INTO log_aktivitas (user_id, aktivitas)
            VALUES ($user, '$aktivitas')
        ");
    }
}
