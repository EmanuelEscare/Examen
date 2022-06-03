<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamenController;
use App\Models\User;
use App\Models\Tarea;
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

// USUARIOS

Route::get('/usuarios/search', [ExamenController::class, 'buscarUsuarios']);

Route::get('/', [ExamenController::class, 'usuarios'])->name('usuarios');

Route::get('/agregarUsuarioVista', function () {
    return view('agregarUsuario');
})->name('agregarUsuarioVista');

Route::post('/agregarUsuario', [ExamenController::class, 'agregarUsuario'])->name('agregarUsuario');

Route::get('/modificarUsuarioVista/{id}', function ($id) {
    $usuario = User::find($id);
    return view('modificarUsuario')->with('usuario', $usuario);

})->name('modificarUsuarioVista');

Route::post('/modificarUsuario', [ExamenController::class, 'modificarUsuario'])->name('modificarUsuario');

Route::get('/eliminarUsuario/{id}', [ExamenController::class, 'eliminarUsuario'])->name('eliminarUsuario');

// TAREAS 

Route::get('/tareas/search', [ExamenController::class, 'buscarTareas']);

Route::get('/tareas', [ExamenController::class, 'tareas'])->name('tareas');

Route::get('/agregarTareaVista/{id}', function ($id) {
    $usuario = User::find($id);
    return view('agregarTarea')->with('usuario', $usuario);
})->name('agregarTareaVista');

Route::post('/agregarTarea', [ExamenController::class, 'agregarTarea'])->name('agregarTarea');

Route::get('/modificarTareaVista/{id}', function ($id) {
    $tarea = Tarea::find($id);
    return view('modificarTarea')->with('tarea', $tarea);
})->name('modificarTareaVista');

Route::post('/modificarTarea', [ExamenController::class, 'modificarTarea'])->name('modificarTarea');


Route::get('/eliminarTarea/{id}', [ExamenController::class, 'eliminarTarea'])->name('eliminarTarea');




