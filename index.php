<?php

require_once __DIR__ . '/src/Pengguna.php';
require_once __DIR__ . '/src/BisaAbsen.php';
require_once __DIR__ . '/src/Anggota.php';
require_once __DIR__ . '/src/PengurusHimatif.php';
require_once __DIR__ . '/src/Rapat.php';

echo "=== MINI APPLICATION OOP: HIMATIF ===<br>\n<br>\n";

$anggota1 = new Anggota("2310001", "Fifi Nabilah Zulfa");
$anggota2 = new Anggota("2310002", "Sari Wulandari");
$pengurus1 = new PengurusHimatif("P001", "Dedi Prasetyo", "Ketua Umum");

// POLYMORPHISM: dikumpulkan sebagai array Pengguna,
// tapi method yang sama (tampilkanProfil & aksesUtama) menghasilkan
// perilaku berbeda tergantung object aslinya (Anggota / PengurusHimatif)
$daftarPengguna = [$anggota1, $pengurus1, $anggota2];

echo "--- Daftar Pengguna (polymorphism) ---<br>\n";
foreach ($daftarPengguna as $pengguna) {
    echo $pengguna->tampilkanProfil() . "<br>\n";
    echo "Akses utama: " . $pengguna->aksesUtama() . "<br>\n<br>\n";
}

// COMPOSITION: Rapat memiliki daftar peserta yang absen
echo "--- Simulasi Rapat (composition + interface) ---<br>\n";
$rapat = new Rapat("Rapat Koordinasi Mingguan");
$rapat->tambahKehadiran($anggota1);
$rapat->tambahKehadiran($anggota2);
$rapat->cetakKehadiran();
