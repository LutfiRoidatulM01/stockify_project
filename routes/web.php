<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\StockOpnameController;
use App\Http\Controllers\admin\ProductAttributeController;
use App\Http\Controllers\admin\StockTransactionController;
use App\Http\Controllers\manajer_gudang\BarangKeluarController;
use App\Http\Controllers\manajer_gudang\BarangMasukController;
use App\Http\Controllers\manajer_gudang\ManajerProductController;
use App\Http\Controllers\manajer_gudang\ManajerSupplierController;
use App\Http\Controllers\manajer_gudang\ManajerTransaksiController;
use App\Http\Controllers\staff_gudang\KonfirmasiKeluarController;
use App\Http\Controllers\staff_gudang\KonfirmasiMasukController;
use App\Http\Controllers\staff_gudang\StaffTransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('sign-in');
});
Route::name('sign-in')->get('/sign-in', function () {
    return view('example.content.authentication.sign-in');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware('userAkses:admin')->group(function () {
        Route::get('/admin', function () {
            return view('pages.admin.index');
        })->name('index-admin');

        Route::name('produk.')->group(function () {
            Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
            Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/admin/atribut', [ProductAttributeController::class, 'index'])->name('atribut.index');
        });

        // Resource routes
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('atribut', ProductAttributeController::class);

        // Stok
        Route::name('stok.')->group(function () {
            Route::get('/admin/riwayat_transaksi', [StockTransactionController::class, 'index'])->name('riwayat_transaksi.index');
            Route::get('/admin/stock_opname', [StockOpnameController::class, 'index'])->name('stock_opname.index');

            Route::name('pengaturan_stok')->get('pengaturan_stok', function () {
                return view('pages.admin.pengaturan_stok');
            });
        });

        // Supplier
        Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
        Route::resource('suppliers', SupplierController::class);

        // Users
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::resource('users', UserController::class);


        Route::name('admin.laporan.')->group(function () {
            Route::name('laporan_stok')->get('laporan_stok', function () {
                return view('pages.admin.laporan.laporan_stok');
            });

            Route::name('laporan_transaksi')->get('laporan_transaksi', function () {
                return view('pages.admin.laporan.laporan_transaksi');
            });

            Route::name('laporan_aktivitas')->get('laporan_aktivitas', function () {
                return view('pages.admin.laporan.laporan_aktivitas');
            });
        });
    });

    Route::prefix('manajer_gudang')->middleware('userAkses:manajer_gudang')->group(function () {
        Route::get('/manajer_gudang', function () {
            return view('pages.manajer_gudang.index');
        })->name('index-manajer_gudang');

        Route::name('stok.')->group(function () {
            Route::get('/manajer_gudang/transaksi_barang', [ManajerTransaksiController::class, 'index'])->name('transaksi_barang.index');
            Route::get('/manajer_gudang/barang_masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
            Route::get('/manajer_gudang/barang_keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar.index');

            // Route::name('barang_masuk')->get('barang_masuk', function(){
            //     return view('pages.manajer_gudang.manajer_stock.barang_masuk');
            // });

        });
        Route::resource('barang_masuk', BarangMasukController::class);
        Route::resource('barang_keluar', BarangKeluarController::class);
        Route::resource('transactions', ManajerTransaksiController::class);

        Route::get('/product_manajer', [ManajerProductController::class, 'index'])->name('product_manajer.index');
        Route::get('/manajer_suppliers', [ManajerSupplierController::class, 'index'])->name('manajer_suppliers.index');

        Route::name('report')->get('report', function () {
            return view('pages.manajer_gudang.report_manajer');
        });
        // Route::name('product.')->group(function () {
        //     Route::get('manajer_gudang/products', [ManajerProductController::class, 'index'])->name('product_manajer.index');

        //  });

    });

    Route::prefix('staff_gudang')->middleware('userAkses:staff_gudang')->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.staff_gudang.index');
        })->name('index-staff_gudang');

        Route::name('stok.')->group(function () {
            Route::get('/staff_gudang/konfirmasi_masuk', [KonfirmasiMasukController::class, 'index'])->name('konfirmasi_masuk.index');
            Route::get('/staff_gudang/konfirmasi_keluar', [KonfirmasiKeluarController::class, 'index'])->name('konfirmasi_keluar.index');
        });

        Route::patch('/konfirmasi/{id}/approve', [KonfirmasiMasukController::class, 'approve'])->name('konfirmasi.approve');
        Route::patch('/konfirmasi/{id}/reject', [KonfirmasiMasukController::class, 'reject'])->name('konfirmasi.reject');
        Route::patch('/konfirmasi/{id}/dikeluarkan', [KonfirmasiKeluarController::class, 'dikeluarkan'])->name('konfirmasi.dikeluarkan');
        Route::get('/stok', [StaffTransaksiController::class, 'index'])->name('stok_staff');
    });
});
