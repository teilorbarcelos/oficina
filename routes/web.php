<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CompanyController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//ClientController...
Route::get('/clients', [ClientController::class, 'index'])->middleware(['auth']);
Route::get('/clients/{id}', [ClientController::class, 'show'])->middleware(['auth']);
Route::get('/client/create', [ClientController::class, 'create'])->middleware(['auth']);
Route::post('/clients/create', [ClientController::class, 'store'])->middleware(['auth']);
Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->middleware(['auth']);
Route::put('/clients/update/{id}', [ClientController::class, 'update'])->middleware('auth');

//ProviderController...
Route::get('/providers', [ProviderController::class, 'index'])->middleware(['auth']);
Route::get('/providers/{id}', [ProviderController::class, 'show'])->middleware(['auth']);
Route::get('/provider/create', [ProviderController::class, 'create'])->middleware(['auth']);
Route::post('/providers/create', [ProviderController::class, 'store'])->middleware(['auth']);
Route::get('/providers/edit/{id}', [ProviderController::class, 'edit'])->middleware(['auth']);
Route::put('/providers/update/{id}', [ProviderController::class, 'update'])->middleware('auth');

//ProductController...
Route::get('/products', [ProductController::class, 'index'])->middleware(['auth']);
Route::get('/products/{id}', [ProductController::class, 'show'])->middleware(['auth']);
Route::get('/product/create', [ProductController::class, 'create'])->middleware(['auth']);
Route::post('/products/create', [ProductController::class, 'store'])->middleware(['auth']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware(['auth']);
Route::put('/products/update/{id}', [ProductController::class, 'update'])->middleware('auth');

//SaleController...
Route::get('/sales', [SaleController::class, 'index'])->middleware(['auth']);
Route::get('/sales/{id}', [SaleController::class, 'show'])->middleware(['auth']);
Route::get('/sale/create', [SaleController::class, 'create'])->middleware(['auth']);
Route::post('/sales/create', [SaleController::class, 'store'])->middleware(['auth']);

//rotas para impressão...
Route::post('/sales/report', [SaleController::class, 'report'])->middleware(['auth']);
Route::get('/sales/print/{id}', [SaleController::class, 'print'])->middleware(['auth']);

//ajax Routes...
Route::get('/ajax/clients/{id}', [ClientController::class, 'ajaxGet'])->middleware(['auth']);
Route::get('/ajax/products/{id}', [ProductController::class, 'ajaxGet'])->middleware(['auth']);

//company page route...
Route::get('/company/show', [CompanyController::class, 'show'])->middleware(['auth']);
Route::get('/company/option/create', [CompanyController::class, 'create'])->middleware(['auth']);
Route::get('/company/option/edit', [CompanyController::class, 'edit'])->middleware(['auth']);
Route::post('/company/create', [CompanyController::class, 'store'])->middleware(['auth']);
Route::put('/company/update', [CompanyController::class, 'update'])->middleware(['auth']);