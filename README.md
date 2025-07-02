Toko Online CodeIgniter 4
Proyek ini adalah platform toko online yang dibangun menggunakan CodeIgniter 4. Sistem ini mencakup fitur katalog produk, keranjang belanja, diskon, sistem transaksi, manajemen pembelian oleh admin, dan dashboard monitoring transaksi melalui API.

Daftar Isi
Fitur

Persyaratan Sistem

Instalasi

Struktur Proyek

Fitur
👤 Autentikasi
Login dan register pengguna.

Manajemen sesi dan role (admin dan pembeli).

🛒 Keranjang & Checkout
Tambah produk ke keranjang.

Edit jumlah produk, hapus, dan kosongkan keranjang.

Proses checkout dengan form alamat dan perhitungan ongkir dari API RajaOngkir.

Diskon otomatis dari sesi jika tersedia.

📦 Manajemen Produk & Diskon (Admin)
CRUD produk.

CRUD kategori produk.

CRUD diskon (dengan validasi tanggal unik).

Produk bisa memiliki gambar dan informasi harga.

💳 Transaksi & Riwayat
Simpan transaksi dan detail pembelian (item, qty, harga, diskon).

Lihat riwayat pesanan untuk pengguna.

Admin dapat melihat semua transaksi.

📊 Manajemen Pembelian (Admin)
Tabel pembelian semua user.

Admin bisa ubah status pesanan:

0 = Belum Selesai

1 = Sudah Selesai

🌐 API & Dashboard
API endpoint yang mengembalikan data transaksi (dengan header key).

Dashboard terpisah menggunakan cURL untuk menampilkan transaksi + jumlah item dari webservice.

Persyaratan Sistem
PHP >= 8.2

Composer

Web server (XAMPP atau setara)

MySQL (phpMyAdmin)

Instalasi
Clone repository ini


<pre> <code> ```
git clone [URL repository]
cd belajar-ci-tugas
Install dependensi
``` </code> </pre>

<pre> <code> ```
composer install
Konfigurasi environment & database
``` </code> </pre>

Salin .env.example menjadi .env dan sesuaikan isinya (nama DB, user, password, dll).

Jalankan Apache dan MySQL dari XAMPP.

Buat database bernama db_ci4 di phpMyAdmin.

Migrasi database

<pre> <code> ```
php spark migrate
``` </code> </pre>

Seeding data awal

<pre> <code> ```
php spark db:seed ProductSeeder
php spark db:seed UserSeeder
php spark db:seed DiskonSeeder
``` </code> </pre>

Jalankan server lokal

<pre> <code> ```
php spark serve
``` </code> </pre>

Akses aplikasi
Buka browser dan kunjungi:
http://localhost:8080

Struktur Proyek
Proyek menggunakan struktur MVC bawaan CodeIgniter 4.

📁 app/
Controllers/

AuthController.php - Login dan register.

ProdukController.php - CRUD produk.

DiskonController.php - CRUD diskon.

TransaksiController.php - Keranjang, checkout, dan manajemen transaksi.

PembelianController.php - Panel admin untuk ubah status pesanan.

ApiController.php - API endpoint untuk dashboard.

Models/

UserModel.php - Model user.

ProductModel.php - Model produk.

DiskonModel.php - Model diskon.

TransactionModel.php - Model transaksi.

TransactionDetailModel.php - Detail transaksi.

Views/

v_produk.php, v_keranjang.php, v_checkout.php

admin/v_pembelian.php - Panel admin untuk pembelian

auth/login.php, auth/register.php

📁 public/
img/ - Upload gambar produk.

NiceAdmin/ - Template admin UI (dengan Bootstrap & Icons).

dashboardtoko/index.php - Dashboard monitoring via API (menggunakan cURL).

