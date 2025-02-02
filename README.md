# Aplikasi Komisi Marketing - Laravel & React

Aplikasi ini digunakan untuk menghitung komisi bulanan berdasarkan omzet yang dihasilkan oleh setiap marketing. Data omzet akan diambil dari tabel penjualan dan dihitung berdasarkan persentase komisi yang telah ditentukan. Aplikasi ini menggunakan **Laravel** sebagai backend dan **React** untuk frontend.

## Postman

https://documenter.getpostman.com/view/41732695/2sAYX3rPQW

## Fitur
- Menampilkan daftar marketing beserta omzet dan komisi per bulan.
- Menghitung komisi berdasarkan omzet yang dihasilkan.
- Rest API, Create Pembayaran and Get all Pembayaran & Komisi.
- Dapat diakses melalui API dan tampilan frontend menggunakan React.
- Register, Login, Profile

## Prasyarat

Pastikan Anda memiliki perangkat lunak berikut yang terpasang di sistem Anda:

- **PHP** versi 8.0 atau lebih baru
- **Composer** untuk mengelola dependensi PHP
- **MySQL** atau **MariaDB** untuk basis data
- **Node.js** dan **npm** untuk frontend (React.js)
- **Laravel** 11.x atau versi terbaru
- **npm** untuk mengelola dependensi frontend

## Langkah-langkah Instalasi

### 1. Clone Repository

Clone repository ini ke direktori lokal Anda.

```bash
https://github.com/gitapin82y/herca-group.git

jika prasyarat sudah terinstall semua jalankan project dengan langkah" berikut ini:
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. konfigurasi db .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
5. jalankan migrasi : php artisan migrate
6. jalankan laravel : php artisan serve
7. Instal Dependensi Frontend : npm install
8. Jalankan server frontend react : npm run dev

