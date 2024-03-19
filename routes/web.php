<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalesAgentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return redirect('agents');
});

/** Sales Agents */
Route::group(['prefix' => 'agents'], function () {
    Route::get('sales', [SalesAgentController::class, 'index'])->name('get.agents.sales');
});

/** Products */
Route::group(['prefix' => 'products'], function () {
    Route::get('sales', [ProductController::class, 'index'])->name('get.products.sales');
});

/** Customers */
Route::group(['prefix' => 'customers'], function () {
    Route::get('sales', [CustomerController::class, 'index'])->name('get.customers.sales');
});
