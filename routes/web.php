<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Exports\LaporanStokManajerExport;
use App\Exports\admin\LaporanTransaksiExport;
use App\Http\Controllers\admin\UserController;
use App\Exports\manajer_gudang\LaporanStokExport;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LaporanStokController;
use App\Http\Controllers\admin\StockOpnameController;
use App\Http\Controllers\admin\PengaturanStokController;
use App\Http\Controllers\admin\LaporanAktivitasController;
use App\Http\Controllers\admin\LaporanTransaksiController;
use App\Http\Controllers\admin\ProductAttributeController;
use App\Http\Controllers\admin\StockTransactionController;
use App\Http\Controllers\manajer_gudang\BarangMasukController;
use App\Http\Controllers\manajer_gudang\BarangKeluarController;
use App\Http\Controllers\ManajerGudang\LaporanBarangController;
use App\Http\Controllers\staff_gudang\KonfirmasiMasukController;
use App\Http\Controllers\staff_gudang\KonfirmasiKeluarController;
use App\Http\Controllers\manajer_gudang\ManajerSupplierController;
use App\Http\Controllers\manajer_gudang\ProductController as Manajer_gudangProductController;
use App\Http\Controllers\staff_gudang\DashboardController as Staff_gudangDashboardController;
use App\Http\Controllers\manajer_gudang\DashboardController as Manajer_gudangDashboardController;
use App\Http\Controllers\manajer_gudang\LaporanBarangController as Manajer_gudangLaporanBarangController;
use App\Http\Controllers\manajer_gudang\LaporanStokController as Manajer_gudangLaporanStokController;
use App\Http\Controllers\manajer_gudang\StockOpnameController as Manajer_gudangStockOpnameController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware('userAkses:admin')->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('index-admin.index');

        Route::name('produk.')->group(function () {
            Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
            
            Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/admin/atribut', [ProductAttributeController::class, 'index'])->name('atribut.index');
        });

       
        Route::get('/products/export', [ProductController::class, 'export'])->name('products.export');
        Route::post('/products/import', [ProductController::class, 'import'])->name('products.import');

        Route::resource('categories', CategoryController::class);
        Route::resource('atribut', ProductAttributeController::class);
        Route::resource('products', ProductController::class);
        
        Route::name('admin.stok.')->group(function () {
            Route::get('riwayat_transaksi', [StockTransactionController::class, 'index'])->name('riwayat_transaksi.index');
            Route::get('stock_opname', [StockOpnameController::class, 'index'])->name('stock_opname.index');
            Route::get('pengaturan_stok', [PengaturanStokController::class, 'index'])->name('pengaturan_stok.index');
            Route::put('pengaturan_stok{id}', [PengaturanStokController::class, 'updateMinimumStock'])->name('products.updateMinimumStock');
        });
        Route::put('/admin/pengaturan_stok{id}', [PengaturanStokController::class, 'updateMinimumStock'])->name('products.updateMinimumStock');

        Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
        Route::resource('suppliers', SupplierController::class);

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::resource('users', UserController::class);


        Route::name('admin.laporan.')->group(function () {
            Route::get('laporan_stok', [LaporanStokController::class, 'index'])->name('laporan_stok.index');
   
            Route::get('laporan-stok/export', [LaporanStokController::class, 'export'])->name('laporanStok.export');

            Route::get('laporan_transaksi', [LaporanTransaksiController::class, 'index'])->name('laporan_transaksi.index');

            Route::get('laporan-transaksi/export', [LaporanTransaksiController::class, 'export'])->name('laporanTransaksi.export');

            Route::get('laporan_aktivitas', [LaporanAktivitasController::class, 'index'])->name('laporan_aktivitas.index');

            Route::get('/laporan-aktivitas/export', [LaporanAktivitasController::class, 'export'])->name('laporan-aktivitas.export');

        });

        Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan.index');
        Route::put('/pengaturan', [SettingController::class, 'update'])->name('pengaturan.update');
    });

    Route::prefix('manajer_gudang')->middleware('userAkses:manajer_gudang')->group(function () {
        Route::get('/manajer_gudang', [Manajer_gudangDashboardController::class, 'index'])->name('index-manajer_gudang.index');

        Route::name('stok.')->group(function () {
            Route::get('/manajer_gudang/barang_masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
            Route::get('/manajer_gudang/barang_keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar.index');
            Route::get('/manajer_gudang/stock_opname', [Manajer_gudangStockOpnameController::class, 'index'])->name('stock_opname.index');
        });
        Route::resource('barang_masuk', BarangMasukController::class);
        Route::resource('barang_keluar', BarangKeluarController::class);

        Route::get('/product_manajer', [Manajer_gudangProductController::class, 'index'])->name('product_manajer.index');
  

        Route::get('/manajer_suppliers', [ManajerSupplierController::class, 'index'])->name('manajer_suppliers.index');

        Route::name('manajer.laporan.')->group(function () {
            Route::get('laporan_stok', [Manajer_gudangLaporanStokController::class, 'index'])->name('laporan_stok.index');
            Route::get('laporan-stok/export', [Manajer_gudangLaporanStokController::class, 'export'])->name('laporanStok.export');
            Route::get('laporan_barang', [Manajer_gudangLaporanBarangController::class, 'index'])->name('laporan_barang.index');
            Route::get('/manajer-gudang/laporan/export', [Manajer_gudangLaporanBarangController::class, 'export'])->name('laporan.export');
        });
    });

    Route::prefix('staff_gudang')->middleware('userAkses:staff_gudang')->group(function () {
        Route::get('/dashboard', [Staff_gudangDashboardController::class, 'index'])->name('index-staff_gudang.index');

        Route::name('stok.')->group(function () {
            Route::get('/staff_gudang/konfirmasi_masuk', [KonfirmasiMasukController::class, 'index'])->name('konfirmasi_masuk.index');
            Route::get('/staff_gudang/konfirmasi_keluar', [KonfirmasiKeluarController::class, 'index'])->name('konfirmasi_keluar.index');
        });

        Route::patch('/konfirmasi/{id}/approve', [KonfirmasiMasukController::class, 'approve'])->name('konfirmasi.approve');
        Route::patch('/konfirmasi/{id}/reject', [KonfirmasiMasukController::class, 'reject'])->name('konfirmasi.reject');
        Route::patch('/konfirmasi/{id}/dikeluarkan', [KonfirmasiKeluarController::class, 'dikeluarkan'])->name('konfirmasi.dikeluarkan');
    });

   
});
