<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// UserController - Admin
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users')->middleware('auth', 'admin');

// Activar/desactivar y eliminar usuarios
Route::put('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
Route::put('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Editar y actualizar perfil de usuario
Route::get('/profile/{id}', [UserController::class, 'edit'])->name('profile.edit')->middleware('admin');
Route::put('/profile/{id}', [UserController::class, 'update'])->name('profile.update')->middleware('admin');

// Registro
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');





