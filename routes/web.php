<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DashboardController;

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
    return view('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/homeuser', function () {
    return view('user.homeuser');
})->name('user.homeuser');

Route::get('/homeadmin', [DashboardController::class, 'admindashboard'])->name('admin.homeadmin');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');


Route::get('/pengajuan/beasiswa', function () {
    return view('form.beasiswa');
})->name('pengajuan.beasiswa.form');

Route::get('/pengajuan/permohonan-kerja-praktek', function () {
    return view('form.permohonankerjapraktek');
})->name('permohonan.form');

Route::get('/pengajuan/penelitian', function () {
    return view('form.penelitian');
})->name('penelitian.form');

Route::get('/pengajuan/izin-kerja-praktek', function () {
    return view('form.izinkerjapraktek');
})->name('izinkerjapraktek.form');
Route::post('/pengajuan/seminar-kp', [PengajuanController::class, 'storeSKP'])->name('store.skp');



Route::get('/pengajuan/pindahprodi', function () {
    return view('form.pindahprodi');
})->name('pindahprodi.form');

Route::post('/pengajuan/beasiswa/store', [PengajuanController::class, 'storeBeasiswa'])->name('pengajuan.beasiswa.store');
Route::get('/riwayat', [PengajuanController::class, 'riwayat'])->name('pengajuan.riwayat');
Route::get('/admin/pengajuan', [PengajuanController::class, 'indexAdmin'])->name('admin.pengajuan.index');
Route::post('/admin/pengajuan/{pengajuan}/setujui', [PengajuanController::class, 'setujui'])->name('admin.pengajuan.setujui');
Route::post('/admin/pengajuan/{pengajuan}/tolak', [PengajuanController::class, 'tolak'])->name('admin.pengajuan.tolak');
Route::get('/pengajuan/{pengajuan}', [PengajuanController::class, 'show'])->name('pengajuan.show');
Route::post('/pengajuan/kerja-praktek', [PengajuanController::class, 'storePermohonanKerjaPraktek'])->name('store.permohonan_kerja_praktek');
Route::post('/pengajuan/penelitianstore', [PengajuanController::class, 'storePenelitian'])->name('store.penelitian');
Route::post('/pengajuan/seminar-kp', [PengajuanController::class, 'storeSKP'])->name('store.skp');
Route::post('/pengajuan/pindah-prodi', [PengajuanController::class, 'storePindahProdi'])->name('store.pindahprodi');

Route::get('/profile/edit', [AuthController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [AuthController::class, 'update'])->name('profile.update');


Route::get('/admin/riwayat', [PengajuanController::class, 'riwayatAdmin'])->name('historyadmin');


