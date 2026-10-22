<?php

// Abstract class: induk dari semua jenis pengguna sistem HIMATIF
abstract class Pengguna {
    protected string $id;
    protected string $nama;

    public function __construct(string $id, string $nama) {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getNama(): string {
        return $this->nama;
    }

    // Method biasa (punya isi default) -> akan di-override oleh subclass
    public function tampilkanProfil(): string {
        return "{$this->nama} ({$this->id})";
    }

    // Method abstract: wajib diisi beda-beda oleh tiap subclass
    abstract public function aksesUtama(): string;
}
