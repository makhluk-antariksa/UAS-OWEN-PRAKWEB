studi kasus : 
Saya ingin membuat mvp aplikasi web CRUD menggunakan Laravel dengan judul Database Tanaman & Perawatan. Waktu pembuatan aplikasi yaitu 2 minggu. Jumlah actor yaitu 1. Buatkan daftar alur kerja dan fitur yang harus saya buat beserta deskripsinya.

nama database : owenz

CREATE TABLE kategoris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tanamans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tanaman VARCHAR(150) NOT NULL,
    kategori_id INT,
    deskripsi TEXT,
    gambar VARCHAR(255),
    tanggal_tanam DATE,
    lokasi VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (kategori_id) REFERENCES kategoris(id) ON DELETE SET NULL
);

CREATE TABLE perawatans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanaman_id INT NOT NULL,
    tanggal_perawatan DATE NOT NULL,
    jenis_perawatan VARCHAR(150),
    catatan TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tanaman_id) REFERENCES tanamans(id) ON DELETE CASCADE
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);






susunan folder dan file : 
owenz/                            ← nama folder Laravel project
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── TanamanController.php
│   │       ├── PerawatanController.php
│   │       ├── KategoriController.php
│   │       └── DashboardController.php
│   ├── Models/
│   │   ├── Tanaman.php
│   │   ├── Perawatan.php
│   │   └── Kategori.php
│
├── database/
│   ├── migrations/
│   │   ├── 2025_xx_xx_create_kategori_table.php
│   │   ├── 2025_xx_xx_create_tanaman_table.php
│   │   └── 2025_xx_xx_create_perawatan_table.php
│
├── public/
│   └── uploads/
│       └── tanaman/             ← tempat simpan gambar tanaman
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── dashboard.blade.php
│       ├── tanaman/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── perawatan/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── kategori/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       └── welcome.blade.php    ← halaman landing publik
│
├── routes/
│   └── web.php
│
├── .env                         ← konfigurasi database
├── artisan
└── composer.json


Fitur Minimum yang Wajib Ada:
Desain antarmuka responsif menggunakan framework CSS (Bootstrap atau Tailwind CSS)
Implementasi fungsi CRUD secara lengkap menggunakan Laravel
Fitur pencarian data
Validasi input pada form

Teknologi yang Digunakan:
Laravel (framework PHP)
Bootstrap atau Tailwind CSS (pilih salah satu)
MySQL (sebagai basis data)
Livewire atau Alpine.js (opsional, sesuai kebutuhan pengembangan)

