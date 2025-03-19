<?php

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
