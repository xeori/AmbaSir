# AmbaSir - Part Komputer Sederhana

AmbaSir adalah proyek ujian kompetensi yang dikembangkan sebagai bagian dari ujian akhir komputer sederhana.

## Deskripsi

Proyek ini bertujuan untuk membuat sebuah sistem kasir sederhana yang dapat mencatat transaksi penjualan dan mengelola inventaris.

## Fitur
- CRUD
- Multi User
- Pencatatan transaksi penjualan
- Manajemen inventaris
- Laporan penjualan

## Instalasi

Berikut adalah langkah-langkah untuk menjalankan proyek ini secara lokal:

1. Clone repositori ini: `git clone https://github.com/xeori/AmbaSir.git`
2. Masuk ke direktori proyek: `cd AmbaSir`
3. Update Composer: `composer update`
4. Generate env: `cp .env.example .env` dan `php artisan key:generate`
4. Migrate Database: `php artisan migrate`
5. Migrate Userseeder: 'php artisan db:seed --class=UsersSeeder'
6. Run 'php artisan serve'

## Lisensi

Proyek ini dilisensikan xeori.

## Kontak

Jika Anda memiliki pertanyaan atau masukan, hubungi saya di yudhaamarthatungga@gmail.com.

