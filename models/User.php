<?php
class User {
    public static function findByEmail($email) {
        global $conn;

        $email = mysqli_real_escape_string($conn, $email);
        $q = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        return mysqli_fetch_assoc($q);
    }
    public static function all() {
        global $conn;
        $q = mysqli_query($conn, "SELECT * FROM users");
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }

    public static function create($name, $email, $password, $role) {
        global $conn;
        mysqli_query($conn, "
            INSERT INTO users (name, email, password, role)
            VALUES ('$name', '$email', '$password', '$role')
        ");
    }

    public static function delete($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    }

}
