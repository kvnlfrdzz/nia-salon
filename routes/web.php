<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Route Halaman Publik (Frontend)
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [FrontendController::class, 'index'])->name('home');

// Halaman detail Service
Route::get('/jasa/{service}', [FrontendController::class, 'showService'])
    ->name('service.show');

// Halaman detail Product
Route::get('/produk/{product}', [FrontendController::class, 'showProduct'])
    ->name('product.show');

/*
|--------------------------------------------------------------------------
| Route Admin Panel
| Middleware stack:
|   1. 'auth'    → harus sudah login
|   2. 'verified'→ email harus terverifikasi (opsional, bisa dihapus)
|   3. 'admin'   → usertype harus 'admin' (custom middleware kita)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'admin'])  // 👈 tambah 'admin' middleware
    ->group(function () {

        Route::get('/dashboard', function () {
            // Query data riil dari tabel services
            $totalJasa = Service::where('category', 'service')
                ->orWhereNull('category')
                ->count();

            $totalProduk = Service::where('category', 'product')
                ->count();

            return view('dashboard', compact('totalJasa', 'totalProduk'));
        })->name('dashboard');

        Route::resource('services', ServiceController::class);
        Route::resource('products', ProductController::class);
    });

/*
|--------------------------------------------------------------------------
| Route Profile Breeze
| Middleware 'auth' sudah cukup — tidak perlu 'admin',
| karena profile bisa diedit oleh semua user yang login.
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';