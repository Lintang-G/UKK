<?php
class PeminjamanController extends Controller {

    // ================= PEMINJAM =================

    public function index() {
        Auth::check();
        Auth::role('peminjam');

        $data['alat'] = Alat::all();
        $this->view('peminjam/peminjaman/index', $data);
    }

    public function pinjam() {
        Auth::check();
        Auth::role('peminjam');

        $user_id = $_SESSION['user']['id'];

        $alat_id = $_POST['id'] ?? null;
        $tanggal_kembali = $_POST['tanggal_kembali'] ?? null;

        if (!$alat_id || !$tanggal_kembali) {
            header("Location: index.php?url=peminjaman&error=Data peminjaman tidak lengkap");
            exit;
        }

        $tanggal_pinjam = date('Y-m-d');

        if ($tanggal_kembali < $tanggal_pinjam) {
            header("Location: index.php?url=peminjaman&error=Tanggal kembali tidak boleh sebelum tanggal pinjam");
            exit;
        }

        $hasil = Peminjaman::create($user_id, $alat_id, $tanggal_kembali);

        if ($hasil == "MASIH_PINJAM") {
            header("Location: index.php?url=peminjaman&error=Anda masih memiliki pinjaman aktif");
            exit;
        }

        if ($hasil == "STOK_HABIS") {
            header("Location: index.php?url=peminjaman&error=Stok alat habis");
            exit;
        }

        header("Location: index.php?url=riwayat&success=Peminjaman berhasil diajukan");
        exit;
}




    public function riwayat() {
        Auth::check();
        Auth::role('peminjam');

        $user_id = $_SESSION['user']['id'];
        $data['riwayat'] = Peminjaman::riwayatUser($user_id);

        $this->view('peminjam/riwayat/index', $data);
    }

    public function petugas() {
        Auth::check();
        Auth::role('petugas');

        $data['peminjaman'] = Peminjaman::menunggu();
        $this->view('petugas/peminjaman/index', $data);
    }

    public function setujui() {
        Auth::check();
        Auth::role('petugas');

        $id = $_GET['id'];
        Peminjaman::setujui($id);

        header("Location: index.php?url=resi&id=".$id);
        exit;
    }

    public function cetakResi() {
        Auth::check();

        require_once "../libraries/fpdf/fpdf.php";

        $id = $_GET['id'];
        $data = Peminjaman::detailResi($id);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        $pdf->Cell(0,10,'RESI PEMINJAMAN ALAT',0,1,'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,10,'ID Peminjaman      : '.$data['id'],0,1);
        $pdf->Cell(0,10,'Nama Peminjam      : '.$data['name'],0,1);
        $pdf->Cell(0,10,'Nama Alat          : '.$data['nama_alat'],0,1);
        $pdf->Cell(0,10,'Tanggal Pinjam     : '.$data['tanggal_pinjam'],0,1);
        $pdf->Cell(0,10,'Batas Pengembalian : '.$data['tanggal_kembali'],0,1);

        $pdf->Ln(20);
        $pdf->Cell(0,10,'Tanda Tangan Petugas',0,1,'R');

        $pdf->Output();
    }

    public function laporan() {
        Auth::check();
        Auth::role('petugas');

        $this->view('petugas/laporan/index');
    }

    public function cetakLaporan() {
        Auth::check();
        Auth::role('petugas');

        require_once "../libraries/fpdf/fpdf.php";

        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];

        $data = Peminjaman::laporan($dari, $sampai);

        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);

        $pdf->Cell(0,10,"LAPORAN PEMINJAMAN ALAT",0,1,'C');
        $pdf->Cell(0,10,"Periode: $dari s/d $sampai",0,1,'C');
        $pdf->Ln(5);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(40,10,'Peminjam',1);
        $pdf->Cell(40,10,'Alat',1);
        $pdf->Cell(30,10,'Pinjam',1);
        $pdf->Cell(30,10,'Kembali Rencana',1);
        $pdf->Cell(30,10,'Kembali Real',1);
        $pdf->Cell(25,10,'Status',1);
        $pdf->Cell(25,10,'Denda',1);
        $pdf->Ln();

        $pdf->SetFont('Arial','',10);

        foreach ($data as $d) {
            $pdf->Cell(40,10,$d['name'],1);
            $pdf->Cell(40,10,$d['nama_alat'],1);
            $pdf->Cell(30,10,$d['tanggal_pinjam'],1);
            $pdf->Cell(30,10,$d['tanggal_kembali'],1);
            $pdf->Cell(30,10,$d['tanggal_kembali_real'] ?? '-',1);
            $pdf->Cell(25,10,$d['status'],1);
            $pdf->Cell(25,10,'Rp '.$d['denda'],1);
            $pdf->Ln();
        }

        $pdf->Output();
    }



}
    