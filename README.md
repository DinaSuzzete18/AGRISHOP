# AGRISHOP
<p align="center">
  <img src="https://github.com/DinaSuzzete18/AGRISHOP/blob/main/img/Home.JPG" width="600"/>
</p>

**AGRISHOP** adalah sebuah marketplace penjualan hasil tani yang dibangun berbasis database. Platform ini menggunakan tools, yaitu:
1. phpMyAdmin,
2. JavaScript,
3. MySQL,
4. SQL, dan
5. PHP

Platform ini dirancang dengan struktur database yang terorganisasi untuk menunjang efisiensi pengolahan data penjualan dan pemrosesan pesanan. Dalam sistem ini, terdapat tiga peran utama yaitu user, admin, dan penjual, masing-masing dengan akses dan fungsi yang berbeda.

## 🔑 Fitur Utama Berdasarkan Peran

### 👤 User (Pembeli)
<p align="center">
  <img src="https://github.com/DinaSuzzete18/AGRISHOP/blob/main/img/SHOP.JPG" width="600"/>
</p>

- Menu: `Home`, `Shop`, `Login`, `Keranjang`, `User`, `Checkout`
- Fitur:
  - Login diperlukan untuk mengakses fitur checkout, pembayaran, dan riwayat belanja.
  - **Checkout**:
    - Tombol terlihat sebelum dan sesudah login, namun hanya aktif setelah login.
  - **Pembayaran**:
    - Lihat faktur
    - Input bukti pembayaran
    - Batalkan pembayaran
  - **Riwayat Belanja**:
    - Konfirmasi barang diterima / return
    - Ajukan komplain
    - Beri rating produk setelah barang diterima atau dikembalikan

---

### 🛒 Penjual
<p align="center">
  <img src="https://github.com/DinaSuzzete18/AGRISHOP/blob/main/img/Penjual.JPG" width="600"/>
</p>
- Fitur:
  - **Dashboard**:
    - Laporan produk terlaris
    - Laporan stok
    - Laporan penjualan
  - **Manajemen Barang**:
    - Tambah barang baru
    - Perbarui stok
  - **Faktur**:
    - `Faktur Rinci`: Menampilkan detail pembelian per barang
    - `Faktur Beli`: Menampilkan seluruh pembelian berdasarkan toko
  - **Status Pengiriman**:
    - Ubah status barang menjadi `Packing` atau `Dikirim` di halaman faktur rinci

---

### 🛠️ Admin

- Fitur:
  - Menangani error sistem
  - Verifikasi pembayaran
    - Menyetujui atau menolak pembayaran
  - Mengirim notifikasi ke penjual untuk:
    - Melakukan packing
    - Mengirim pesanan

---


Fitur Utama:
1. Manajemen Produk: Tambah, edit, dan hapus produk dengan kategori dan deskripsi yang lengkap.
2. Pemrosesan Pesanan: Sistem otomatisasi untuk memproses pesanan dan memperbarui stok.
3. Laporan Penjualan: Menyediakan data statistik dan analisis terkait penjualan.
4. Laporan Pembelian: User dapat melihat rinci barang-barang yang telah dibeli.

Teknologi yang Digunakan:
1. Backend: PHP dan SQL untuk mengelola database dan logika bisnis.
2. Frontend: JavaScript, HTML, dan CSS untuk antarmuka pengguna yang responsif.
3. Database Management: phpMyAdmin untuk administrasi basis data
