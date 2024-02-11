<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\tugasController;
use App\Http\Controllers\tugasAdminController;

use App\Http\Controllers\ClassController;



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
    return view('welcome');
});

Route::get('/dashboard', [userController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/user-management', [userController::class, 'userManagement']);
    Route::post('/update-profile', [userController::class, 'update_profile']);
    Route::post('/user-store', [userController::class, 'register_store']);
    Route::put('/update-status/{user_id}', [userController::class, 'update_status_user']);
    Route::put('/update/{user_id}',[userController::class, 'update']);
    Route::delete('/delete/{user_id}', [userController::class, 'delete_user']);

    // ERD TUGAS
    // user side
    Route::get('/tugas',[tugasController::class, 'index']);
    Route::get('/tugas/{id}',[tugasController::class,'show']);
    Route::get('/tugas/{id}/edit',[tugasController::class,'edit']);
    Route::put('/tugas/{id}',[tugasController::class,'update']);

    // admin side
    Route::get('/admin/kelas',[tugasAdminController::class,'index']);
    Route::get('/admin/kelas/create',[tugasAdminController::class,'indextugas']);
    Route::get('/admin/create',[tugasAdminController::class,'create']);

    Route::post('/admin/kelas/create',[tugasAdminController::class,'store']);
    Route::get('/admin/tugas/{id}',[tugasAdminController::class,'show']);
    Route::get('/admin/{id}/edit',[tugasAdminController::class,'edit']);
    Route::put('/admin/tugas/{id}',[tugasAdminController::class,'update']);
    Route::delete('/admin/kelas/{id}',[tugasAdminController::class,'destroy']);

    
    // Kelas
    Route::get('/explore',[ClassController::class,'lihat_kelas']);
    Route::post('/tambah-kelas',[ClassController::class,'masuk_kelas']);
    Route::get('/admin/detail-kelas/{id}',[ClassController::class,'show_detail_admin']);
    Route::get('/uji',[ClassController::class,'show_user_detail_admin']);

    Route::resource('classes', ClassController::class);

});



require __DIR__.'/auth.php';
