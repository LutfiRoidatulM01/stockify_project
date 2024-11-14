<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;

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
    Route::get('/admin', function () {
        return view('pages.admin.index');
    })->name('index-admin');

    Route::get('/manajer_gudang', function () {
        return view('pages.manajer_gudang.index');
    })->name('index-manajer_gudang');

    Route::get('/staff_gudang', function () {
        return view('pages.staff_gudang.index');
    })->name('index-staff_gudang');

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::name('admin.')->group(function () {
    Route::name('products')->get('products/index', function () {
        return view('pages.admin.products.index');
    });
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
});

Route::name('stok')->get('/stok', function () {
    return view('pages.admin.stok.index');
});

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::name('report')->get('/report', function () {
    return view('pages.admin.reports');
});


Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('users', UserController::class);



