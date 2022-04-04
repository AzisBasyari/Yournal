<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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
    return view('index', [
        "title" => "YOURNAL"
    ]);
})->name('index');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login-post');
Route::post('/register', [RegisterController::class, 'register'])->name('register-post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/main', [HomeController::class, 'main'])->name('main');

    //Catatan
    Route::get('/catatan-{catatan:id}', [HomeController::class, 'catatan'])->name('catatan');
    Route::post('/manage-catatan', [CatatanController::class, 'store']);
    Route::post('/manage-catatan/delete/{catatan:id}', [CatatanController::class, 'destroy']);
    Route::post('/manage-catatan/edit/{catatan:id}', [CatatanController::class, 'update']);

    //Log
    Route::post('/delete-log/{log:id}', [CatatanController::class, 'destroyLogs']);

    //Profil
    Route::post('/profile/edit/{user:nik}', [ProfileController::class, 'update']);
    Route::post('/profile/edit-password', [ProfileController::class, 'updatePassword']);

    //Export
    Route::post('/main/export', [HomeController::class, 'export'])->name('export');
});


// Route::get('/manage', function(){
//     return null;
// })->name('manage');
// Route::get('/profil', function(){
//     return null;
// })->name('profile');

