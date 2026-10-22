# Mini Application OOP — Sistem Informasi & Absensi HIMATIF

**Nama:** Fifi Nabilah Zulfa
**Mata kuliah:** Pemrograman Berorientasi Objek (TI033015)
**Tugas:** Tugas Rumah — Mini Application OOP (dikerjakan setelah kelas)

## 1. Domain & Kandidat Class

Domain yang dipakai adalah **Sistem Informasi & Absensi HIMATIF**, kelanjutan dari hasil analisis Pertemuan 2/3. Minimal 4 kandidat class:

1. `Pengguna` (abstract class) — induk dari semua jenis pengguna sistem.
2. `Anggota` — mewarisi `Pengguna`, bisa melakukan absensi.
3. `PengurusHimatif` — mewarisi `Pengguna`, mengelola konten & rapat.
4. `Rapat` — memiliki daftar peserta yang hadir (composition).
5. `BisaAbsen` (interface) — kontrak untuk pengguna yang boleh absen.

## 2. Masalah

HIMATIF butuh satu sistem yang membedakan hak akses antara **anggota biasa** (yang hanya login dan absen) dan **pengurus** (yang mengelola konten dan mengatur rapat), tanpa menulis ulang struktur dasar pengguna dua kali.

## 3. Desain & Relasi

- **Inheritance**: `Anggota` dan `PengurusHimatif` sama-sama `extends Pengguna`. Keduanya berbagi data dasar (`id`, `nama`) dan method `tampilkanProfil()`, tanpa duplikasi kode.
- **Interface**: `Anggota implements BisaAbsen`. `PengurusHimatif` tidak mengimplementasikan interface ini karena pengurus tidak absen lewat jalur yang sama seperti anggota.
- **Composition**: `Rapat` **memiliki** daftar objek `BisaAbsen` (peserta hadir). Daftar ini hanya bermakna selama object `Rapat` tersebut ada — relasi "has-a", bukan "is-a".
- **Abstract class**: `Pengguna` punya method `aksesUtama()` yang abstract (wajib diisi beda oleh tiap anak) dan method `tampilkanProfil()` yang punya isi default tapi di-**override** oleh `Anggota` dan `PengurusHimatif` untuk menambahkan label role.
- **Polymorphism**: array `$daftarPengguna` berisi campuran `Anggota` dan `PengurusHimatif`, tapi dipanggil lewat satu loop yang sama (`tampilkanProfil()`, `aksesUtama()`) — hasilnya berbeda tergantung object aslinya, tanpa perlu `if/else` cek tipe.

## 4. Alasan Pilihan Relasi

- **Inheritance dipilih** untuk `Anggota`/`PengurusHimatif` karena keduanya benar-benar jenis dari `Pengguna` (hubungan "is-a") dan berbagi data dasar yang sama persis.
- **Interface dipilih** untuk `BisaAbsen` karena kemampuan absen bukan ciri semua `Pengguna`, melainkan kapabilitas khusus — cocok sebagai kontrak terpisah, bukan dipaksakan lewat inheritance.
- **Composition dipilih** untuk `Rapat` karena peserta rapat bukan "jenis dari" `Rapat` (bukan "is-a"), melainkan "dimiliki sementara oleh" `Rapat` selama rapat itu berlangsung.

## 5. Cara Menjalankan

```
php index.php
```

Struktur project:
```
himatif-mini-oop/
├── index.php
├── src/
│   ├── Pengguna.php
│   ├── BisaAbsen.php
│   ├── Anggota.php
│   ├── PengurusHimatif.php
│   └── Rapat.php
├── screenshot.png
└── README.md
```
