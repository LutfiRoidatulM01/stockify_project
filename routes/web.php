<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PracticeController;

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


// Route::name('practice.')->group(function () {
//     Route::name('first')->get('practice/1', function () {
//         return view('pages.practice.1');
//     });
//     Route::name('second')->get('practice/2', function () {
//         return view('pages.practice.2');
//     });
// });

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

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::name('admin.')->group(function () {
    Route::name('products')->get('products/index', function () {
        return view('pages.admin.products.index');
    });
    Route::name('categories')->get('categories/index', function () {
        return view('pages.admin.categories.index');
    });
    
});

Route::name('stok')->get('/stok', function () {
    return view('pages.admin.stok.index');
});

Route::name('suppliers')->get('/supplier', function () {
    return view('pages.admin.suppliers.index');
});

Route::name('users')->get('/user', function () {
    return view('pages.admin.users.index');
});

Route::name('report')->get('/report', function () {
    return view('pages.admin.reports');
});

Route::name('products')->get('/product', function () {
    return view('pages.admin.products');
});



Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');


// Route::name('index-admin')->get('/admin', function () {
//     return view('pages.admin.index');
// });

// Route::name('index-manajer_gudang')->get('/manajer_gudang', function () {
//     return view('pages.manajer_gudang.index');
// });

// Route::name('index-staff_gudang')->get('/staff_gudang', function () {
//     return view('pages.staff_gudang.index');
// });


// Route::get('/pages/practice/index', function () {
//     return view('pages.practice.index');
// })->name('pages.practice.index');