<?php

require_once __DIR__ . '/BisaAbsen.php';

// Composition: Rapat "memiliki" daftar peserta yang absen
// (daftar ini hanya bermakna selama object Rapat ini ada)
class Rapat {
    private string $judul;
    private array $pesertaHadir = [];

    public function __construct(string $judul) {
        $this->judul = $judul;
    }

    public function tambahKehadiran(BisaAbsen $peserta): void {
        $this->pesertaHadir[] = $peserta;
    }

    public function cetakKehadiran(): void {
        echo "Rapat: {$this->judul}<br>\n";
        foreach ($this->pesertaHadir as $peserta) {
            echo "- " . $peserta->absen() . "<br>\n";
        }
    }
}
