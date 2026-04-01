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

        <?php if ($view != 'auth/login'): ?>
            <div class="flex min-h-screen">

                <?php require "../views/layout/sidebar.php"; ?>

                <div class="flex-1 p-6">
                    <div class="max-w-6xl mx-auto mt-8 aero-card">
                        <?php require "../views/" . $view . ".php"; ?>
                    </div>
                </div>

            </div>
        <?php else: ?>

            <?php require "../views/" . $view . ".php"; ?>

        <?php endif; ?>

        </body>
        </html>
        <?php
    }



}
