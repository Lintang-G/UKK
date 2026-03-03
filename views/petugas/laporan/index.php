<h2 class="aero-header">Laporan Peminjaman</h2>
<br><br>
<form action="index.php" method="GET" class="flex gap-4 mt-4">
    <input class="aero-input" type="hidden" name="url" value="peminjaman_cetakLaporan">

    <div>
        <label>Dari Tanggal</label><br>
        <input type="date" name="dari" required class="aero-input">
    </div>

    <div>
        <label>Sampai Tanggal</label><br>
        <input type="date" name="sampai" required class="aero-input">
    </div>

    <div class="self-end">
        <button class="aero-btn">
            Cetak Laporan
        </button>
    </div>
</form>
