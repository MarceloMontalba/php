<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasControlador;
use App\Http\Controllers\CategoriasControlador;

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

Route::get("/", [TareasControlador::class, "index"])->name("tareas");
Route::post("/tareas", [TareasControlador::class, "store"])->name("agregar_tarea");
Route::delete("tareas/{id}", [TareasControlador::class, "destroy"])->name("eliminar_tarea");
Route::post("tareas/{id}", [TareasControlador::class, "show"])->name("editar_tarea");
Route::patch("tareas/{id}", [TareasControlador::class, "update"])->name("actualizar_tarea");

Route::get("/categorias", [CategoriasControlador::class, "index"])->name("crea_categoria");
Route::post("/categorias", [CategoriasControlador::class, "store"])->name("agregar_categoria");
Route::delete("/categorias/{id}",[CategoriasControlador::class, "destroy"])->name("elimina_categoria");
Route::post("/editar_categoria/{id}", [CategoriasControlador::class, "show"])->name("editar_categoria");
Route::patch("/editar_categoria/{id}", [CategoriasControlador::class, "update"])->name("actualizar_categoria");

?>