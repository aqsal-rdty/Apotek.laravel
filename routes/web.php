<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\isGuest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;

// Route::get('/home', [Controller::class, 'home'])->name('home');
Route::middleware(['isGuest'])->group(function () {
    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
});


Route::middleware(['islogin'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/home', function () {
        return view('home');
    })->name('home.page');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware(['isAdmin'])->group(function () {

        Route::prefix('/medicine')->name('medicine.')->group(function () {
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/', [MedicineController::class, 'index'])->name('home');
            Route::get('/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/data/stock', [MedicineController::class, 'stock'])->name('stock');
            Route::get('/data/stock/{id}', [MedicineController::class, 'stockEdit'])->name('stock.edit');
            Route::patch('/data/stock/{id}', [MedicineController::class, 'stockUpdate'])->name('stock.update');
        });

        Route::prefix('/user')->name('user.')->group(function () {
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('/order')->name('order.')->group(function () {
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
        });
    });

    Route::middleware(['isKasir'])->group(function () {
        Route::prefix('/pembelian')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('pembelian');
            Route::get('/create/pembelian', [OrderController::class, 'create'])->name('tambah.pembelian');
            Route::get('/print/{id}', action: [OrderController::class, 'show'])->name('print');
            Route::post('/create/beli', [OrderController::class, 'store'])->name('tambah.store');
            Route::get('/kasir/order/create', [OrderController::class, 'create'])->name('kasir.order.create');
            Route::get('/download/{id}/pdf', [OrderController::class, 'downloadPdf'])->name('download.pdf');
            Route::get('/kasir/orders', [OrderController::class, 'index'])->name('kasir.orders.index');
        });
    });
});
    // Route::prefix('/medicine')->name('medicine.')->group(function () {
    //     Route::get('/create', [MedicineController::class, 'create'])->name('create');
    //     Route::post('/store', [MedicineController::class, 'store'])->name('store');
    //     Route::post('/{id}', [MedicineController::class, 'destroy'])->name('delete');
    // });
