<?php

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\UserController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LibrarySiswaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/login', [AuthController::class, 'loginPage'])->name('login');

// Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::get('/', function () {
        if (auth()->check()) {
            return redirect()->back();
        }
        return redirect()->route('login');
    });

    Route::prefix('login')->middleware(['authcheck'])->group(function () {
        Route::get('/', 'AuthController@loginPage')->name('login');
        Route::post('/', 'AuthController@login')->name('login.post');
    });



    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('users', 'UserController');
        Route::prefix('tenaga-kependidikan')->group(function () {
            Route::get('/', 'TenagaKependidikanController@index')->name('tenaga_kependidikan.index');
            Route::get('/datatable', 'TenagaKependidikanController@datatable')->name('tenaga_kependidikan.datatable');
            Route::post('/store', 'TenagaKependidikanController@store')->name('tenaga_kependidikan.store');
            Route::get('/show/{params}', 'TenagaKependidikanController@show')->name('tenaga_kependidikan.show');
            Route::post('/update/{params}', 'TenagaKependidikanController@update')->name('tenaga_kependidikan.update');
            Route::delete('/delete/{params}', 'TenagaKependidikanController@delete')->name('tenaga_kependidikan.delete');
        });
        Route::prefix('kelas')->group(function () {
            Route::get('/', 'KelasController@index')->name('kelas.index');
            Route::get('/datatable', 'KelasController@datatable')->name('kelas.datatable');
            Route::post('/store', 'KelasController@store')->name('kelas.store');
            Route::get('/show/{params}', 'KelasController@show')->name('kelas.show');
            Route::post('/update/{params}', 'KelasController@update')->name('kelas.update');
            Route::delete('/delete/{params}', 'KelasController@delete')->name('kelas.delete');
        });
        Route::prefix('siswa')->group(function () {
            Route::get('/', 'SiswaController@index')->name('siswa.index');
            Route::get('/datatable', 'SiswaController@datatable')->name('siswa.datatable');
            Route::post('/store', 'SiswaController@store')->name('siswa.store');
            Route::get('/show/{params}', 'SiswaController@show')->name('siswa.show');
            Route::post('/update/{params}', 'SiswaController@update')->name('siswa.update');
            Route::delete('/delete/{params}', 'SiswaController@delete')->name('siswa.delete');
        });
        Route::prefix('topik')->group(function () {
            Route::get('/', 'TopikController@index')->name('topik.index');
            Route::get('/datatable', 'TopikController@datatable')->name('topik.datatable');
            Route::post('/store', 'TopikController@store')->name('topik.store');
            Route::get('/show/{params}', 'TopikController@show')->name('topik.show');
            Route::post('/update/{params}', 'TopikController@update')->name('topik.update');
            Route::delete('/delete/{params}', 'TopikController@delete')->name('topik.delete');
        });

        Route::prefix('sumber-belajar')->group(function () {
            Route::get('/', 'SumberBelajarController@index')->name('sumber_belajar.index');
            Route::get('/datatable', 'SumberBelajarController@datatable')->name('sumber_belajar.datatable');
            Route::get('/create', 'SumberBelajarController@create')->name('sumber_belajar.create');
            Route::post('/store', 'SumberBelajarController@store')->name('sumber_belajar.store');
        });

        Route::prefix('mata-pelajaran')->group(function () {
            Route::get('/', 'MataPelajaranController@index')->name('mata_pelajaran.index');
            Route::get('/datatable', 'MataPelajaranController@datatable')->name('mata_pelajaran.datatable');
            Route::post('/store', 'MataPelajaranController@store')->name('mata_pelajaran.store');
            Route::get('/show/{params}', 'MataPelajaranController@show')->name('mata_pelajaran.show');
            Route::post('/update/{params}', 'MataPelajaranController@update')->name('mata_pelajaran.update');
            Route::delete('/delete/{params}', 'MataPelajaranController@delete')->name('mata_pelajaran.delete');
        });

        Route::prefix('kompetensi-dasar')->group(function () {
            Route::get('/', 'KompetensiDasarController@index')->name('kompetensi_dasar.index');
            Route::get('/datatable', 'KompetensiDasarController@datatable')->name('kompetensi_dasar.datatable');
            Route::get('/create', 'KompetensiDasarController@create')->name('kompetensi_dasar.create');
            Route::post('/store', 'KompetensiDasarController@store')->name('kompetensi_dasar.store');
            Route::get('/show/{params}', 'KompetensiDasarController@show')->name('kompetensi_dasar.show');
            Route::post('/update/{params}', 'KompetensiDasarController@update')->name('kompetensi_dasar.update');
            Route::delete('/delete/{params}', 'KompetensiDasarController@delete')->name('kompetensi_dasar.delete');
        });

        Route::prefix('jurnal')->group(function () {
            Route::get('/', 'JurnalController@index')->name('jurnal.index');
            Route::get('/datatable', 'JurnalController@datatable')->name('jurnal.datatable');
            Route::get('/create', 'JurnalController@create')->name('jurnal.create');
            Route::post('/store', 'JurnalController@store')->name('jurnal.store');
            Route::get('/show/{params}', 'JurnalController@show')->name('jurnal.show');
            Route::post('/update/{params}', 'JurnalController@update')->name('jurnal.update');
            Route::delete('/delete/{params}', 'JurnalController@delete')->name('jurnal.delete');
            Route::get('/export', 'JurnalController@export')->name('jurnal.export');
        });

        Route::prefix('library')->as('library.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'dashboardSiswa'])->name('dashboard');
            Route::get('/library/{topic_id}', [LibrarySiswaController::class, 'index'])->name('library');
        });
        
    });

    Route::prefix('siswa')->as('siswa.')->middleware(['auth:siswa'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboardSiswa'])->name('dashboard');
        Route::get('/library/{topic_id}', [LibrarySiswaController::class, 'index'])->name('library');
    });

    Route::post('/logout', 'AuthController@logout')->name('logout');

});
