<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Frontend\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('index');

Auth::routes();
Route::get('/admin', [AdminHomeController::class, 'index'])->middleware('role:admin')->name('admin.dashboard');
Route::group(['prefix'=>'admin', 'middleware'=>'role:admin'], function(){
	Route::get('/home', [AdminHomeController::class, 'index'])->middleware('role:admin')->name('admin.dashboard');
	Route::resource('setting', SettingController::class)->except(['destroy', 'edit', 'show']);
	Route::resource('banner', BannerController::class)->except(['show']);
});
