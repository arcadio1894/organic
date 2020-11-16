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
    $departments = \App\Department::all();
    return view('welcome', compact('departments'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::name('dashboard.')->group(function () {
            Route::get('home', 'HomeController@home')->name('home')
                ->middleware('permission:ingresar_dashboard');

            Route::get('departamentos', 'DepartmentController@index')->name('department.index')
                ->middleware('permission:listar_departamento');
            Route::get('departamento/crear', 'DepartmentController@create')->name('department.create')
                ->middleware('permission:crear_departamento');
            Route::post('department/store', 'DepartmentController@store')->name('department.store')
                ->middleware('permission:crear_departamento');
            Route::get('departamento/{id}/editar', 'DepartmentController@edit')->name('department.edit')
                ->middleware('permission:modificar_departamento');
            Route::post('department/update', 'DepartmentController@update')->name('department.update')
                ->middleware('permission:modificar_departamento');
            Route::post('department/destroy', 'DepartmentController@destroy')->name('department.destroy')
                ->middleware('permission:eliminar_departamento');
            Route::get('departamento/restaurar', 'DepartmentController@trashed')->name('department.trashed')
                ->middleware('permission:modificar_departamento');
            Route::post('department/restore', 'DepartmentController@restore')->name('department.restore')
                ->middleware('permission:restaurar_departamento');

            Route::get('productos', 'ProductController@index')->name('product.index')
                ->middleware('permission:gestionar_productos');
            Route::get('productos/restaurar', 'ProductController@trashed')->name('product.trashed')
                ->middleware('permission:gestionar_productos');
            Route::get('producto/{id}', 'ProductController@getProduct')->name('product.get')
                ->middleware('permission:gestionar_productos');
            Route::post('product/store', 'ProductController@store')->name('product.store')
                ->middleware('permission:gestionar_productos');
            Route::post('product/update', 'ProductController@update')->name('product.update')
                ->middleware('permission:gestionar_productos');
            Route::post('product/destroy', 'ProductController@destroy')->name('product.destroy')
                ->middleware('permission:gestionar_productos');
        });
    });

    /*TODO: Rutas del PDF*/
    Route::get('exportaciones', 'ExportController@exports')->name('exports')
        ->middleware('permission:listar_departamento');
    Route::get('export/pdf', 'ExportController@exportPDF')->name('export.pdf')
        ->middleware('permission:listar_departamento');
    Route::get('export2/pdf', 'ExportController@export2PDF')->name('export2.pdf')
        ->middleware('permission:listar_departamento');
    Route::get('export3/pdf', 'ExportController@export3PDF')->name('export3.pdf')
        ->middleware('permission:listar_departamento');
    Route::get('export4/pdf', 'ExportController@export4PDF')->name('export4.pdf')
        ->middleware('permission:listar_departamento');

    Route::get('export/departments/pdf', 'ExportController@exportDepartments')->name('export.departments.pdf')
        ->middleware('permission:listar_departamento');

    // TODO: Rutas de Excel
    Route::get('export/users/excel', 'ExportController@exportUsersExcel')->name('export.users.excel')
        ->middleware('permission:listar_departamento');
    Route::get('export/array/excel', 'ExportController@exportArrayExcel')->name('export.array.excel')
        ->middleware('permission:listar_departamento');
    Route::get('store/array/excel', 'ExportController@storeArrayExcel')->name('store.array.excel')
        ->middleware('permission:listar_departamento');
    Route::get('exportable/excel', 'ExportController@exportableExcel')->name('exportable.excel')
        ->middleware('permission:listar_departamento');

    Route::get('export/department/excel', 'ExportController@exportDepartmentsExcel')->name('export.department.excel')
        ->middleware('permission:listar_departamento');

    // TODO: Rutas de envio de emails
    Route::get('mail/sendEmail', 'MailController@sendEmail')->name('email.test')
        ->middleware('permission:listar_departamento');

});

/** Rutas de la tienda  */
Route::name('tienda.')->group(function () {
    // TODO: Esto se usó en la clase de middlewares
    Route::get('categorias', 'DepartmentController@showCategories')->name('categories')
        ->middleware('onlyUser');

    Route::get('tienda', 'StoreController@shop')->name('organic');

    Route::get('products/shop', 'StoreController@getProducts');

});

/** Rutas de Autenticacion por redes sociales*/
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')
    ->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

/** Rutas de HandlerController*/
/*Route::get('404', 'HandlerController@error404')->name('404');
Route::get('405', 'HandlerController@error405')->name('405');
Route::get('403', 'HandlerController@error403')->name('403');*/




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


