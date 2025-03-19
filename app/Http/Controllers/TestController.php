<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
        return 'Esta ruta es la de prueba 1';
    }

    public function metodoTest2()
    {
        return 'Esta ruta es la de prueba 2';
    }

    public function metodoTest3()
    {
        return 'Esta ruta es la de prueba 3';
    }
}
