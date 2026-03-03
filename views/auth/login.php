<div class="text-center mb-6"> <h1 class="text-3xl font-bold text-sky-900">Peminjaman Alat</h1> <p class="text-sky-700 text-sm">Sistem Informasi Peminjaman</p> </div>

<form method="POST" action="index.php?url=loginProcess"
      class="flex flex-col items-center gap-4">

    <div class="w-full max-w-md">
        <label class="block text-sky-900 font-semibold mb-1">email</label>
        <input type="text" name="email"
               class="aero-input w-full"
               required>
    </div>

    <div class="w-full max-w-md">
        <label class="block text-sky-900 font-semibold mb-1">Password</label>
        <input type="password" name="password"
               class="aero-input w-full"
               required>
    </div>  

    <button type="submit" class="aero-btn">
        Login
    </button>

</form>
