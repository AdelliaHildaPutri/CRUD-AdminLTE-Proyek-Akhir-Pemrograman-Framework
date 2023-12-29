<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\validator;
use App\Http\Controllers\DashboardController;


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


    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard'); 


    // route data sales
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/sales/create', [SalesController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/sales/{sales}', [SalesController::class, 'show'])->name('sales.show');
    Route::get('/sales/{sales}/edit', [SalesController::class, 'edit'])->name('sales.edit');
    Route::put('/sales/{sales}', [SalesController::class, 'update'])->name('sales.update');
    Route::delete('/sales/{sales}', [SalesController::class, 'destroy'])->name('sales.destroy');

    // route data unit motor
    Route::get('/units', [UnitController::class, 'index'])->name('units.index');
    Route::get('/units/create', [UnitController::class, 'create'])->name('units.create');
    Route::post('/units', [UnitController::class, 'store'])->name('units.store');
    Route::get('/units/{unit}', [UnitController::class, 'show'])->name('units.show');
    Route::get('/units/{unit}/edit', [UnitController::class, 'edit'])->name('units.edit');
    Route::put('/units/{unit}', [UnitController::class, 'update'])->name('units.update');
    Route::delete('/units/{unit}', [UnitController::class, 'destroy'])->name('units.destroy');

    // route konsumen
    Route::get('/konsumens', [KonsumenController::class, 'index'])->name('konsumens.index');
    Route::get('/konsumens/create', [KonsumenController::class, 'create'])->name('konsumens.create');
    Route::post('/konsumens', [KonsumenController::class, 'store'])->name('konsumens.store');
    Route::get('/konsumens/{konsumen}', [KonsumenController::class, 'show'])->name('konsumens.show');
    Route::get('/konsumens/{konsumen}/edit', [KonsumenController::class, 'edit'])->name('konsumens.edit');
    Route::put('/konsumens/{konsumen}', [KonsumenController::class, 'update'])->name('konsumens.update');
    Route::delete('/konsumens/{konsumen}', [KonsumenController::class, 'destroy'])->name('konsumens.destroy');

    // route user
    Route::get('/users', [HomeController::class, 'index'])->name('users.index');
    Route::get('/create', [HomeController::class, 'create'])->name('users.create');
    Route::post('/store', [HomeController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('users.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('users.delete');

});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register_proses');