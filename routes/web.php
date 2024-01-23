<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminController;
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
    return view('layouts.app');
});

Route::group(['middleware' => ['auth','ceklevel:admin']], function (){
    Route::get('/verifikasidata',[BerandaController::class,'verifikasidata'])->name('verifikasidata');
    Route::get('/datasantri',[BerandaController::class,'datasantri'])->name('datasantri');
    Route::put('/admin/approve/{id}',[AdminController::class,'approve'])->name('admin_approval');
});

//page pada sidebar
Route::group(['middleware' => ['auth:user','ceklevel:admin,santri']], function (){
    Route::get('/home',[HomeController::class,'index'])->name('home');
    
    
    
});
Route::get('/hasil',[BerandaController::class,'hasil'])->name('hasil');
Route::get('/laporan',[BerandaController::class,'laporan'])->name('laporan');
Route::post('/simpan-laporan',[BerandaController::class,'simpan'])->name('simpan-laporan');

Route::get('/history',[BerandaController::class,'history'])->name('history');

//route untuk admin




Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
