<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;

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


Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('index', [
            "title" => "Yournal"
        ]);
    })->name('index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
    Route::get('/main', [HomeController::class, 'main'])->name('main');

    //Catatan
    Route::get('/catatan-{catatan:id}', [CatatanController::class, 'detailCatatan']);
    Route::post('/create-catatan', [CatatanController::class, 'store']);
    Route::post('/manage-catatan/delete/{catatan:id}', [CatatanController::class, 'destroy']);
    Route::post('/manage-catatan/edit/{catatan:id}', [CatatanController::class, 'update']);
    
    //Log
    Route::get('/detail-log/log-{log:id}', [LogController::class, 'detailLog']);
    Route::post('/delete-log/{log:id}', [LogController::class, 'destroyLogs']);
    
    //Profil
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('edit-profile');
    Route::post('/profile/edit-password', [ProfileController::class, 'updatePassword'])->name('edit-password');
    
    //Export
    Route::post('/export', [HomeController::class, 'export'])->name('export');

    //Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/coba', CobaController::class);
});