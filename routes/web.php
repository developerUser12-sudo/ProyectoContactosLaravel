<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrearContactoController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ActualizarContactoController;
use App\Http\Controllers\AsignarCategoriaContactosController;
use App\Http\Controllers\BorrarContactoController;
use App\Http\Controllers\BorrarCategoriaController;
use App\Http\Controllers\CrearCategoriaController;
use App\Http\Controllers\CategoriasByContactController;

Route::get('/index', [ContactosController::class, 'mostrarDatos'])->name('dashboard');
Route::get('/index/userCategories', [CategoriasController::class, 'mostrarCategorias'])->name('userCategories');
Route::get('/index/{id}/contactCategories', [CategoriasByContactController::class, 'mostrarCategoriasByContact'])->name('contactCategories');
Route::get('/index/{id}/update', [ActualizarContactoController::class, 'edit'])->name('edit');
Route::get('/index/createCategory', function () {
    return view('crearCategoria');
})->name('create');
Route::get('/index/create', function () {
    return view(view: 'crear');
})->name('create');
Route::post('/index/saveNewContact', [CrearContactoController::class, 'create']);
Route::post('/index/saveNewCategory', [CrearCategoriaController::class, 'createCategory']);
Route::post('/index/{id}/addCategory', [AsignarCategoriaContactosController::class, 'addCategory'])->name('addCategory');
Route::put('/index/{id}', [ActualizarContactoController::class, 'update'])->name('update');
Route::delete('/index/{id}', [BorrarContactoController::class, 'borrarContacto'])->name('delete');
Route::delete('/index/{id}/deleteCategory', [BorrarCategoriaController::class, 'borrarCategoria'])->name('deleteCategory');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
