<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HitungSampahController;
use App\Http\Controllers\JenisSampahController;
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

Route::get('/signin', function () {
    return view('auth.login');
});

Route::get('/', [HitungSampahController::class, 'index'])->name('hitung.index');
Route::post('/calculate', [HitungSampahController::class, 'calculate'])->name('hitung.calculate');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        //route Jenis Sampah
        Route::resource('/jenis-sampah', JenisSampahController::class, ['as' => 'admin']);
    });
});
