<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\PersonalController;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\ArticleController;
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
  /*
|--------------------------------------------------------------------------
| Back Route
|--------------------------------------------------------------------------|
*/

Route::prefix('')->name('admin.')->middleware('isLogin')->group(function(){
  Route::get('', [AuthController::class, 'login'])->name('login');
  Route::post('', [AuthController::class, 'loginPost'])->name('login.post');
  });

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
Route::get('giris', [AuthController::class, 'login'])->name('login');
Route::post('giris', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
  Route::resource('personal', PersonalController::class);
  Route::get('cixis', [AuthController::class, 'logout'])->name('logout');
});

