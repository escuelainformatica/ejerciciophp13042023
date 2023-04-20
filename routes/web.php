<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Servicios\CompraServicio;
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
function productoServicio():ProductoServicio {    
    $instancia=app(ProductoServicio::class);
    /*if($id!==null) {
        return $instancia->exist($id);
    }*/
    return $instancia;
}



function compraServicio():CompraServicio {
    return app(CompraServicio::class,[productoServicio(), request()]);    
}



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
        Route::any('/formulario', 'formulario'); // producto/formulario
        Route::any('/formulario2', 'formulario2'); // producto/formulario2
    });