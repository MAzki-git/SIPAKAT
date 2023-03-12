<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TanggapanController;
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


// |--------------------------------------------------------------------------
//LOGIN MASYARAKAT
Route::get('/dashboard/user', [UserController::class, 'IndexDashboard'])->name('masyarakat-dashboard');
// Route::get('/login/user', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::get('/register', [UserController::class, 'formRegister']);
Route::post('/register/auth', [UserController::class, 'Registerpost'])->name('register.auth');
Route::get('/logout/user', [UserController::class, 'logout']);
// |--------------------------------------------------------------------------



// |--------------------------------------------------------------------------
//LOGIN PETUGAS & ADMIN
Route::get('/dashboard/admin', [AdminController::class, 'indexDashboard'])->name('admin-dashboard');
Route::get('/login/admin', [AdminController::class, 'formlogin']);
Route::post('/login/auth', [AdminController::class, 'login']);
Route::get('/logout/admin', [AdminController::class, 'logout'])->name('admin.logout');
// |--------------------------------------------------------------------------



// |--------------------------------------------------------------------------
//CRUD PETUGAS & ADMIN
Route::get('/petugas', [AdminController::class, 'index']);
Route::get('/tambah', [AdminController::class, 'create']);
Route::post('/store/petugas', [AdminController::class, 'store'])->name('store.petugas');
Route::get('/edit/{id_petugas}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update/petugas/{id_petugas}', [AdminController::class, 'update'])->name('update.petugas');
Route::get('/delete/{id_petugas}', [AdminController::class, 'destroy'])->name('delete');
Route::get('/show/{id_petugas}', [AdminController::class, 'show'])->name('show');
//softdelete petugas
Route::get('/trash/petugas', [AdminController::class, 'petugastrash'])->name('petugas.trash');
Route::get('/petugas/restore/{nik}', [AdminController::class, 'restorepetugas'])->name('restore.petugas');
Route::get('/petugas/force/{nik}', [AdminController::class, 'forcedeletepetugas'])->name('force.petugas');
// |--------------------------------------------------------------------------

// profile
Route::get('/profile/petugas', [PetugasController::class, 'editprofile'])->name('profile.petugas');

// |--------------------------------------------------------------------------
//CRUD MASYARAKAT
Route::get('/user', [PetugasController::class, 'index']);
Route::get('/tambah/user', [PetugasController::class, 'create']);
Route::post('/store/user', [PetugasController::class, 'store'])->name('store.user');
Route::get('/edit/user/{nik}', [PetugasController::class, 'edit'])->name('edit/user');
Route::post('/update/user/{nik}', [PetugasController::class, 'update'])->name('update/user');
Route::get('/delete/user/{nik}', [PetugasController::class, 'destroyuser'])->name('delete/user');
Route::get('/show/user/{nik}', [PetugasController::class, 'show'])->name('show/user');
//softdelete user
Route::get('/trash/user', [PetugasController::class, 'usertrash'])->name('user.trash');
Route::get('/user/restore/{nik}', [PetugasController::class, 'restoreuser'])->name('restore.user');
Route::get('/user/force/{nik}', [PetugasController::class, 'forcedeleteuser'])->name('force.user');
// |--------------------------------------------------------------------------




//PENGADUAN USER
Route::get('user/laporan', [UserController::class, 'userlaporan'])->name('user.laporan');
Route::post('/store', [UserController::class, 'store'])->name('pekat.store');

//user edit pengaduan
Route::get('/edit/pengaduan/{id_pengaduan}', [PengaduanController::class, 'edit'])->name('edit/pengaduan');
Route::put('/update/pengaduan/{id_pengaduan}', [PengaduanController::class, 'update'])->name('update.pengaduan');

//PENGADUAN ADMIN
Route::get('/pengaduan', [PengaduanController::class, 'index']);
Route::get('/show/pengaduan/{id_pengaduan}', [PengaduanController::class, 'show'])->name('showPengaduan');
Route::get('/delete/pengaduan/{id_pengaduan}', [PengaduanController::class, 'destroypengaduan'])->name('delete/pengaduan');
//softdelete pengaduan
Route::get('/soft', [PengaduanController::class, 'softtrash'])->name('soft.trash');
Route::get('/pengaduan/restore/{id_pengaduan}', [PengaduanController::class, 'restorepengaduan'])->name('restore.pengaduan');
Route::get('/pengaduan/force/{id_pengaduan}', [PengaduanController::class, 'forcedeletepengaduan'])->name('force.pengaduan');

//TANGGAPAN
Route::post('tanggapan/createorupdate', [TanggapanController::class, 'CreateOrUpdate'])->name('tanggapan');

//printlaporan
Route::get('laporan/print', [laporanController::class, 'indexlaporan'])->name('index.print');
Route::post('getLaporan', [laporanController::class, 'getlaporan'])->name('print.getlaporan');
Route::get('print/laporan{from}/{to}', [laporanController::class, 'printlaporan'])->name('print.laporan');
