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
            <script src="https://unpkg.com/@phosphor-icons/web"></script>
            <link rel="stylesheet" href="/peminjaman_alat/public/css/aero.css">
        </head>
        
        <body class="aero-bg text-slate-800">

        <?php if ($view != 'auth/login'): ?>
            <div class="flex min-h-screen">
                <!-- Sidebar -->
                <aside class="w-64 backdrop-blur-md bg-white/20 border-r border-white/30 p-4">
                    <?php require "../views/layout/sidebar.php"; ?>
                </aside>

                <!-- Main Content -->
                <div class="flex-1 flex flex-col">
                    <!-- Header/Navbar -->
                    <header class="h-16 flex items-center justify-between px-8 bg-white/10 backdrop-blur-sm border-b border-white/20">
                        <h1 class="text-xl font-bold text-sky-900 uppercase tracking-wider">System Peminjaman</h1>
                        <div class="flex items-center gap-4">
                            <span class="text-sm font-medium">Welcome, Admin</span>
                        </div>
                    </header>

                    <main class="p-8">
                        <div class="aero-card animate-fade-in">
                            <?php require "../views/" . $view . ".php"; ?>
                        </div>
                    </main>
                </div>
            </div>
        <?php else: ?>
            <!-- Login View -->
            <div class="flex items-center justify-center min-h-screen">
                <div class="w-full max-w-md">
                    <?php require "../views/" . $view . ".php"; ?>
                </div>
            </div>
        <?php endif; ?>

        </body>
        </html>
        <?php
    }



}
