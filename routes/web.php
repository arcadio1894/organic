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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::name('dashboard.')->group(function () {
            Route::get('home', 'HomeController@home')->name('home')
                ->middleware('permission:ingresar_dashboard');

        });
    });

    /*TODO: Otras rutas*/
});








// TODO: Ruta simple
Route::get('/hola', function () {
    return 'Hola Mundo';
});

// TODO: Ruta con name
Route::get('/hola/mundo', function () {
    return 'Hola Mundo con nombre';
})->name('hello');

// TODO: Ruta con parametros
Route::get('/hola/mundo/{name}', function ($name) {
    return 'Hola ' . $name;
})->name('hello.parameters');

// TODO: Ruta con prefix
Route::prefix('/hola')->group(function (){
    Route::get('/america/{name}', function ($name) {
        return 'Hola ' . $name;
    })->name('hello.america');
    Route::get('/europa/{name}', function ($name) {
        return 'Hola ' . $name;
    })->name('hello.europa');
});


