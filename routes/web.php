<?php

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\UserController;
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

    

    Route::group(['middleware' => ['auth']], function () {
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
        Route::post('/logout', 'AuthController@logout')->name('logout');
    });   
});
