<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Rutas protegidas por Auth
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); // Name es un apodo

    Route::get('/test', function () {
        return 'Ruta de prueba';
    });

    /* Route::controller(TestController::class)->group(function () {
        Route::get('/test1', '__invoke');
        Route::get('/test2', 'metodoTest2');
        Route::get('/test3', 'metodoTest3');
    }); */

    /* Route::get('/test1', TestController::class);
    Route::get('/test2', [TestController::class, 'metodoTest2']);
    Route::post('/test3', [TestController::class, 'metodoTest3']); */
});

/**
 * CRUD PARA MI CAUSA
 */
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
//Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
