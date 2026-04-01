<div class="min-h-screen flex items-center justify-center p-6">
    <div class="aero-window w-full max-w-md animate-fade-in">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-sky-400 to-blue-600 rounded-2xl shadow-lg mb-4 border border-white/40">
                <i class="ph-fill ph-shield-check text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-sky-950 tracking-tight">Login</h1>
            <p class="text-sky-800/70 text-sm font-medium mt-2">Sistem Peminjaman</p>
        </div>

        <form method="POST" action="index.php?url=loginProcess" class="space-y-5">
            
            <div class="group">
                <label class="block text-sky-900 font-bold text-sm mb-1.5 ml-1">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-sky-500">
                        <i class="ph ph-envelope-simple text-lg"></i>
                    </span>
                    <input type="email" name="email" 
                           placeholder="name@example.com"
                           class="aero-input w-full pl-10 py-3 transition-all outline-none" 
                           required>
                </div>
            </div>

            <div class="group">
                <label class="block text-sky-900 font-bold text-sm mb-1.5 ml-1">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-sky-500">
                        <i class="ph ph-lock-key text-lg"></i>
                    </span>
                    <input type="password" name="password" 
                           placeholder="••••••••"
                           class="aero-input w-full pl-10 py-3 transition-all outline-none" 
                           required>
                </div>
            </div>

            <div class="pt-2 flex justify-center w-full">
                <button type="submit" class="aero-btn px-10 py-3 flex items-center justify-center gap-2">
                    <span>Sign In</span>
                    <i class="ph ph-arrow-right"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://unpkg.com/@phosphor-icons/web"></script>