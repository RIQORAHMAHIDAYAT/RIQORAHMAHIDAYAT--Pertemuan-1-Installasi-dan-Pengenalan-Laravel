<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/home', function () {
    return "
    <div style='text-align: center;'>
        <h2>Selamat datang di Blibli Clone</h2>
        <br><br>
        <a href='/kategori'>Kategori Produk</a>
        <br><br>
        <a href='/produk-unggulan'>Produk Unggulan</a>
        <br><br>
        <a href='/promo-hari-ini'>Promo Hari Ini</a>
        <br><br>
        <a href='/keranjang'>Keranjang Saya</a>
        <br><br>
        <a href='/checkout'>Lanjut ke Pembayaran</a>
    </div>
    ";
});

// Halaman kategori
Route::get('/kategori', function () {
    return 'Ini adalah halaman kategori produk Blibli';
});

// Halaman produk unggulan
Route::get('/produk-unggulan', function () {
    return 'Ini adalah halaman produk unggulan Blibli';
});

// Halaman promo hari ini
Route::get('/promo-hari-ini', function () {
    return 'Ini adalah halaman promo hari ini Blibli';
});

// Halaman keranjang belanja
Route::get('/keranjang', function () {
    return 'Ini adalah halaman keranjang saya Blibli';
});

// Halaman checkout (memerlukan login)
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', function () {
        return 'Ini adalah halaman pembayaran Blibli';
    });
});

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';