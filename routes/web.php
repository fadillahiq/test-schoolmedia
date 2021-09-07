<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\ProfileSekolahController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Siswa\KelasController as SiswaKelasController;
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

Route::get('/', [GuestController::class, 'index'])->name('welcome');

Auth::routes([
    'register' => false
]);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('news', [GuestController::class, 'berita'])->name('berita');
Route::get('gallery', [GuestController::class, 'galeri'])->name('galeri');
Route::get('news/{slug}', [GuestController::class, 'beritaDetail'])->name('berita.detail');
Route::get('register', [GuestController::class, 'registerSiswa'])->name('register.siswa');
Route::post('register/post', [GuestController::class, 'registerSiswaPost'])->name('register.siswa.post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('profile-sekolah', ProfileSekolahController::class)->only('index', 'edit', 'update');
});

Route::get('kelas', [SiswaKelasController::class, 'index'])->name('kelas.siswa');
Route::get('profile/{id}', [DashboardController::class, 'profile'])->name('profile');
Route::put('profile/update/{id}', [DashboardController::class, 'profileUpdate'])->name('profile.update');
Route::get('change-password', [DashboardController::class, 'changePassword'])->name('change.password');
Route::post('change-password/post', [DashboardController::class, 'changePasswordPost'])->name('change.password.post');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
