<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Peminjaman Alat</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="stylesheet" href="/peminjaman_alat/public/css/aero.css">
        </head>
        <body class="aero-bg">

        <?php

        if ($view != 'auth/login') {
            require "../views/layout/navbar.php";
        }
        ?>

        <div class="max-w-6xl mx-auto mt-8 aero-card">
            <?php require "../views/" . $view . ".php"; ?>
        </div>

        </body>
        </html>
        <?php
    }



}
