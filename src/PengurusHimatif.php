<?php

require_once __DIR__ . '/Pengguna.php';

// Inheritance: PengurusHimatif juga mewarisi Pengguna
class PengurusHimatif extends Pengguna {
    private string $jabatan;

    public function __construct(string $id, string $nama, string $jabatan) {
        parent::__construct($id, $nama);
        $this->jabatan = $jabatan;
    }

    // Overriding: isi aksesUtama() beda dari anggota
    public function aksesUtama(): string {
        return "Mengelola konten HIMATIF serta membuka/menutup sesi rapat.";
    }

    public function tampilkanProfil(): string {
        return parent::tampilkanProfil() . " - Pengurus ({$this->jabatan})";
    }
}
