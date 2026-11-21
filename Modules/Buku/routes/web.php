<?php

use Illuminate\Support\Facades\Route;
use Modules\Buku\Http\Controllers\BukuController;

// Admin dan user boleh melihat daftar buku.
Route::middleware(['auth', 'role:admin,user'])->group(function () {
    Route::get('buku', [BukuController::class, 'index'])->name('buku.index');
});

// Tambah, ubah, dan hapus buku hanya untuk admin.
// Route create didaftarkan lewat resource sehingga berada sebelum route {buku}.
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('buku', BukuController::class)->except(['index', 'show']);
});
