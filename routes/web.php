<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Servicios\ProductoServicio;
use Illuminate\Support\Facades\Route;

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


Route::controller(ProductoController::class)
    ->prefix("producto")
    ->group(function () {
        Route::get('/', 'listar')->name("productolistar"); // producto/listar
    });
    Route::controller(CompraController::class)
    ->prefix("compra")
    ->group(function () {
        Route::get('/', 'listar')->name("comprarlistar"); // producto/listar
        Route::any('/insertar', 'insertar'); // producto/insertar
    });    