<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
Route::get('/login',[AdminController::class,'loginForm']);
Route::post('/login',[AdminController::class,'store'])->name('admin.admin');
});
Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminController::class,'adminprofile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminController::class,'adminprofileedit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminController::class,'adminprofilestore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminController::class,'adminchangepassword'])->name('admin.change.password');

Route::post('/admin/change/update',[AdminController::class,'adminchangeupdate'])->name('admin.password.update');




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');







Route::get('/user/logout',[UserController::class,'logout'])->name('user.logout');
Route::get('/user/profile',[UserController::class,'profile'])->name('user.profile');
Route::get('/user/profile/edit',[UserController::class,'userprofileedit'])->name('profile.edit');
Route::post('/user/profile/store',[UserController::class,'userprofilestore'])->name('profile.store');
Route::get('/user/password/view',[UserController::class,'userpasswordview'])->name('user.password.view');
Route::post('/user/password/update',[UserController::class,'userpasswordupdate'])->name('password.update');
