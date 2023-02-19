<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
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
Route::middleware(['masyarakat'])->group(function () {
});
Route::middleware(['admin'])->group(function () {
});
Route::middleware(['petugas'])->group(function () {
});

//LOGIN MASYARAKAT
Route::get('/dashboard/user', [UserController::class, 'IndexDashboard'])->name('masyarakat-dashboard');
Route::get('/login/user', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/register', [UserController::class, 'formRegister']);
Route::post('/register/auth', [UserController::class, 'Registerpost']);
Route::get('/logout/user', [UserController::class, 'logout']);

//LOGIN PETUGAS & ADMIN
Route::get('/dashboard/admin', [AdminController::class, 'indexDashboard'])->name('admin-dashboard');
Route::get('/login/admin', [AdminController::class, 'formlogin']);
Route::post('/login/auth', [AdminController::class, 'login']);
Route::get('/logout/admin', [AdminController::class, 'logout'])->name('admin.logout');


//CRUD PETUGAS & ADMIN
Route::get('/petugas', [AdminController::class, 'index']);
Route::get('/tambah', [AdminController::class, 'create']);
Route::post('/store', [AdminController::class, 'store']);
Route::get('/edit{id_pegawai}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update{id_petugas}', [AdminController::class, 'update'])->name('update');
Route::get('/delete{id_petugas}', [AdminController::class, 'destroy'])->name('delete');
Route::get('/show{id_petugas}', [AdminController::class, 'show'])->name('show');

//CRUD MASYARAKAT
Route::get('/user', [PetugasController::class, 'index']);
Route::get('/tambah/user', [PetugasController::class, 'create']);
Route::post('/store', [PetugasController::class, 'store']);
Route::get('/edit/user{nik}', [PetugasController::class, 'edit'])->name('edit/user');
Route::post('/update/user{nik}', [PetugasController::class, 'update'])->name('update/user');
Route::get('/delete/user{nik}', [PetugasController::class, 'destroyuser'])->name('delete/user');
Route::get('/show/user{nik}', [PetugasController::class, 'show'])->name('show/user');

//pengaduan
Route::post('/store', [UserController::class, 'store'])->name('pekat.store');
// Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
