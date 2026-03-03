<?php
class DashboardController extends Controller {

    public function admin() {
        Auth::check();
        Auth::role('admin');
        $this->view('admin/dashboard');
    }

    public function petugas() {
        Auth::check();
        Auth::role('petugas');
        $this->view('petugas/dashboard');
    }

    public function peminjam() {
        Auth::check();
        Auth::role('peminjam');
        $this->view('peminjam/dashboard');
    }
}
