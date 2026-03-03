<?php

class Auth {
    public static function check() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
    }

    public static function role($role) {
        if ($_SESSION['user']['role'] != $role) {
            header("Location: index.php");
            exit;
        }
    }
}
