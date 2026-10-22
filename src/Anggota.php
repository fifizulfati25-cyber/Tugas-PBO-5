<?php

require_once __DIR__ . '/Pengguna.php';
require_once __DIR__ . '/BisaAbsen.php';

// Inheritance: Anggota mewarisi Pengguna
// Interface: Anggota berjanji bisa absen()
class Anggota extends Pengguna implements BisaAbsen {

    // Overriding: isi aksesUtama() beda dari pengurus
    public function aksesUtama(): string {
        return "Login dan mengisi absensi rapat.";
    }

    public function absen(): string {
        return "{$this->nama} hadir dan absen.";
    }

    // Overriding: tambah label role di profil
    public function tampilkanProfil(): string {
        return parent::tampilkanProfil() . " - Anggota";
    }
}
