<?php

use App\Http\Controllers\CAdmin;
use App\Http\Controllers\CAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can egister web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('auth.index');
})->name('dashboard');

Route::prefix('auth/')->name('auth.')->group(function () {
    Route::get('', [CAuth::class, 'index'])->name('index');
    Route::post('', [Cauth::class, 'login'])->name('login');
    Route::get('logout', [CAuth::class, 'logout'])->name('logout');
    Route::get('register', [CAuth::class, 'register'])->name('register');
    Route::post('register', [CAuth::class, 'do_register'])->name('do_register');
});

Route::prefix('admin/')->middleware('auth.role:admin')->name('admin.')->group(function (){
    Route::get('', [CAdmin::class, 'index'])->name('index');
    Route::prefix('employee/')->name('employee')->group(function (){
        Route::get('', [CAdmin::class, 'employee']);
        Route::post('', [CAdmin::class, 'store_employee']);
        Route::put('', [CAdmin::class, 'update_employee']);
        Route::delete('', [Cadmin::class, 'destroy_employee']);
    });
});

Route::get('staff', function () {
    return 'berhasil login staff <br><a href="' . route('auth.logout') . '">logout</a>';
})->middleware('auth.role:staff')->name('staff');

Route::get('user', function () {
    return 'berhasil login user <br><a href="' . route('auth.logout') . '">logout</a>';
})->middleware('auth.role:user')->name('user');
