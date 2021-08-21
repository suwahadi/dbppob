<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\TopupSaldoController;
use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['user.auth.session'])->group(function () {
    Route::get('/', function () {
        return redirect('administrator/auth/login');
    });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('administrator')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', [AuthController::class, "loginPage"])->name('login');
        Route::post('/login', [AuthController::class, "loginFunction"]);
    });
    Route::middleware(['user.auth.session'])->group(function () {
        Route::get('dashboard', [DashboardController::class, "index"]);

        Route::get("/topupsaldo", [TopupSaldoController::class, "index"])->name('topupsaldo');
        Route::get("/topupsaldo/add", [TopupSaldoController::class, "add"]);
        Route::post("/topupsaldo/create", [TopupSaldoController::class, "create"]);

        Route::get("/saldo", [SaldoController::class, "index"]);

        Route::get("/product", [ProductController::class, "index"]);
        Route::post("/product/edit", [ProductController::class, "edit"]);
        Route::post("/product/add", [ProductController::class, "add"]);

        Route::get("/transaction", [TransactionController::class, "index"])->name('transaction');
        Route::get("/transaction/export", [TransactionController::class, "exportExcel"])->name('export-excel');

        Route::get("/setting/profile", [AuthController::class, "profile"]);
        Route::post("/setting/profile", [AuthController::class, "editProfile"]);

        Route::get("/setting/password", [AuthController::class, "GetPassword"]);
        Route::post("/setting/password", [AuthController::class, "ChangePassword"]);
    });
});

Route::get('/getCardProduct',[ProductController::class, "getCardProduct"]);