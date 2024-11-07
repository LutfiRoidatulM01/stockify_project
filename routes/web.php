<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PracticeController;
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




// Route::name('index-practice')->get('/', function () {
//     return view('pages.practice.index');
// });

// Route::name('index-practice')->get('/', function () {
//     return view('example.content.authentication.sign-in');
// });

Route::get('/', function () {
    return redirect()->route('sign-in');
});
Route::name('sign-in')->get('/sign-in', function () {
    return view('example.content.authentication.sign-in');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::name('index-practice')->get('/pages.practice.index', function () {
        return view('pages.practice.index'); 
    });
});

Route::name('sign-in')->get('/sign-in', function () {
    return view('views.example.content.authentication.sign-in');
});


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


Route::name('users')->get('/user', function () {
    return view('pages.admin.users.index');
});

Route::name('report')->get('/report', function () {
    return view('pages.admin.reports');
});

Route::name('products')->get('/product', function () {
    return view('pages.admin.products');
});


