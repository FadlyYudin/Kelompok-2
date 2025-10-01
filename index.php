<?php
// index.php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
include 'views/header.php';

// Daftar halaman yang valid
$validPages = [
    'home',
    'produk',
    'katalog',
    'keranjang',
    'checkout',
    'tentang',
    'kontak',
    'login',
    'register',
    'tambah_produk',
    'tambah_kategori',
    'produk_admin',
    'edit_produk',
    'hapus_produk',
    'laporan_penjualan',
    'daftar_customer',
    'detail_customer',
    'tambah_customer',
    'edit_customer',
    'hapus_customer',
    'blokir_customer',
    'buka_blokir_customer',
    'ganti_password_customer',
    'riwayat_pembelian',
    'profil_customer',
    'detail_produk'
];

// Halaman khusus admin
$adminPages = [
    'tambah_produk',
    'tambah_kategori',
    'produk_admin',
    'edit_produk',
    'hapus_produk',
    'laporan_penjualan',
    'daftar_customer',
    'detail_customer',
    'tambah_customer',
    'edit_customer',
    'hapus_customer',
    'blokir_customer',
    'buka_blokir_customer',
    'ganti_password_customer'
];

// Halaman khusus customer/admin
$customerPages = [
    'produk',
    'keranjang',
    'checkout',
    'riwayat_pembelian',
    'profil_customer',
    'detail_produk'
];

if (in_array($page, $validPages)) {
    // Aliaskan katalog ke produk
    if ($page === 'katalog') {
        include 'views/produk.php';
    }
    // Halaman admin
    elseif (in_array($page, $adminPages)) {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            echo '<div style="color:red;">Akses hanya untuk admin.</div>';
        } else {
            switch ($page) {
                case 'tambah_produk':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        include 'controllers/tambah_produk.php';
                    }
                    include 'views/tambah_produk.php';
                    break;
                case 'produk_admin':
                    include 'views/produk_admin.php';
                    break;
                case 'edit_produk':
                    include 'views/edit_produk.php';
                    break;
                case 'hapus_produk':
                    include 'controllers/hapus_produk.php';
                    break;
                case 'tambah_kategori':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        include 'controllers/tambah_kategori.php';
                    }
                    include 'views/tambah_kategori.php';
                    break;
                case 'laporan_penjualan':
                    include 'views/laporan_penjualan.php';
                    break;
                case 'daftar_customer':
                    include 'views/daftar_customer.php';
                    break;
                case 'detail_customer':
                    include 'views/detail_customer.php';
                    break;
                case 'tambah_customer':
                    include 'views/tambah_customer.php';
                    break;
                case 'edit_customer':
                    include 'views/edit_customer.php';
                    break;
                case 'hapus_customer':
                    include 'controllers/hapus_customer.php';
                    break;
                case 'blokir_customer':
                    include 'controllers/blokir_customer.php';
                    break;
                case 'buka_blokir_customer':
                    include 'controllers/buka_blokir_customer.php';
                    break;
                case 'ganti_password_customer':
                    include 'views/ganti_password_customer.php';
                    break;
            }
        }
    }
    // Halaman customer/admin
    elseif (in_array($page, $customerPages)) {
        if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], ['customer', 'admin'])) {
            echo '<div style="color:red;">Silakan login untuk mengakses halaman ini.</div>';
        } else {
            switch ($page) {
                case 'produk':
                    include 'views/produk.php';
                    break;
                case 'keranjang':
                    include 'views/keranjang.php';
                    break;
                case 'checkout':
                    include 'views/checkout.php';
                    break;
                case 'riwayat_pembelian':
                    include 'views/riwayat_pembelian.php';
                    break;
                case 'profil_customer':
                    include 'views/profil_customer.php';
                    break;
                case 'detail_produk':
                    include 'views/detail_produk.php';
                    break;
            }
        }
    }
    // Halaman umum
    else {
        if ($page === 'home' && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'customer') {
            include 'views/home_customer.php';
        } else {
            include "views/{$page}.php";
        }
    }
} else {
    include 'views/home.php';
}
?>
